<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Portfolio;

class PortfoliosEditController extends Controller
{
    public function execute(Portfolio $portfolio, Request $request) {
        
        if($request->isMethod('delete')) {
            $port = $portfolio->toArray();
            unlink(public_path().'/asset/img/'.$port['images']);
            $portfolio->delete();
            return redirect()->route('portfolios')->with('status', 'Запись удалена');
        }
        
        if($request->isMethod('post')) {
            $input = $request->except('_token');
            
            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'alias' => 'required|max:255'
            ]);
            
            if($validator->fails()) {
                return redirect()->route('portfoliosEdit', ['page' => $input['id']])->withErrors($validator)->withInput();
            }
            
            if($request->hasFile('images')) {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path().'/asset/img', $input['images']);
            } else {
                $input['images'] = $input['old_images'];
            }
            
            unset($input['old_images']);
            $portfolio->fill($input);
            if($portfolio->save()) {
                return redirect()->route('portfolios')->with('status', 'Страница изменена');
            }
        }
        
        $old = $portfolio->toArray();
        if(view()->exists('admin.fiels.portfolios_edit')) {
            $data = [
                'title' => 'Изменение страницы - '.$old['name'],
                'portfolio' => $old
            ];
            return view('admin.portfolios_edit', $data);
        }
    }
}
