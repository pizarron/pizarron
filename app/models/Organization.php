<?php
class Organization extends Eloquent {
    public function courses() {
        return $this->hasMany('Course');
    }

    public function admins() {
        return $this->belongsToMany('User', 'organization_admin');
    }

    public function isAdmin($userId) {
        $admins = $this->admins()->whereRaw('user_id = ?', [$userId])->get();
        return count($admins) > 0;
    }
}
