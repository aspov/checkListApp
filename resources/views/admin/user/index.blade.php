@extends('admin.menu')
@section('admin_content')
<div class="card-body">
    <div class="container">
        <div class="row font-weight-bold border-bottom">
            <div class="col-12 col-lg-1">{{ __('ID') }}</div>
            <div class="col-12 col-lg-2">{{ __('Name') }}</div>                        
            <div class="col-12 col-lg-2">{{ __('Created at') }}</div>
            <!-- <div class="col-12 col-lg-2">{{ __('Roles') }}</div>
            <div class="col-12 col-lg-2">{{ __('Permissions') }}</div> -->
            <div class="col-12 col-lg-1">{{ __('Status') }}</div>
            <div class="col-3 col-lg-2">{{ __('Actions') }}</div>
        </div>                                                
        @foreach ($users as $user)
            <div class="row border-bottom">
                <div class="col-1 col-sm-1">{{ $user->id }} </div> 
                <div class="col-12 col-lg-2"> {{ $user->name }} </div>                            
                <div class="col-12 col-lg-2">{{ $user->created_at }}</div>
                <!-- <div class="col-12 col-lg-2">{{ $user->getRoleNames()->join(', ') }}</div>
                <div class="col-12 col-lg-2">{{ $user->getAllPermissions()->pluck('name')->join(', ') }}</div> -->
                <div class="col-12 col-lg-1">{{ __('Blocked') }}</div>
                <div class="col align-self-center">
                <a class="btn btn-outline-secondary btn-sm" href="{{ route('admin.users.edit', $user) }}" data-method="get" rel="nofollow">{{ __('Edit') }}</a>
                <a class="btn btn-outline-secondary btn-sm" href="{{ route('admin.users.destroy', $user) }}" data-confirm="{{ __('Are you sure?') }}" data-method="delete" rel="nofollow">{{ __('Delete') }}</a>
                </div>
            </div>
        @endforeach
        @if (count($users) == 0)                    
            <div class="text-center pt-3">{{ __('Not found') }}</div>                        
        @endif
    </div>
</div>
@endsection
@section('admin_content_links')
<div class="pt-1">
    {{ $users->links() }}
</div>
@endsection