@extends('app')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('proposals') }}">Proposals</a></li>
        <li class="active">{{$proposal->title}}</li>
    </ol>
    
    <div class="row" style="margin-bottom: 1em;">
        <div class="col-md-6">
            
        </div>
        <div class="col-md-6 text-right">
            {!! Form::open(['action' => 'VotesController@store', 'method' => 'POST']) !!}
                @include ('votes.partials.form', ['btnText' => 'Submit proposal'])
                {{ plural(count($proposal->votes), 'vote', 'votes') }}
            {!! Form::close() !!}
        </div>
    </div>
    
    <table class="table table-striped">
        <tr>
            <th width="20%">Title</th>
            <td>
                {!! Form::open(array('route' => array('proposals.destroy', $proposal->id), 'method' => 'delete', 'id' => 'proposalDelete')) !!}
                    {{$proposal->title}}
                    @if (Auth::user() and Auth::user()->canUpdate($proposal))
                        [
                            @if (Auth::user() and Auth::user()->canUpdate($proposal))
                                <a href="{{route('proposals.edit', [$proposal->id])}}">Edit</a>
                            @endif
                            @if (Auth::user() and Auth::user()->canDelete($proposal))
                                <a href="#" onclick="$('#proposalDelete').confirmSubmit('Are you sure you want to delete this proposal?'); return false;">Delete</a>
                            @endif
                        ]
                    @endif
                {!! Form::close() !!}
            </td>
        </tr>
        <tr>
            <th>Author:</th>
            <td>{{$proposal->user->name}}</td>
        </tr>
        <tr>
            <th>Created:</th>
            <td>{{$proposal->date_created}}</td>
        </tr>
        
        @if ($proposal->date_updated != $proposal->date_created)
            <tr>
                <th>Last updated:</th>
                <td>{{$proposal->date_updated}}</td>
            </tr>
        @endif
        
        <tr>
            <th>Content</th>
            <td>{{$proposal->content}}</td>
        </tr>
    </table>
@stop