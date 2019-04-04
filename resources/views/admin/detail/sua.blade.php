 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Detail-Tour
                    <small>{{$detail->id}}</small>
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
                <form action="admin/detail/update/{{$detail->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label> Tour_id </label>
                        <input class="form-control" name="tour_id" placeholder="" readonly value="{{$detail->tour_id}}" />
                    </div>
                    <div class="form-group">
                        <label> Detail</label>
                        <textarea id="demo" class="form-control ckeditor" name="detail" placeholder="" required value="">{{$detail->detail}}</textarea>
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
