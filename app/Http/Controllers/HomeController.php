<?php

namespace App\Http\Controllers;

use App\TwitterAPI;
use Illuminate\Http\Request;
use App\Tweet;

class HomeController extends Controller
{
    /**
     * The twitterAPI model Object
     *
     * @var TwitterAPI
     */
    protected $twitterAPI;

    /**
     * HomeController constructor.
     *
     * @param TwitterAPI $twitterAPI model class
     */
    public function __construct(TwitterAPI $twitterAPI)
    {
        $this->twitterAPI = $twitterAPI;
    }

    /**
     * Homepage Action
     *
     * @param Request $request http request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = (
            $request->has('q') && $request->query !=''
            ) ? $request->input('q') :
            env('TWITTER_KEYWORDS', 'Kidspot OR @KidspotSocial OR #Kidspot');
        $keywords = explode(',', $query);
        $params = [
            'q' => $keywords,
        ];

        if ($request->has('max_id') && $request->max_id !='') {
            $params['max_id'] = $request->max_id;
        }

        $responseObj = $this->twitterAPI->getTweets($params);
        return view(
            'welcome',
            [
                'tweets' => $responseObj['tweets'],
                'query' => $query,
                'pagination' => isset($responseObj['pagination'])
                    ? $responseObj['pagination'] : ''
            ]
        );
    }

    /**
     * Realtime streaming action
     *
     * @param Request $request http request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function realTime(Request $request)
    {
        $tweets = Tweet::orderBy('created_at', 'desc')->paginate(10);
        return view('tweets.realtime', ['tweets' => $tweets]);
    }
}
