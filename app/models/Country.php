<?php
class Country extends Eloquent {
    public $fillable = array('code', 'name');
    public $table = 'countries';
}
