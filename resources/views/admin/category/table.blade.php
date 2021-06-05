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

    <h3 class="brand-banner">Category Table</h3>
    @include('layouts._messages')
    <form id="deleteCategory" action="{{route('category.bulk.delete')}}" method="post">
        @csrf
        @include('parts._modalCategoryDelete')
        <button  type="button" class=" btn btn-primary brand-add-button " data-toggle="modal" data-target="#addCategory">
            Add Category
        </button>

        <button  type="button" class=" btn btn-warning brand-delete-button" data-toggle="modal" data-target="#deleteModalCategory" >
            Delete Category
        </button>



        <div  class="table-design">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th><input id="select-all-category" type="checkbox" onclick="checkAll(this)"></th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Date Added</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($categories)
                    @foreach($categories as $category)

                        <tr>
                            <td><input id="id{{$category->id}}" type="checkbox" name="categoryID[]" value="{{$category->id}}"></td>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>{{$category->status}}</td>
                            <td>


                                <a href="{{route('category.edit',['id'=>$category->id])}}">
                                    <button   type="button" class=" btn btn-primary  ">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </a>






                                <button onclick="document.getElementById('id{{$category->id}}').checked = true"   type="button" class=" btn btn-danger" data-toggle="modal" data-target="#deleteModalCategory" >
                                    <i class="fas fa-trash"></i>
                                </button>


                            </td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>

                    <th><input id="select-all-enlistment" type="checkbox" onclick="checkAll(this)"></th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Date Added</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>

        <!-- Modal -->
    </form>

    @include('parts._modalAddCategory')

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
            $('#select-all-category').click(function (event) {
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