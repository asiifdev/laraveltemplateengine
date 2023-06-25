<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menu = Menu::all();
        foreach ($menu as $item) {
            $route = [str_replace('"', "", str_replace(",", "|", 'role:' . $item->roles))];
            $group[] = $route;
        }
        // dd($group);
        dd(getRouting());
        return view('home');
    }
}
