@extends('my_account.menu')

@section('account')
{{ Form::model(Auth::user(), ['url' => route('account.update', Auth::user()->name), 'method' => 'put']) }}
    <div class="form-group row">
        {{ Form::label('name', __('Name'),  ['class' => 'col-md-2 col-form-label col-form-label-sm text-md-left']) }}            
        <div class="col-md-4">
            {{ Form::text('name', null, ['class' => 'form-control form-control-sm' . ($errors->has('name') ? ' is-invalid' : '')]) }}
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>                        
    </div>
    <div class="form-group row">
        {{ Form::label('email', __('E-Mail Address'),  ['class' => 'col-md-2 col-form-label col-form-label-sm text-md-left']) }}            
        <div class="col-md-4">
            {{ Form::text('email', null, ['class' => 'form-control form-control-sm' . ($errors->has('email') ? ' is-invalid' : '')]) }}
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>                        
    </div>
{{ Form::submit(__('Save'), ['class' => 'btn btn-primary']) }}
{{ Form::close() }}
@endsection
