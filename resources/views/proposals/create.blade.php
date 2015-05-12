@extends('app')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="{{ url('/proposals') }}">Proposals</a></li>
        <li class="active">Create</li>
    </ol>
    
    {!! Form::open(['action' => 'ProposalsController@store', 'method' => 'POST']) !!}
        @include ('proposals.partials.form', ['btnText' => 'Submit proposal'])
    {!! Form::close() !!}
    
    @include ('partials.errors')
@stop