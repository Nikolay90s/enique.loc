<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Service;
use App\Portfolio;
use App\Team;
use Mail;

class IndexController extends Controller
{
    public function execute(Request $request){
        
        if($request->isMethod('post')){
            
            $messages = [
                'required' => 'Поле обязательно к заполнению',
                'email' => 'Поле обязательно к заполнению'
            ];
            
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'text' => 'required'
            ],$messages);
            
            $data = $request->all();
            $result = Mail::send('site.mail', ['data' => $data], function($message) use ($data) {
                $message->from($data['email'], $data['name']);
                $message->to('admin@admin.ru')->subject('Question');
            });
            
            if($result) {
                return redirect()->route('home1')->with('status', 'Send');
            }
        }
        
        $pages = Page::all();
        $services = Service::all();
        $portfolios = Portfolio::all();
        $teams = Team::all();
        
        $menu = array();
        foreach ($pages as $page){
            $item = array('title' => $page->name, 'alias' => $page->alias);
            array_push($menu, $item);
        }
        
        $item = array('title' => 'Services', 'alias' => 'service');
        array_push($menu, $item);
        
        $item = array('title' => 'Portfolio', 'alias' => 'Portfolio');
        array_push($menu, $item);
        
        $item = array('title' => 'Clients', 'alias' => 'clients');
        array_push($menu, $item);
        
        $item = array('title' => 'Team', 'alias' => 'team');
        array_push($menu, $item);
        
        $item = array('title' => 'Contact', 'alias' => 'contact');
        array_push($menu, $item);
        
        return view('site.index', array(
            'title' => 'Unique',
            'menu' => $menu,
            'pages' => $pages,
            'services' => $services,
            'portfolios' => $portfolios,
            'teams' => $teams
        ));
    }
}
