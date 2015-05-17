<?php namespace App\Http\Controllers;

use Illuminate\Auth\AuthManager;

use App\Proposal;

use App\Http\Requests\ProposalRequest;

use App\Library\Utils;

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
        $proposals = $this->proposal
            ->with('votes')
            ->with('user')
            ->get();
        
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
        return redirect()->to('proposals')->with([
            'flash_message' => 'A new proposal has been created',
        ]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, AuthManager $auth, Utils $utils)
	{
		$proposal = $this->proposal
            ->with('votes')
            ->findOrFail($id);
        
        // calculate percentage ration of votes
        $yesCount = count($proposal->yes_votes);
        $noCount = count($proposal->no_votes);
        list($yesPerc, $noPerc) = $utils->calculateShare($yesCount, $noCount);
        
        // get the users vote for this proposal
        $myVote = ($auth->user()) ? $proposal->votes()->where('user_id', '=', $auth->user()->id)->first() : null;
        
        // render the view script, or json if ajax request
        return $this->render('proposals.show', compact('proposal', 'yesPerc', 'noPerc', 'myVote'));
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
        
        // here we're gonna store the patch (and entire snapshot for now -- until patching works)
        $version = $proposal->versions()->create( array(
            'title' => $proposal->title,
            'title_unified' => $this->getDiffUnified($proposal->title, $request->input('title')),
            'content' => $proposal->content,
            'content_unified' => $this->getDiffUnified($proposal->content, $request->input('content')),
            'versioned_at' => $proposal->updated_at,
        ) );
        
        // update the proposal with the request params
        $proposal->update( $request->all() );
        
        // send notification to all voters
        //...
        
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
    
    /**
     * 
     */
    protected function getDiffUnified($a, $b)
    {
        // // code to highlight the difference between strings
        // $a_lines = explode("\n", "One\nTwo\nThree");
        // $b_lines = explode("\n", "One\nOne\nTwo\nFour\nFive");

        // $check_diff = new \MartynBiz\Diff\Diff( 'auto', array($a_lines, $b_lines) );
        // // $renderer = new \MartynBiz\Diff\Renderer\Unified();
        // $renderer = new \MartynBiz\Diff\Renderer\Inline();
        
        // echo $renderer->render($check_diff); exit;
        
        
        
        // code to highlight the difference between strings
        $a_lines = explode("\n", $a);
        $b_lines = explode("\n", $b);

        $check_diff = new \MartynBiz\Diff\Diff( 'auto', array($a_lines, $b_lines) );
        // $renderer = new \MartynBiz\Diff\Renderer\Unified();
        $renderer = new \MartynBiz\Diff\Renderer\Inline();
        
        return $renderer->render($check_diff);
    }

}
