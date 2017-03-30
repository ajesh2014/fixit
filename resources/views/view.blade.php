@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$page_name}}</div>

                <div class="panel-body">
                    You have {{$item_count}} {{$page_name}}
                </div>
                <a href="{{ url('/jobs/') }}">Jobs</a>
                <a href="{{ url('/quotes/') }}">quotes</a>
                <a href="{{ url('/messages/') }}">messages</a>
            </div>
        </div>
    </div>
</div>
@endsection
