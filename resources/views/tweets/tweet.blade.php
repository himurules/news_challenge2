<div class="media">
    <div class="media-left">
        <a href="{{ Twitter::linkUser($tweet['user']['screen_name']) }}" target="_new">
            <img class="img-thumbnail media-object" src="{{ $tweet['user']['profile_image_url_https'] }}" alt="Avatar">
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading">
            <a href="{{ Twitter::linkUser($tweet['user']['screen_name']) }}" target="_new">
                {{ '@' . $tweet['user']['screen_name'] }}
            </a>
        </h4>
        <p>{{ $tweet['text'] }}</p>
        <p>
            Posted {{ Twitter::ago($tweet['created_at']) }}
        </p>
        <p>
            <a target="_blank" href="https://twitter.com/{{ $tweet['user']['screen_name'] }}/status/{{ $tweet['id_str'] }}">
                View on Twitter
            </a>
        </p>
    </div>
</div>
