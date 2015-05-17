{!! Form::hidden('proposal_id', $proposal->id) !!}

{!! Form::button('Yes (' . $yesPerc . '%)', [
    'type' => 'submit', 
    'name' => 'score', 
    'value' => '1', 
    'class' => ($myVote and $myVote->score > 0) ? 'btn btn-primary' : 'btn btn-default',
]); !!}
{!! Form::button('No (' . $noPerc . '%)', [
    'type' => 'submit', 
    'name' => 'score', 
    'value' => '-1', 
    'class' => ($myVote and $myVote->score < 0) ? 'btn btn-primary' : 'btn btn-default',
]); !!}