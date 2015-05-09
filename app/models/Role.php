<?php

class Role extends Eloquent {
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('name');
    use SoftDeletingTrait;
    protected $table = 'roles';
    protected $dates = ['deleted_at'];
    protected $softDelete = true;

    // DEFINE RELATIONSHIPS --------------------------------------------------

    // each role BELONGS to many privilages
    // define our pivot table also
    public function privilages() {
        return $this->belongsToMany('Privilages', 'roles_privilages', 'role_id', 'privilages_id');
    }

   // each privilage BELONGS to many roles
    // define our pivot table also
    public function users() {
        return $this->belongsToMany('User', 'users_roles', 'user_id', 'role_id');
    }

}