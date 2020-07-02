@extends('my_account.menu')
@section('account')
    <div class="card-text">{{ __('Tags') }}: {{ Auth::user()->name }}</div>
    <div class="card-text">{{ __('Created_at') }}: {{ Auth::user()->created_at }}</div> 
    <a class="btn btn-primary mt-4" href="{{ route('account.destroy', Auth::user()->name) }}" data-confirm="{{ __('Are you sure?') }}" data-method="delete" rel="nofollow">{{ __('Delete') }}</a>    
@endsection

