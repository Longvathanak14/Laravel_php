<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Form;
use Illuminate\Support\Facades\HTML;

class MenuController extends Controller
{
    public function index(Request $request)
{
    // $menus = Menu::all();
    $menus = Menu::query();

    if ($request->filled('search')) {
        $search = $request->query('search');
        $menus->where('name', 'like', "%{$search}%")
            ->orWhere('price', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%");
    }

    $menus = $menus->get();

    return view('menus.index', compact('menus'));
}

}
