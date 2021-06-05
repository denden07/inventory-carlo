@if(session('success'))
    <div style="text-align: center" class="alert alert-success alert-dismissible" role="alert">

        <p><strong>Success!</strong> {{session('success')}}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
@endif


@if(session('fail'))
    <div style="text-align: center" class="alert alert-warning alert-dismissible" role="alert">

        <p><strong>Success!</strong> {{session('fail')}}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
@endif


@if(session('error'))
    <div style="text-align: center" class="alert alert-warning alert-dismissible" role="alert">

        <p><strong>Error!</strong> {{session('error')}}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
@endif