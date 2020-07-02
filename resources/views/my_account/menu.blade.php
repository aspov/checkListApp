@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">    
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('account.show') ? 'active' : '' }}" href="{{ route('account.show', Auth::user()->name) }}">{{ __('My account') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('account.edit') ? 'active' : '' }}" href="{{ route('account.edit', Auth::user()->name) }}">{{ __('Edit') }}</a>
                </li>                
            </ul>
        </div>        
        <div class="card-body">           
            @yield('account')
        </div>    
    </div>
</div>    
@endsection

