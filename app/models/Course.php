<?php
class Course extends Eloquent {
    public function organization() {
        return $this->belongsTo('Organization');
    }
    public function user() {
        return $this->belongsTo('User');
    }
}
