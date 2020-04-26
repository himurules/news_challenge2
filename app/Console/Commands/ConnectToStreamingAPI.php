<?php

namespace App\Console\Commands;

use App\Streams\TwitterStream;
use Illuminate\Console\Command;

class ConnectToStreamingAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'connect_to_streaming_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Connect to Twitter Streaming API';

    /**
     * @var TwitterStream
     */
    protected $twitterStream;

    /**
     * Create a new command instance.
     *
     * @param TwitterStream $twitterStream
     *
     * @return void
     */
    public function __construct(TwitterStream $twitterStream)
    {
        $this->twitterStream = $twitterStream;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \ErrorException
     */
    public function handle()
    {
        $twitter_consumer_key = env('TWITTER_CONSUMER_KEY', '');
        $twitter_consumer_secret = env('TWITTER_CONSUMER_SECRET', '');
        $keywords_string = env(
            'TWITTER_KEYWORDS',
            'Kidspot OR @KidspotSocial OR #Kidspot'
        );
        $keywords = explode('OR', $keywords_string);
        $this->twitterStream->consumerKey = $twitter_consumer_key;
        $this->twitterStream->consumerSecret = $twitter_consumer_secret;
        $this->twitterStream->setTrack($keywords);
        $this->twitterStream->setFollow([]);
        $this->twitterStream->setLocations([]);
        $this->twitterStream->consume();
    }
}
