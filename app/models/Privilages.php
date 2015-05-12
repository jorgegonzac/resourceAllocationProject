<?php

class Privilages extends Eloquent {
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('name');
    use SoftDeletingTrait;
    protected $table = 'privilages';
    protected $dates = ['deleted_at'];
    protected $softDelete = true;

    // DEFINE RELATIONSHIPS --------------------------------------------------
    
    // each role BELONGS to many privilages
    // define our pivot table also
    public function roles() {
        return $this->belongsToMany('Role', 'roles_privilages', 'role_id', 'privilages_id');
    }


}