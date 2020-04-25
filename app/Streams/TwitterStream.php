<?php


namespace App\Streams;

use App\Jobs\ProcessTweet;
use Illuminate\Foundation\Bus\DispatchesJobs;
use OauthPhirehose;

class TwitterStream extends OauthPhirehose
{
    use DispatchesJobs;

    /**
     * @inheritDoc
     */
    public function enqueueStatus($status)
    {
        // TODO: Implement enqueueStatus() method.
        $this->dispatch(new ProcessTweet($status));
    }
}
