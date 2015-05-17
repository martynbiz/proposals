<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent {
    
    // attributes
    
    /**
     * Return formatted date (e.g. 14 minutes ago)
     */
    public function getDateCreatedAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    
    /**
     * Return formatted date (e.g. 14 minutes ago)
     */
    public function getDateUpdatedAttribute()
    {
        return $this->updated_at->diffForHumans();
    }
    
    /**
     * Return formatted date (e.g. 14 minutes ago)
     */
    public function getDateDeletedAttribute()
    {
        return $this->deleted_at->diffForHumans();
    }

}
