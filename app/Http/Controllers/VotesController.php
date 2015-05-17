<?php namespace App\Http\Controllers;

use Illuminate\Auth\AuthManager;

use App\Vote;

use App\Http\Requests\VoteRequest;

class VotesController extends Controller {

	
	protected $vote;
    
    /**
     * 
     */
    public function __construct(Vote $vote)
    {
        // set our controller's model
        $this->vote = $vote;
        
        // apply auth middleware to authenticate certain actions
        $this->middleware('auth');
    }

	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AuthManager $auth, VoteRequest $request)
	{
		// get the $vote if it already exists
		$vote = $auth->user()->votes()
			->where('proposal_id', '=', $request->input('proposal_id'))
			->first();
		
		// if the vote exists update the existing vote with the new
		// score. otherwise, create a new one.
		if ($vote) {
			// update the users current vote for this proposal
			// however, reset if the score selected is the same as 
			// their existing vote
			$vote->score = ($vote->score == $request->input('score')) ? 0 : $request->input('score');
			$vote->save();
		} else {
			// save vote as it doesn't exist
        	$vote = $auth->user()->votes()->create( $request->all() );
		}
        
        // redirect
        return redirect()->to('proposals/' . $vote->proposal_id);
        	// ->with(['flash_message' => 'Thank you for voting']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
