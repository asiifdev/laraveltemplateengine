<?php

use App\Models\Menu;
use App\Models\User;
use App\Models\Identity;
use Illuminate\Support\Str;
use App\Models\DashboardLayout;
use App\Models\MigrationForm;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Connection;
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
    $data = Identity::first();
    return $data;
}

/**
 * getProfile
 * @author ASIIFDEV <asiif.anwar3@gmail.com>
 * @return object
 */
function getProfile()
{
    $data = auth()->user();
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
    if ($id) {
        $user = User::find($id);
        $role_id = $user->roles->first()->id;
        $data = Role::find($role_id);
    } else {
        $data = Role::all();
    }
    return $data;
}

/**
 * Mendapatkan form dari masing2 menu
 * @author ASIIFDEV <asiif.anwar3@gmail.com>
 * @property $id of user to get his form
 * @param int $id
 * @return object
 */
function getForm($id)
{
    $data = MigrationForm::where('migration_id', $id)->where('is_show', true)->get();
    return $data;
}

// /**
//  * Mendapatkan form dari masing2 menu
//  * @author ASIIFDEV <asiif.anwar3@gmail.com>
//  * @property $id of user to get his form
//  * @param int $id
//  * @return object
//  */
// function getTableData($id)
// {
//     $data = [];
//     $form = MigrationForm::where('migration_id', $id)->where('is_show', true)->get('column');
//     foreach($form as $item){

//     }
//     return $data;
// }

/**
 * Mendapatkan Data Menu di path sekarang
 * @author ASIIFDEV <asiif.anwar3@gmail.com>
 * @return object
 */
function getCurrentMenu()
{
    $data = [];
    $url = "/" . request()->path();
    $data = Menu::where('url', $url)->with('parent')->first();
    // dd($url);
    return $data;
}

/**
 * Mendapatkan Data Menu di path sekarang
 * @author ASIIFDEV <asiif.anwar3@gmail.com>
 * @return bool
 */
function getActiveNavbar($url)
{
    $hasil = false;
    $path = "/" . request()->path();
    $cek = Menu::where('url', $path)->first();
    if ($cek != NULL) {
        if ($url == $cek->url) {
            $hasil = true;
        }
    }
    // dd($path);

    return $hasil;
}

/**
 * Multidimension Array to Single Array
 * @author ASIIFDEV <asiif.anwar3@gmail.com>
 * @property $array to convert
 * @param array $array
 * @return mixed
 */
function array_flatten($array)
{
    if (!is_array($array)) {
        return FALSE;
    }
    $result = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, array_flatten($value));
        } else {
            $result[$key] = $value;
        }
    }
    return $result;
}

/**
 * Mendapatkan Breadcrumbs di menu
 * @author ASIIFDEV <asiif.anwar3@gmail.com>
 * @return object
 */
function getBreadCrumbs()
{
    $path = request()->segments();
    $urls = [];
    $menu = Menu::all();
    $url = "/";
    foreach ($path as $item) {
        $url .= $item . "/";
        $menu = Menu::where('url', substr_replace($url, "", -1))->first();
        $dashboardUrl = $url == "/" . getIdentity()->path ? "Dashboard" : "Entah";
        $name = $menu ? $menu->name : $dashboardUrl;
        $data = [
            $url => $name
        ];
        $urls[] = $data;
    }
    // dd(array_flatten($urls));
    return array_flatten($urls);
}


/**
 * Mendapatkan Semua Menu di DB
 * @property $parent_id optional parent ID
 * @param int $parent_id
 * @author ASIIFDEV <asiif.anwar3@gmail.com>
 * @return object
 */
function getAllMenu($parent_id = false)
{
    $data = Menu::with('icons', 'child')->orderBy('urutan', 'ASC')->where('parent_id', 0)->get();
    if ($parent_id) {
        $data = Menu::with('icons', 'child')->orderBy('urutan', 'ASC')->where('parent_id', $parent_id)->get();
    }
    return $data;
}

/**
 * Get Collection Roles With Custom Symbol
 * @author ASIIFDEV <asiif.anwar3@gmail.com>
 * @property $roles of user to get his role
 * @property $symbol to set jeda antar string role
 * @param array $roles
 * @param string $symbol
 * @return string
 */
function collectionOfRoles($roles, $symbol = "")
{
    $data = str_replace('"', "", str_replace(",", "|", $symbol . $roles));
    // dd($data);
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
    $menu = Menu::all();
    foreach ($menu as $item) {
        $use .= " " . $item->pathClass . "; ";
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
    $route = Route::middleware(['auth'])->name('admin.')->group(function () {
        $menu = Menu::with('child')->where('parent_id', 0)->get();
        foreach ($menu as $item) {
            $url_parent = $item->slug;
            if (count($item->child) > 0) {
                foreach ($item->child as $child) {
                    Route::get($item->url, $item->pathClass)->middleware([collectionOfRoles($item->roles, "role:")])->name($item->slug);
                    Route::get($child->url, $child->pathClass)->middleware([collectionOfRoles($child->roles, "role:")])->name($url_parent . "." . $child->slug);
                }
                if (count($child->child) > 0) {
                    foreach ($child->child as $childs) {
                        Route::get($childs->url, $childs->pathClass)->middleware([collectionOfRoles($childs->roles, "role:")])->name($url_parent . "." . $childs->slug);
                    }
                }
            } else {
                Route::get($item->url, $item->pathClass)->middleware([collectionOfRoles($item->roles, "role:")])->name($item->slug);
            }
        }
    });
    return $route;
}

/**
 * Mendapatkan layout dashboard admin
 * @author ASIIFDEV <asiif.anwar3@gmail.com>
 * @return array
 */
function getLayout()
{
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
    } else {
        $html = null;
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

function getTableColumns($table = false)
{
    if ($table) {
        $q = DB::select('DESCRIBE ' . $table);
        return $q;
    }
    $data = [];
    $table = DB::getSchemaBuilder()->getAllTables();
    $dbName = 'Tables_in_' . DB::getDatabaseName();
    foreach ($table as $item) {
        $q = DB::select('DESCRIBE ' . $item->$dbName);
        $data[$item->$dbName] = $q;
    }
    return $data;
}
