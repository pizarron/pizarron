<?php
foreach(glob(app_path().'/routes/*.php') as $filename) {
    include($filename);
}

/**
 * All view composers will be added here, as index and register
 * has the same register widget, both need a composer.
 *
 * More than one composers can be added to the same view ;)
 */
View::composer('home.index', 'ComposerHelper@getCountries');
View::composer('home.register', 'ComposerHelper@getCountries');
View::composer('profile.edit', 'ComposerHelper@getCountries');

/**
 * All html macros are added here
 * TODO: the same as composers, there should be a way to put them
 * in other file such as macros.php
 */
Form::macro('country', function($code) {
    return FormHelper::getCountry($code);
});
Form::macro('formatDate', function($date) {
    // month name day, year
    return date('F d, o', $date->getTimeStamp());
});
