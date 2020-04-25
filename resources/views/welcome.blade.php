@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div  class="form-group mx-auto">
                    <form action="{{route('home')}}" class="form-inline">
                        <label for="query" class="col-form-label" for="q">
                            Current Query:
                        </label>
                        <input class="form-control" type="text" name="q" id="q" value="{{$query}}"/>
                        <input type="submit" value="Search Tweets" class="btn-primary mx-3"/>
                    </form>
                </div>
                <div class="form-group">
                    <label class="text-info">
                        Please provide a OR separated value to search for either words eg.(this OR that)
                    </label>
                    <label class="text-info">
                        Please provide a comma separated value to search for all words eg.(this, that)
                    </label>
                </div>
                <div class="tweet-list">
                    @include('tweets.list')
                    @if($pagination && $pagination!=='')
                        <a href="{{ route('home').$pagination }}" class="btn btn-primary">
                                Load Next Page
                        </a>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
