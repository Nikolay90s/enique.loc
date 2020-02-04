<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    public function execute($alias){
        if(!$alias){
            abort(404);
        }
        
        $page = Page::where('alias', $alias)->first();
        if(view()->exists('site.page')){
            $data = [
                'title' => $page->name,
                'page' => $page
            ];
            
            return view('site.page', $data);
        } else {
            abort(404);
        }
    }
}
