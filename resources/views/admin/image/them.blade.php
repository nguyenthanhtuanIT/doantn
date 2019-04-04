 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Image
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if (count($errors ) > 0 )
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>
                @endif

                @if (session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                     @if (session('loi'))
                <div class="alert alert-success">
                    {{session('loi')}}
                </div>
                @endif
                <form action="admin/image/add" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                       <div class="form-group">
                        <label>Tour_ID</label>
                        <input class="form-control" type="text" name="tour_id" placeholder=""  required />
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="image" placeholder="" required />
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="file" name="nameimg" placeholder=""  required />
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="reset" class="btn btn-primary">Refresh</button> 
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection
