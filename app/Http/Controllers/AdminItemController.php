<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\History;
use App\Item;
use Illuminate\Http\Request;

class AdminItemController extends Controller
{

    public function history($id)
    {

        $histories = History::where('item_id',$id)->get();
        return view('admin.item.history',compact('histories'));
    }
    public function tableShow()
    {

        $categories = Category::all()->where('status','active');
        $brands = Brand::all()->where('status','active');
        $items = Item::with('histories')->get();

        return view('admin.item.table',compact('categories','brands','items'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $count = count($request->input('name'));


        for ($i = 0; $i <= $count; $i++) {
            if (empty($input['name'][$i]) || !is_string($input['name'][$i])) continue;
            $data = [
                'name' => $input['name'][$i],
                'category_id' =>$input['category'][$i],
                'brand_id' =>$input['brand'][$i],
                'quantity'=>$input['quantity'][$i],
                'price'=>$input['price'][$i],
                'status' => $input['status'][$i],

            ];
            Item::create($data);




        }



        return back()->with('success', 'Category(s) added successfully');
    }


    public function bulkDelete(Request $request)
    {

        $items = $request->input('itemID');

        $item = Item::whereIn('id', $items);



        switch ($request->input('action')) {
            case 'delete':
                $item->delete();
                return back()->with('fail', "Item(s) has been deleted");
                break;


        }
    }


    public function edit($id)
    {

        $item= Item::find($id);
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.item.edit-item',compact('item','brands','categories'));
    }

    public function update(Request $request,$id)
    {


        if($request->remove == null && $request->add == null && $request->price == null)
        {
            $item = Item::find($id);
            $current = $item->add;
            $item->name = $request->name;
            $item->category_id = $request->category_id;
//            $item->quantity = $item->quantity-$request->remove;
//            $item->quantity = $item->quantity+$request->add;
            $item->price = $request->price;
            $item->status = $request->status;



            if(0 >  $item->quantity )
            {
                return redirect()-> back()->with('error','Quantity  should not be negative');
            }else
            {
                $item->update();
            }
//        $history = new  History();
//        $history->item_id = $item->id;
//        $history->body =
//            "In =" +

            return redirect()->route('admin.item.show')->with('success', "Item has been updated");
        }
        else
        {
//            $this->Validate($request, [
//                'remove' => 'nullable|numeric|min:1',
//                'add' => 'integer' ,
//                'price' => 'integer:',
//
//            ]);


            $item = Item::find($id);
            $current = $item->add;
            $item->name = $request->name;
            $item->category_id = $request->category_id;
            $item->quantity = $item->quantity-$request->remove;
            $item->quantity = $item->quantity+$request->add;
            $item->price = $request->price;
            $item->status = $request->status;



            if(0 >  $item->quantity )
            {
                return redirect()-> back()->with('error','Quantity  should not be negative');
            }else
            {

                $item->update();

                $history = new History();
                $history->body = "Item Added= " . $request->add . " / " . "Item Removed= " . $request->remove . " / ". "Price Change= " . $request->price;
                $history->item_id = $item->id;
                $history->save();

            }
//        $history = new  History();
//        $history->item_id = $item->id;
//        $history->body =
//            "In =" +

            return redirect()->route('admin.item.show')->with('success', "Item has been updated");
        }






    }



}
