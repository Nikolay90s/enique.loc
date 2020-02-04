<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Portfolio;

class PortfoliosAddController extends Controller
{
    public function execute(Portfolio $portfolios, Request $request) {
        
        if($request->isMethod('post')) {
            $input = $request->except('_token');
            
            $messages = [
                'required' => 'Поле :attribute обязательно',
            ];
            
            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'alias' => 'required|max:255'
            ], $messages);
            
            if($validator->fails()) {
                return redirect()->route('portfoliosAdd')->withErrors($validator)->withInput();
            }
            
            if($request->hasFile('images')) {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path().'/asset/img', $input['images']);
            }
            
            $portfolios->fill($input);
            if($portfolios->save()) {
                return redirect()->route('portfolios')->with('status', 'Портфолио добавлено');
            }
        }
        
        if(view()->exists('admin.portfolios_add')) {
            $data = [
                'title' => 'Новая запись'
            ];
            return view('admin.portfolios_add', $data);
        }
    }
}
