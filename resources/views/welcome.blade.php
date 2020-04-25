@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div  class="form-group">
                    <form action="{{route('home')}}" class="form-inline">
                        <label for="query" class="col-form-label">
                            Current Query: <input type="text" name="query" id="query" value="{{$query}}"/>
                        </label>
                        <input type="submit" value="Change Query" class="btn-primary"/>
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
                </div>

            </div>
        </div>
    </div>
@endsection
