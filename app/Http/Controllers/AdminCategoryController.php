<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    //


    public function tableShow()
    {

        $categories = Category::all();


        return view('admin.category.table',compact('categories'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $count = count($request->input('name'));


        for ($i = 0; $i <= $count; $i++) {
            if (empty($input['name'][$i]) || !is_string($input['name'][$i])) continue;
            $data = [
                'name' => $input['name'][$i],
                'status' => $input['status'][$i],

            ];
            Category::create($data);




        }



        return back()->with('success', 'Category(s) added successfully');

    }

    public function bulkDelete(Request $request)
    {

        $categories = $request->input('categoryID');

        $category = Category::whereIn('id', $categories);



        switch ($request->input('action')) {
            case 'delete':
                $category->delete();
                return back()->with('fail', "Brand(s) has been deleted");
                break;


        }
    }

    public function edit($id)
    {

        $category = Category::find($id);

        return view('admin.category.edit-category',compact('category'));
    }

    public function update(Request $request,$id)
    {

        $category = Category::find($id);
        $input = $request->all();
        $category->update($input);

        return redirect()->route('admin.category.show')->with('success', "Category has been updated");


    }


}
