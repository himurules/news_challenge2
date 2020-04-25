<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Twitter;

/**
 * Class TwitterAPI
 *
 * @package App
 */
class TwitterAPI extends Model
{
    /**
     * Get tweets based on query
     *
     * @param array $params parameters for function
     *
     * @return array
     */
    public function getTweets(array $params)
    {
        $returnObj = [];
        $tweetsObj = [];
        $tweets = Twitter::getSearch(
            array(
                'q' => $params['q'],
                'count' => isset($params['count']) ? $params['count'] : 100,
                'max_id' => isset($params['max_id']) ? $params['max_id'] : '',
                'format' => 'array')
        );
        //dd($tweets);
        if (isset($tweets['statuses'])
            && is_array($tweets['statuses'])
            && count($tweets['statuses']) > 0
        ) {
            $tweetsObj = $tweets['statuses'];
        }
        $returnObj['tweets'] = $tweetsObj;
        if (isset($tweets['search_metadata'])
            && count($tweets['search_metadata']) > 0
            && isset($tweets['search_metadata']['next_results'])
        ) {
            $returnObj['pagination'] = $tweets['search_metadata']['next_results'];
        }
        return $returnObj;
    }
}
