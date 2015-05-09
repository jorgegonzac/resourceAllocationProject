<?php

class Career extends Eloquent {
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    protected $fillable = array('name');

    use SoftDeletingTrait;
    protected $table = 'careers';
    protected $dates = ['deleted_at'];
    protected $softDelete = true;
      
    public function laboratories() {
        return $this->belongsToMany('Laboratory', 'careers_laboratories', 'career_id', 'laboratory_id');
    }
}
