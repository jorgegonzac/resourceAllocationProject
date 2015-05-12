<?php

class Schedule extends Eloquent {
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    protected $fillable = array('day', 'period', 'start_hour','end_hour');
    use SoftDeletingTrait;
    protected $table = 'schedules';
    protected $dates = ['deleted_at'];
    protected $softDelete = true;
    // DEFINE RELATIONSHIPS --------------------------------------------------

    // Each schedule belongs to many timetables
    // define our pivot table also
    public function timetables() {
        return $this->belongsToMany('Timetable', 'timetables_schedules', 'timetable_id', 'schedule_id');
    }

}