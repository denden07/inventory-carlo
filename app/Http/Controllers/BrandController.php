<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;


class BrandController extends Controller
{
    //

    public function tableShow()
    {

        $brands = Brand::all();


        return view('admin.brand.table',compact('brands'));
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
            Brand::create($data);




        }



        return back()->with('success', 'Brands(s) added successfully');



    }

    public function bulkDelete(Request $request)
    {

        $brand = $request->input('brandID');

        $brands = Brand::whereIn('id', $brand);



        switch ($request->input('action')) {
            case 'delete':
                $brands->delete();
                return back()->with('fail', "Brand(s) has been deleted");
                break;

            case 'update':
                $brando = $brands->first();
                $brando->update($request->all());
                return back()->with('success', "Brand has been updated");
                break;
        }
    }

    public function edit($id)
    {

        $brand = Brand::find($id);

        return view('admin.brand.edit-brand',compact('brand'));
    }

    public function update(Request $request,$id)
    {

        $brand = Brand::find($id);
        $input = $request->all();
        $brand->update($input);

        return redirect()->route('admin.table.show')->with('success', "Brand has been updated");


    }




}
