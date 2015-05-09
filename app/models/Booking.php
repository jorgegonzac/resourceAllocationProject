<?php

class Booking extends Eloquent {
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('start_date','end_date','return_date','resource_id','user_id');
    use SoftDeletingTrait;
    protected $table = 'bookings';
    protected $dates = ['deleted_at'];
    protected $softDelete = true;

    // DEFINE RELATIONSHIPS --------------------------------------------------
    
    // each waitinglist BELONGS to a resource
    public function resource(){
        return $this->belongsTo('Resource');
    }

    public function user(){
        return $this->belongsTo('User');
    }

}