<?php
class FormHelper {
    public static function getCountry($countryCode='BO') {
        $country = Country::where('code', '=', $countryCode)->first();
        return $country->name;
    }
}
