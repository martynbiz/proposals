<?php namespace App;

class ProposalVersion extends Model {
    
    /**
     * Protect against mass assignment
     */
    protected $fillable = [
        'title_unified',
        'title',
        'content_unified',
        'content',
        'versioned_at',
    ];

}
