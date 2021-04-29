<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Page::where('id', '!=', 0)->orderBy("created_at","asc")->paginate(3);
        return view('admin.viewPage', compact('pages'));
    }

    public function create()
    {
        return view('admin.addPage');
    }


    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:4|unique:pages',
            'desc' => 'required|min:25',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('assets/images/pages/'), $imageName);

        $var = new Page();
        $var->name = $request->input('name');
        $var->desc = $request->input('desc');
        $var->image = $imageName;
        $var->user_id = 0;
        $var->save();
        return back()->with('success', 'Page created successfully.');
    }

    public function destroy($id)
    {
        $page = Page::find($id);

        File::delete(public_path('assets/images/pages/'.$page->image));

        $page->delete();
        return back()->with('success', 'Page deleted!');
    }

}
