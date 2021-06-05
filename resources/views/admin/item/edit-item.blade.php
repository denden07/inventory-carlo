@extends('layouts._dashboard')







@section('status-item')
    active
@endsection


@section('css')


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('custom/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/design.css')}}">
    <style>
        .form-error {

            border: 2px solid #e74c3c;
        }
    </style>
@endsection

@section('contents')
    <a style="margin-left: 15px;margin-top: 15px" href="{{route('admin.item.show')}}" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i>  Back</a>
    @include('layouts._messages')

    <h3 style="text-align: center">Edit Item</h3>
    <div class="card" style="width: 30%; margin-left: 35%;padding: 20px;border: 1px solid black">
        <form action="{{route('item.update',$item->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input required name="name" class="form-control" id="category-name" type="text" value="{{$item->name}}">
            </div>

            <div class="form-group">
                <label style="color: black" for="status"> Brand:  </label>
                <select name="brand_id" id="brand-status">
                    <option disabled="">
                        Select
                    </option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $brand->id == $item->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>







            <div class="form-group">
                <label style="color: black" for="category"> Category:  </label>
                <select name="category_id" id="brand-status">
                    <option disabled="">
                        Select
                    </option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <p>QTY: {{$item->quantity}}</p>
            </div>

            <div class="form-group">
                <label for="remove">Remove:</label>
                <input  name="remove" class="form-control {{($errors->first('remove') ? " form-error" : "")}}" id="category-name" type="number" >
                {!! $errors->first('remove', '<p class="help-block">Should not be negative!</p>') !!}
            </div>

            <div class="form-group">
                <label for="add">Add:</label>
                <input  name="add" class="form-control" id="category-name" type="number" >
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input required name="price" class="form-control" id="category-name" type="number" value="{{$item->price}}">
            </div>

            <div class="form-group">
                <label style="color: black" for="status"> Status:  </label>
                <select name="status" id="brand-status">
                    <option disabled="">
                        Select
                    </option>
                    <option

                            @if($item->status == 'active')

                            selected='selected'
                            @endif
                            value="active">Active</option>
                    <option
                            @if($item->status == 'inactive')

                            selected='selected'
                            @endif
                            value="inactive">Inactive</option>
                </select>
            </div>

            <button style="text-align: center" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection

