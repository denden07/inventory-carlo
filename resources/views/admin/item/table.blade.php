@extends('layouts._dashboard')







@section('status-item')
    active
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('custom/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/design.css')}}">

@endsection


@section('contents')

    <h3 class="brand-banner">Items Table</h3>
    @include('layouts._messages')
    <form id="deleteCategory" action="{{route('item.bulk.delete')}}" method="post">
        @csrf
        @include('parts._modalItemsDelete')
        <button  type="button" class=" btn btn-primary brand-add-button " data-toggle="modal" data-target="#addItem">
            Add Item
        </button>

        <button  type="button" class=" btn btn-warning brand-delete-button" data-toggle="modal" data-target="#deleteModalItem" >
            Delete Items
        </button>



        <div  class="item-table-design">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th style="color: black" colspan="1"><input id="select-all-item" type="checkbox" onclick="checkAll(this)"></th>
                    <th style="color: black" colspan="1">Id</th>
                    <th style="color: black">Name</th>
                    <th style="color: black">Brand</th>
                    <th style="color: black">Category</th>
                    <th style="color: black">QTY</th>
                    <th style="color: black">Price</th>
                    <th style="color: black">Date Added</th>
                    <th style="color: black">Status</th>
                    <th style="color: black">Action</th>
                </tr>
                </thead>
                <tbody>
                @if($items)
                    @foreach($items as $item)

                        <tr >
                            <td colspan="1" ><input id="id{{$item->id}}" type="checkbox" name="itemID[]" value="{{$item->id}}"></td>
                            <td colspan="1">{{$item->id}}</td>
                            <td><a href="{{route('item.history',['id'=>$item->id])}}" >{{$item->name}}</a></td>
                            <td>{{$item->brand->name}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->created_at->todatestring()}}</td>
                            <td>{{$item->status}}</td>
                            <td>


                                <a href="{{route('item.edit',['id'=>$item->id])}}">
                                    <button     type="button" class=" btn btn-primary  ">
                                        <i  class="fas fa-edit"></i>
                                    </button>
                                </a>






                                <button  onclick="document.getElementById('id{{$item->id}}').checked = true"   type="button" class=" btn btn-danger" data-toggle="modal" data-target="#deleteModalItem" >
                                    <i  class="fas fa-trash"></i>
                                </button>


                            </td>

                        </tr>

                    @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>

                    <th colspan="1" ><input id="select-all-enlistment" type="checkbox" onclick="checkAll(this)"></th>
                    <th colspan="1">Id</th>

                    <th>Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>QTY</th>
                    <th>Price</th>
                    <th>Date Added</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>

        <!-- Modal -->
    </form>

    @include('parts._modalItemsAdd')

@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>


    <script>
        $(document).ready(function(){
            var i=1;
            $('#dynamic_field').on("click","#add" ,function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"> <td> <label for="name">Name:</label>\n' +
                    '                    <input name="name[]" id="category-name" type="text">\n' +
                    '\n' +

                    '\n' +
                    '          <td>     <label for="category"> Category:  </label>\n' +
                    '                    <select required name="category[]" id="category-status">\n' +
                        ' <option selected="selected" disabled="">Select</option>\n'+
                        '  @foreach($categories as $category)\n'+
                        '<option value="{{$category->id}}">{{$category->name}}</option>\n'+
                        '       @endforeach\n'+

                    '                    </select></td>\n' +
                    '\n' +
                    '          <td>     <label for="brand"> Brand:  </label>\n' +
                    '                    <select required name="brand[]" id="category-status">\n' +
                    ' <option selected="selected" disabled="">Select</option>\n'+
                    '  @foreach($brands as $brand)\n'+
                    '<option value="{{$brand->id}}">{{$brand->name}}</option>\n'+
                    '       @endforeach\n'+

                    '                    </select></td>\n' +

                    ' <td>\n'+
                    '<label for="quantity">QTY:</label>\n'+
                    '<input required name="quantity[]" id="category-name" type="text">\n'+

                    '</td>\n'+
                    ' <td>\n'+
                    '<label for="price">Price:</label>\n'+
                    '<input required name="price[]" id="category-name" type="text">\n'+

                    '</td>\n'+




                    '\n' +

                    '          <td>     <label for="status"> Status:  </label>\n' +
                    '                    <select name="status[]" id="category-status">\n' +
                    '                           <option value="active">Active</option>\n' +
                    '                           <option value="inactive">Active</option>\n' +
                    '                    </select></td>\n' +
                    '\n' +

                    '                    </select></td> <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });

            // $('#submit').click(function(){
            //     $.ajax({
            //         url:"name.php",
            //         method:"POST",
            //         data:$('#add_name').serialize(),
            //         success:function(data)
            //         {
            //             alert(data);
            //             $('#add_name')[0].reset();
            //         }
            //     });
            // });

        });
    </script>


    <script>
        $(document).ready(function () {
            $('#select-all-item').click(function (event) {
                if(this.checked){
                    $(':checkbox').each(function () {
                        this.checked = true;
                    })
                }else{
                    $(':checkbox').each(function() {
                        this.checked = false;
                    });
                }
            })
        });
    </script>

    {{--<script>--}}
    {{--$(document).ready(function () {--}}
    {{--$('#select-all-category').click(function (event) {--}}
    {{--if(this.checked){--}}
    {{--$(':checkbox').each(function () {--}}
    {{--this.checked = true;--}}
    {{--})--}}
    {{--}else{--}}
    {{--$(':checkbox').each(function() {--}}
    {{--this.checked = false;--}}
    {{--});--}}
    {{--}--}}
    {{--})--}}
    {{--});--}}
    {{--</script>--}}

@endsection