<?php

class Category extends Eloquent {
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('name','description');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each category has many resources
    public function resources() {
        return $this->hasMany('Resource');
    }

}