<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Team;

class TeamsAddController extends Controller
{
    public function execute(Request $request) {
        
        if($request->isMethod('post')) {
            $input = $request->except('_token');
            
            $messages = ['required' => 'Поле :attribute обязательно'];
            
            $validator = Validator::make($input, [
               'name' => 'required|max:255',
               'prof' => 'required|max:255',
               'text' => 'required|max:255' 
            ], $messages);
            
            if($validator->fails()){
                return redirect()->route('teamsAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('images')) {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path().'/asset/img', $input['images']);
            }
            
            $team = new Team();
            $team->fill($input);
            
            if($team->save()) {
                return redirect()->route('teams')->with('status', 'Страница добавлена');
            }
        }
        
        if(view()->exists('admin.teams_add')) {
            $data = [
                'title' => 'Добавить члена команды'
            ];
            return view('admin.teams_add', $data);
        }
        abort(404);
    }
}
