@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">    
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.admins.*') ? 'active' : '' }}" href="{{ route('admin.admins.index') }}">{{ __('Admins') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">{{ __('Users') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.check_lists.*') ? 'active' : '' }}" href="{{ route('admin.check_lists.index') }}">{{ __('Checklists') }}</a>
                </li>                
            </ul>
        </div>                    
        @yield('admin_content')        
    </div>
    @yield('admin_content_links')
</div>    
@endsection