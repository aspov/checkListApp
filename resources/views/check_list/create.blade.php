@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">    
        <div class="card-header">{{ __('Create check list') }}</div>    
        <div class="card-body">        
            {{ Form::open(['url' => route('check_lists.store'), 'method' => 'post']) }}
            <div class="form-group row">
                    {{ Form::label('name', __('Name'),  ['class' => 'col-md-2 col-form-label col-form-label-sm text-md-left']) }}            
                <div class="col-md-4">
                    {{ Form::text('name', null, ['class' => 'form-control form-control-sm', 'placeholder' => __('check list name')]) }}
                </div>
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li >{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>            
            {{ Form::submit(__('Add'), ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
        
    </div>    
</div> 
@endsection
