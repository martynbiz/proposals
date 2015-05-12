@extends('app')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('proposals') }}">Proposals</a></li>
        <li class="active">{{$proposal->title}}</li>
    </ol>
    
    <div class="info">{{$proposal->user->name}} | {{$proposal->date_created}}</div>
    
    @if (Auth::user() and Auth::user()->canUpdate($proposal))
        <div>
            {!! Form::open(array('route' => array('proposals.destroy', $proposal->id), 'method' => 'delete', 'id' => 'proposalDelete')) !!}
                @if (Auth::user() and Auth::user()->canUpdate($proposal))
                    <a href="{{route('proposals.edit', [$proposal->id])}}">Edit</a>
                @endif
                @if (Auth::user() and Auth::user()->canDelete($proposal))
                    <a href="#" onclick="$('#proposalDelete').confirmSubmit('Are you sure you want to delete this proposal?'); return false;">Delete</a>
                @endif
            {!! Form::close() !!}
        </div>
    @endif
    
    <div class="body">{{$proposal->description}}</div>
@stop