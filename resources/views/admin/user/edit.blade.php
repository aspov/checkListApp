@extends('admin.menu')
@section('admin_content')
<div class="card-body">
        <div class="container">
        {{ Form::model($user, ['url' => route('admin.users.update', $user), 'method' => 'put']) }}                        
        <div class="form-group row">
            {{ Form::label('check_lists_limit', __('Check lists limit'),  ['class' => 'col-md-2 col-form-label col-form-label-sm text-md-left']) }}            
            <div class="col-md-4">
                {{ Form::text('check_lists_limit', $user->check_lists_limit, ['class' => 'form-control form-control-sm']) }}
            </div>
        </div>
        <div class="form-group row">            
            {{ Form::label('status', __('Status'),  ['class' => 'col-md-2 col-form-label col-form-label-sm text-md-left']) }}            
            <div class="col-md-4">
                {{ Form::select('status', ['active' => 'active', 'blocked' => 'blocked'], $user->status, ['class' => 'form-control form-control-sm']) }}
            </div>
        </div>
        @can('edit roles')
        <div class="form-group row">            
            {{ Form::label('roles', __('User roles'),  ['class' => 'col-md-2 col-form-label col-form-label-sm text-md-left']) }}            
            <div class="col-md-4">
                {{ Form::select('roles[]', $roles->pluck('name', 'id'), $user->roles()->pluck('id'), ['class' => 'form-control form-control-sm', 'multiple']) }}
            </div>
        </div>
        @endcan
        @can('edit permissions')
        <div class="form-group row">            
            {{ Form::label('permissions', __('User permissions'),  ['class' => 'col-md-2 col-form-label col-form-label-sm text-md-left']) }}            
            <div class="col-md-4">
                {{ Form::select('permissions[]', $permissions->pluck('name', 'id') , $user->permissions()->pluck('id'), ['class' => 'form-control form-control-sm', 'multiple']) }}
            </div>
        </div>
        @endcan
        {{ Form::submit(__('Save'), ['class' => 'btn btn-primary']) }}				
        {{ Form::close() }}
    </div>
</div> 
@endsection
