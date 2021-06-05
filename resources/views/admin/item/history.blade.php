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
    <div  class="item-table-design">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th style="color: black" colspan="1"><input id="select-all-item" type="checkbox" onclick="checkAll(this)"></th>
                <th style="color: black" colspan="1">Date</th>
                <th style="color: black">Actions</th>

            </tr>
            </thead>
            <tbody>
            @if($histories)

        @foreach($histories as $history)
                    <tr >
                        <td colspan="1" ><input id="id{{$history->id}}" type="checkbox" name="itemID[]" value="{{$history->id}}"></td>
                        <td colspan="1">{{$history->created_at->toDayDateTimeString()}}</td>
                        <td>{{$history->body}}</td>


                    </tr>

                @endforeach

            @endif
            </tbody>
            <tfoot>
            <tr>

                <th style="color: black" colspan="1"><input id="select-all-item" type="checkbox" onclick="checkAll(this)"></th>
                <th style="color: black" colspan="1">Date</th>
                <th style="color: black">Actions</th>
            </tr>
            </tfoot>
        </table>
    </div>
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
    @endsection