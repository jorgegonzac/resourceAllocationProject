<?php

class Laboratory extends Eloquent {
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    protected $fillable = array('name', 'building','user_id');
    use SoftDeletingTrait;
    protected $table = 'laboratories';
    protected $dates = ['deleted_at'];
    protected $softDelete = true;

    // DEFINE RELATIONSHIPS --------------------------------------------------
    
    public function careers() {
        return $this->belongsToMany('Career', 'careers_laboratories', 'career_id', 'laboratory_id');
    }
    
    public function resources() {
        return $this->hasMany('Resource');
    }
    public function user(){
        return $this->belongsTo('User');        
    }
}
