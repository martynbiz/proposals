<?php namespace App;

class Proposal extends Model {
    
    /**
     * Protect against mass assignment
     */
    protected $fillable = [
        'title',
        'content',
        'slug',
    ];
    
    /**
    * Get the user who owns this question
    * @return \Illuminte\Database\Eloquent\Relations\BelongsTo
    */    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    /**
    * User has many votes
    * @return \Illuminte\Database\Eloquent\Relations\HasMany
    */    
    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
    
    /**
    * Get the user who owns this question
    * @return \Illuminte\Database\Eloquent\Relations\HasMany
    */    
    public function versions()
    {
        return $this->hasMany('App\ProposalVersion');
    }
    
    // attributes
    
    /**
     * Return formatted date (e.g. 14 minutes ago)
     */
    public function getDateCreatedAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    
    /**
     * This will return yes votes
     */
    public function getYesVotesAttribute()
    {
        return $this->votes->filter(function($vote) {
            if ($vote->score > 0) {
                return true;
            }
        });
    }
    
    /**
     * This will return no votes
     */
    public function getNoVotesAttribute()
    {
        return $this->votes->filter(function($vote) {
            if ($vote->score < 0) {
                return true;
            }
        });
    }

}
