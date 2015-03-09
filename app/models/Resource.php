<?php

class Resource extends Eloquent {
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    protected $fillable = array('name', 'description', 'image','category_id','laboratory_id','tags');

    // DEFINE RELATIONSHIPS --------------------------------------------------

    // each resource belongs to a lab
    public function laboratory() {
        return $this->belongsTo('Laboratory');
    }

    // each resource belongs to a category
    public function category() {
        return $this->belongsTo('Category');
    }
    
    // each resource BELONGS to many timetables
    // define our pivot table also
    public function timetables() {
        return $this->belongsToMany('Timetable', 'timetables_resources', 'resource_id', 'timetable_id');
    }

    public function waitingList(){
        return $this->hasMany('WaitingList');        
    }

    public function bookings(){
        return $this->hasMany('Booking');        
    }

}