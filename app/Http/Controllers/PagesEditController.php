<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Page;

class PagesEditController extends Controller
{
    public function execute(Page $page, Request $request) {
        
        if($request->isMethod('delete')){
            $inp = $page->toArray();
            unlink(public_path().'/asset/img/'.$inp['images']);
            $page->delete();
            return redirect()->route('pages')->with('status', 'Страница удалена');
        }
        
        if($request->isMethod('post')) {
            
            $input = $request->except('_token');
            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'alias' => 'required|max:255|unique:pages,alias,'.$input['id'],
                'text' => 'required'
            ]);
            
            if($request->hasFile('images')) {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path().'/asset/img', $input['images']);
            } else {
                $input['images'] = $input['old_images'];
            }
            
            unset($input['old_images']);
            $page->fill($input);
            if($page->save()){
                return redirect('pages')->with('status', 'Страница обновлена');
            }
            
            if($validator->fails()) {
                return redirect()->route('pagesEdit', ['page' => $input['id']])->withErrors($validator);
            }
        }
        
        $old = $page->toArray();
        if(view()->exists('admin.pages_edit')){
            $data = [
                'title' => 'Редактирование страницы - '.$old['name'],
                'data' => $old
            ];
            return view('admin.pages_edit', $data);
        }
    }
}
