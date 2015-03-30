<?php

class Timetable extends Eloquent {
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('description');

    // DEFINE RELATIONSHIPS --------------------------------------------------

    // each timetable belongs to many schedules

    public function schedules() {
        return $this->belongsToMany('Schedule', 'timetables_schedules', 'timetable_id', 'schedule_id');
    }

}