<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
        'logout',
        'create_user',
        'login',
        'add_police_station',
        'list_police_station',
        'save_police_station',
        'homepage_police_station',
        'inactive_police_station',
        'p_activate',
        'p_deactivate',
        'add_field_officers',
        'case',
        'save_missing_person',
        'list_missing_person',
        'save_wanted_criminal',
        'list_wanted_criminal',
        'save_carnapped',
        'list_carnapped',
        'save_add_field_officers',
        'save_user_profile',
        'update_criminal',
        'update_carnapped',
        'ajax_today_missing_p',
        'ajax_today_missing_v',
        'ajax_today_missing_w',
        'police_officer_deactivate',
        'police_officer_activated',
        'showall',
        'close_case_criminal',
        'close_case_carnapped',
        'close_case_missing_person',
        'request_deactivation_officer',
        'request_approved_by_super_admin',
        'update_missing_person',
        
    ];
}