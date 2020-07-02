@extends('layouts.app')
@section('content')
<div class="container"> 
	<div class="card">    
        <div class="card-header">{{ __('CheckLists') }}</div>    
        <div class="card-body"> 
			<a class="btn btn-primary" href="{{ route('check_lists.create') }}"  data-method="get" rel="nofollow">{{ __('Add new checklist') }}</a> 
		</div>
    </div>    
    <div class="card mt-1">        
        <div class="list-group list-group-flush"> 
            @foreach ($checkLists as $checkList)
                <a class="list-group-item list-group-item-action" href="{{ route('check_lists.show', $checkList) }}"> {{ $checkList->name }} </a>
            @endforeach                     
        </div>
    </div>
    <div class="mt-1">
        {{ $checkLists->links() }}
    </div>  
</div> 
@endsection