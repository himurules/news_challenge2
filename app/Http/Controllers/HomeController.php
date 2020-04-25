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

    public function __construct(TwitterAPI $twitterAPI)
    {
        $this->twitterAPI = $twitterAPI;
    }

    public function index(Request $request){
        $query = ($request->has('query') && $request->query !='') ? $request->input('query') : env('TWITTER_KEYWORDS', 'Kidspot OR @KidspotSocial OR #Kidspot');
        $keywords = explode(',', $query);
        $tweets = $this->twitterAPI->getTweets($keywords);
        return view('welcome', ['tweets'=>$tweets, 'query'=>$query] );
    }

    public function realTime(Request $request){
        $tweets = Tweet::orderBy('created_at','desc')->paginate(10);
        //dd($tweets);
        return view('tweets.realtime', ['tweets' => $tweets]);
    }
}
