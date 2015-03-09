<?php

class User extends Eloquent {
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('first_name', 'last_name', 'email','school_id');

    // DEFINE RELATIONSHIPS --------------------------------------------------

    // each user BELONGS to many resources --waiting_list
    // define our pivot table also
    public function roles() {
        return $this->belongsToMany('Role', 'users_roles', 'user_id', 'role_id');
    }

    public function waitingList(){
        return $this->hasMany('WaitingList');        
    }

    public function career(){
        return $this->hasOne('Career');
    }
    

}