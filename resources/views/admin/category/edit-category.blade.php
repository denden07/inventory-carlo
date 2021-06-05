@extends('layouts._dashboard')







@section('status-category')
    active
@endsection

@section('css')


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('custom/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/design.css')}}">
@endsection

@section('contents')
    <h3 style="text-align: center">Edit Brand</h3>
    <div class="card" style="width: 30%; margin-left: 35%;padding: 20px;border: 1px solid black">
        <form action="{{route('category.update',$category->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label style="color: black" for="">Name</label>
                <input type="text" class="form-control" id="" name="name" value="{{$category->name}}">

            </div>
            <div class="form-group">
                <label style="color: black" for="status"> Status:  </label>
                <select name="status" id="brand-status">
                    <option disabled="">
                        Select
                    </option>
                    <option

                            @if($category->status == 'active')

                            selected='selected'
                            @endif
                            value="active">Active</option>
                    <option
                            @if($category->status == 'inactive')

                            selected='selected'
                            @endif
                            value="inactive">Inactive</option>
                </select>
            </div>

            <button style="text-align: center" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection