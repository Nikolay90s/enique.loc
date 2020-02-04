<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamsController extends Controller
{
    public function execute () {
        if(view()->exists('admin.teams')) {
            $teams = Team::all();
            $data = [
                'title' => 'Список команд',
                'teams' => $teams
            ];
            
            return view('admin.teams', $data);
        }
    }
}
