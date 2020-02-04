<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Team;

class TeamsEditController extends Controller
{
    public function execute(Team $team, Request $request) {
        
        if($request->isMethod('delete')) {
            $port = $team->toArray();
            unlink(public_path().'/asset/img/'.$port['images']);
            $team->delete();
            return redirect()->route('teams')->with('status', 'Запись удалена');
        }
        
        if($request->isMethod('post')) {
            $input = $request->except('_token');
            
            $validator = Validator::make($input, [
               'name' => 'required|max:255',
               'prof' => 'required|max:255',
               'text' => 'required|max:255'
            ]);
            if($validator->fails()) {
                return redirect()->route('teamsEdit', ['team' => $input['id']])->withErrors($validator);
            }
            
            if($request->hasFile('images')) {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                dd($input);
                $file->move(public_path().'/asset/img', $input['images']);
            } else {
                $input['images'] = $input['old_images'];
            }
            
            unset($input['old_images']);
            $team->fill($input);
            if($team->save()){
                return redirect()->route('teams')->with('status', 'Обновлено');
            }
        }
        
        if(view()->exists('admin.teams_edit')) {
            $teams = $team->toArray();
            $data = [
                'title' => 'Изменение члена команды - '.$teams['name'],
                'team' => $teams
            ];
            return view('admin.teams_edit', $data);
        } else {
            abort(404);
        }
    }
}
