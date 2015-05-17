@extends('app')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/proposals/' . $proposal->id) }}">{{$proposal->title}}</a></li>
        <li class="active">Edit</li>
    </ol>
    
    {!! Form::model($proposal, ['action' => ['ProposalsController@update', $proposal->id], 'method' => 'PATCH']) !!}
        @include ('proposals.partials.form', ['btnText' => 'Update proposal'])
    {!! Form::close() !!}
    
    @include ('partials.errors')
@stop