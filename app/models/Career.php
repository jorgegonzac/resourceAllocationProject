<?php

class Career extends Eloquent {
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    protected $fillable = array('name');
      
    public function laboratories() {
        return $this->belongsToMany('Laboratory', 'careers_laboratories', 'career_id', 'laboratory_id');
    }
}
