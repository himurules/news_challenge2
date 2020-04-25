<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Twitter;

class TwitterAPI extends Model
{
    public function getTweets(array $query){
        $returnObj = [];
        $tweetsObj = [];
        $nextResults = '';
        $tweets = Twitter::getSearch(array('q' => $query, 'count' => 500, 'format' => 'array'));
        if(isset($tweets['statuses']) && is_array($tweets['statuses']) && count($tweets['statuses']) > 0) {
            $tweetsObj = $tweets['statuses'];
        }
        //dd($tweetsObj);
        //if(isset($tweets['search_metadata']))
        return $tweetsObj;
    }
}
