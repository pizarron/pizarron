<?php
class Organization extends Eloquent {
    public function courses() {
        return $this->hasMany('Course');
    }

    public function admins() {
        return $this->belongsToMany('User', 'organization_admin');
    }
}
