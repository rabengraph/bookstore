<?php

return [

    /*
    * Edit this file in order to configure your theme's
    * classes autoloading. Classes are loaded using PSR-4.
    *
    * The key is the namespace and key's value contains one or more paths to your classes.
    */
    'Theme\\Controllers\\' => themosis_path('theme.resources').'controllers',
    'Theme\\Models\\' => themosis_path('theme.resources').'models',
    'Theme\\Providers\\' => themosis_path('theme.resources').'providers',

    'Entity\\'  => [
        themosis_path('theme.resources').'entities'
    ],
    'Repository\\'  => [
        themosis_path('theme.resources').'repositories'
    ],
    'Converter\\'  => [
        themosis_path('theme.resources').'converter'
    ],
];
