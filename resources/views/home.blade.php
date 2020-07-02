@extends('layouts.app')
@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">{{__('Hello!') }}</h1>
        <p class="lead">{{__('This is a home page') }}</p>
        <hr class="my-4">        
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">{{ __('Learn more') }}</a>
        </p>
    </div>
</div>
@endsection