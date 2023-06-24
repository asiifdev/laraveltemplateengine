<?php

use App\Models\Menu;
use App\Models\User;
use App\Models\Identity;
use Illuminate\Support\Str;
use App\Models\DashboardLayout;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

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
    $data = [];
    if (Schema::hasTable('identities')) {
        $data = Identity::first();
    }
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
    if (Schema::hasTable('identities')) {
        if ($id) {
            $user = User::find($id);
            $role_id = $user->roles->first()->id;
            $data = Role::find($role_id);
        } else {
            $data = Role::all();
        }
    }
    return $data;
}

/**
 * Mendapatkan Data Menu di path sekarang
 * @author ASIIFDEV <asiif.anwar3@gmail.com>
 * @property $url of user to get his role
 * @param string $url
 * @return object
 */
function getCurrentMenu()
{
    $data = [];
    if (Schema::hasTable('identities')) {
        $url = "/" . request()->path();
        if ($url == "//") {
            $url = "/";
        }
        $data = Menu::where('url', $url)->first();
    }
    return $data;
}

/**
 * Mendapatkan Semua Menu di DB
 * @author ASIIFDEV <asiif.anwar3@gmail.com>
 * @property $url of user to get his role
 * @param string $url
 * @return object
 */
function getAllMenu()
{
    $data = [];
    if (Schema::hasTable('identities')) {
        $data = Menu::with('icons')->get();
    }
    return $data;
}

/**
 * Mendapatkan Data Namespace dari Tabel Menu di DB
 * @author ASIIFDEV <asiif.anwar3@gmail.com>
 * @property $url of user to get his role
 * @return string
 */
function getNameSpace()
{
    $use = "use";
    if (Schema::hasTable('identities')) {
        $menu = Menu::all();
        foreach ($menu as $item) {
            $use .= " " . $item->pathClass . "; ";
        }
    }
    return $use;
}

/**
 * Mendapatkan Routing berdasarkan Tabel Menu di DB
 * @author ASIIFDEV <asiif.anwar3@gmail.com>
 * @property $url of user to get his role
 */
function getRouting()
{
    if (Schema::hasTable('identities')) {
        $menu = Menu::all();
        foreach ($menu as $item) {
            $route = Route::get($item->url, $item->pathClass)->name($item->slug);
        }
    }
    return $route;
}

/**
 * Mendapatkan layout dashboard admin
 * @author ASIIFDEV <asiif.anwar3@gmail.com>
 * @return array
 */
function getLayout()
{
    $html = null;
    if (Schema::hasTable('identities')) {
        $layout = DashboardLayout::first();
        if ($layout) {
            $array = [];
            $data = [];
            $array['placement'] = $layout->placement;
            $array['behaviour'] = $layout->behaviour;
            $array['radius'] = $layout->radius;
            $array['color'] = $layout->color;
            $array['navcolor'] = $layout->navcolor;
            $data['attributes'] = (object) $array;
            $data['layout'] = $layout->layout;
            $data['footer'] = $layout->footer;
            $data['storagePrefix'] = Str::slug(getIdentity()->name);
            $data['showSettings'] = false;
            $html = ["override" => json_encode($data)];
        }
    }

    return $html;
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
function getAvatar($email, $s = 80, $d = 'wavatar', $r = 'g', $img = false, $atts = array())
{
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5(strtolower(trim($email)));
    $url .= "?s=$s&d=$d&r=$r";
    if ($img) {
        $url = '<img src="' . $url . '"';
        foreach ($atts as $key => $val)
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}
