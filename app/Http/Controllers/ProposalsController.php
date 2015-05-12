<?php namespace App\Http\Controllers;

use Illuminate\Auth\AuthManager;

use App\Proposal;

use App\Http\Requests\ProposalRequest;

class ProposalsController extends Controller {
    
	protected $proposal;
    
    /**
     * 
     */
    public function __construct(Proposal $proposal)
    {
        // set our controller's model
        $this->proposal = $proposal;
        
        // apply auth middleware to authenticate certain actions
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// will throw an exception if not found
        $proposals = $this->proposal->all();
        
        // render the view script, or json if ajax request
        return $this->render('proposals.index', compact('proposals'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// we need an empty proposal for the form
        $proposal = new Proposal;
        
        // render the view script, or json if ajax request
        return $this->render('proposals.create', compact('proposal'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AuthManager $auth, ProposalRequest $request)
	{
		// save proposal
        $proposal = $auth->user()->proposals()->create( $request->all() );
        
        // redirect
        return redirect()->to('/')->with([
            'flash_message' => 'A new proposal has been created',
        ]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$proposal = $this->proposal->findOrFail($id);
        
        // render the view script, or json if ajax request
        return $this->render('proposals.show', compact('proposal'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(AuthManager $auth, $id)
	{
		// will throw an exception if not found
        $proposal = $auth->user()->proposals()->findOrFail($id);
        
        // render the view script, or json if ajax request
        return $this->render('proposals.edit', compact('proposal'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(AuthManager $auth, ProposalRequest $request, $id)
	{
		// will throw an exception if not found
        $proposal = $auth->user()->proposals()->findOrFail($id);
        
        // update the proposal with the request params
        $proposal->update( $request->all() );
        
        return redirect()->route('proposals.show', [$id])->with([
            'flash_message' => 'Proposal has been updated',
        ]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$proposal = $this->proposal->findOrFail($id);
        
        // will throw an exception if not found
        $proposal->delete();
        
        return redirect()->to('proposals')->with([
            'flash_message' => 'Proposal has been deleted',
        ]);
	}

}
