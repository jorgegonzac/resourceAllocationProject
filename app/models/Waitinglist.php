<?php

class Waitinglist extends Eloquent {
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('start_date','end_date','resource_id','user_id');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    
    // each waitinglist BELONGS to a resource
    public function resource(){
        return $this->belongsTo('Resource');
    }

    public function user(){
        return $this->belongsTo('User');
    }

}