@extends('admin.menu')
@section('admin_content')
<div class="card-body">
    <div class="container">
        <div class="row font-weight-bold border-bottom">
            <div class="col-sm-2">{{ __('Name') }}</div>                        
            <div class="col-sm-2">{{ __('Creator') }}</div>
            <div class="col-sm">{{ __('Created at') }}</div>                       
        </div>                                                
        @foreach ($checkLists as $checkList)
            <div class="row border-bottom">
                <div class="col-sm-2"><a href="{{ route('admin.check_lists.show', $checkList) }}"> {{ $checkList->name }} </a></div>                            
                <div class="col-sm-2">{{ $checkList->creator->name }} </div> 
                <div class="col-sm">{{ $checkList->created_at }}</div>                             
            </div>
        @endforeach
        @if (count($checkLists) == 0)                    
            <div class="text-center pt-3">{{ __('Not found') }}</div>                        
        @endif
    </div>
</div>
@endsection

@section('admin_content_links')
<div class="pt-1">
    {{ $checkLists->links() }}
</div>
@endsection