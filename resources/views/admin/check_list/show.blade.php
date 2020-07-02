@extends('admin.menu')
@section('admin_content')
<div class="card-body"> 
    <div class="container">
        <div class="row font-weight-bold border-bottom">
            <div class="col-sm-2">{{ __('Text') }}</div>                        
            <div class="col-sm-2">{{ __('Status') }}</div>            
        </div>                                                
        @foreach ($checkListItems as $checkListItem)
            <div class="row border-bottom">                                            
                <div class="col-sm-2">{{ $checkListItem->text}} </div> 
                <div class="col-sm">{{ $checkListItem->status }}</div>                             
            </div>
        @endforeach
        @if (count($checkListItems) == 0)                    
            <div class="text-center pt-3">{{ __('Not found') }}</div>                        
        @endif
    </div>
</div>
@endsection

@section('admin_content_links')
<div class="pt-1">
        {{ $checkListItems->links() }}
</div>
@endsection