 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Image
                    <small>{{$image->img}}</small>
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
                    @if (session('err'))
                <div class="alert alert-success">
                    {{session('err')}}
                </div>
                @endif
                <form action="admin/image/update/{{$image->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                       <div class="form-group">
                        <label>Tour_ID</label>
                        <input class="form-control" type="text" name="tour_id" value="{{$image->tour_id}}" placeholder=""  required />
                    </div>
                <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="image" placeholder="" required value="{{$image->img}}" />
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <div>
                            <img width="180px" height="150px"
                            src="upload/{{$image->name}}" alt="">
                        </div>
                        <br>
                        <input class="form-control" type="file"
                        name="nameimg" value="{{$image->name}}" />
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
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
