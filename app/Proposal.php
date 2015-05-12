<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model {
    
    /**
     * Protect against mass assignment
     */
    protected $fillable = [
        'title',
        'description',
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
     * Return formatted date (e.g. 14 minutes ago)
     */
    public function getDateCreatedAttribute()
    {
        return $this->created_at->diffForHumans();
    }

}
