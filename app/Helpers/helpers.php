<?php

use App\Models\Identity;
use App\Models\User;
use Spatie\Permission\Models\Role;

if (!function_exists('moneyFormat')) {
    /**
     * Convert integer to Indonesian Money Format
     * @author ASIIFDEV <asiif.anwar3@gmail.com>
     * @param mixed $str
     * @return string
     */
    function moneyFormat(int $str)
    {
        $formated = 'Rp. ' . number_format($str, '0', '', '.');
        return $formated;
    }
}

/**
 * getIdentity
 * @author ASIIFDEV <asiif.anwar3@gmail.com>
 * @return object
 */
function getIdentity()
{
    $data = Identity::first();
    return $data;
}

/**
 * Mendapatkan list semua role atau ambil role dari seorang user
 * @author ASIIFDEV <asiif.anwar3@gmail.com>
 * @property $id of user to get his role
 * @param int $id
 * @return object
 */
function getRoles($id)
{
    $data = [];
    if($id){
        $user = User::find($id);
        $role_id = $user->roles->first()->id;
        $data = Role::find($role_id);
    }
    else{
        $data = Role::all();
    }
    return $data;
}

/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mp | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param bool $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return string containing either just a URL or a complete image tag
 * @source https://gravatar.com/site/implement/images/php/
 */
function getAvatar( $email, $s = 80, $d = 'wavatar', $r = 'g', $img = false, $atts = array() ) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}
