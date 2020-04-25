@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div>
                    <label class="text-info text-center">
                        Display the tweets with real time streaming API for Twitter
                    </label>
                </div>
                <div class="tweet-list">
                    @if($tweets )
                        @foreach($tweets as $tweet)
                            <div class="tweet">
                                <div class="media">
                                    <div class="media-left">
                                        <img class="img-thumbnail media-object" src="{{ $tweet->user_avatar_url }}" alt="Avatar">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{ '@' . $tweet->user_screen_name }}</h4>
                                        <p>{{ $tweet->tweet_text }}</p>
                                        <p><a target="_blank" href="https://twitter.com/{{ $tweet->user_screen_name }}/status/{{ $tweet->id }}">
                                                View on Twitter
                                            </a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {!! $tweets->links() !!}
                    @else
                        <div>
                            <label class="text-danger">
                                No tweets captured since the connection.
                            </label>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
