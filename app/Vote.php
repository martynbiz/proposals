<?php namespace App;

class Vote extends Model {

	//

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['score', 'proposal_id'];
    
    /**
    * Get the user who owns this vote
    * @return \Illuminte\Database\Eloquent\Relations\BelongsTo
    */    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
