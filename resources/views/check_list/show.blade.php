@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">    
        <div class="card-header">{{ $checkList->name }}</div>    
        <div class="card-body">
			<div class="row ml-0">
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Sort
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						{{ Form::open(['url' => route('check_lists.show', $checkList), 'method' => 'get']) }}				
							<button type="submit" class="dropdown-item" value="" name="filter[status]">{{ __('All') }}</button>
							<button type="submit" class="dropdown-item" value="completed" name="filter[status]">{{ __('Completed') }}</button>
							<button type="submit" class="dropdown-item" value="not completed" name="filter[status]">{{ __('Not completed') }}</button>
						{{ Form::close() }}				
					</div>
				</div> 
				<a class="btn btn-primary ml-2" href="{{ route('check_lists.check_list_item.create', $checkList) }}"  data-method="get" rel="nofollow">{{ __('Add item') }}</a>
				<a class="btn btn-primary ml-2" href="{{ route('check_lists.destroy', $checkList) }}"  data-confirm="{{ __('Are you sure?') }}" data-method="delete" rel="nofollow">{{ __('Delete checklist') }}</a> 
			</div>
		</div>
	</div>
    <div class="pt-1">
		<div class="card">	
			<div class="card-body">
				@foreach ($checkListItems as $checkListItem)
				{{ Form::model($checkListItem, ['url' => route('check_lists.check_list_item.update', [$checkList, $checkListItem]), 'method' => 'put']) }}
				<div class="input-group mb-1">
					{{ Form::text('text', null, ['class' => 'form-control'] ) }}
					{{ Form::select('status', ['completed' => 'completed', 'not completed' => 'not completed'],  $checkListItem->status,['class' =>'custom-select col-2']) }}
					<div class="input-group-append">
						{{ Form::submit(__('Save'), ['class' => 'btn btn-outline-secondary']) }}
						<a class="btn btn-outline-secondary" href="{{ route('check_lists.check_list_item.destroy', [$checkList, $checkListItem]) }}" data-confirm="{{ __('Are you sure?') }}" data-method="delete" rel="nofollow">{{ __('Delete') }}</a>
					</div>
				</div>
				{{ Form::close() }}
				@endforeach 
            </div>			  
		</div>
	</div>
	<div class="pt-1">
			{{ $checkListItems->links() }}
	</div>
</div> 
@endsection