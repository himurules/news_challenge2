@if($tweets)
    @foreach($tweets as $tweet)
        <div class="tweet">
            @include('tweets.tweet')
        </div>
    @endforeach
@else
    <div>
        <label class="text-danger">
            No More Tweets Found
        </label>
    </div>
@endif
