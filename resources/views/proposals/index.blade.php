@extends('app')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">Proposals</li>
    </ol>
    
    @if($proposals->count())
        @foreach($proposals as $proposal)
            <div class="proposals">
                <h2><a href="{{ route('proposals.show', $proposal->id) }}">{{$proposal->title}}</a></h2>
            </div>
        @endforeach
    @else
        <p>There are currently no proposals</p>
    @endif
    
    <a href="{{route('proposals.create')}}" class="btn btn-default">Create</a>
@stop