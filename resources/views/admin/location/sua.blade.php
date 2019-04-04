 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Location
                    <small>{{$location->name}}</small>
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
                 <form action="admin/location/update/{{$location->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label> Image_id </label>
                        <input class="form-control" name="image_id" placeholder="" required value="{{$location->image_id}}" />
                    </div>
                       <div class="form-group">
                        <label> Code </label>
                        <input class="form-control" name="code" placeholder="" required value="{{$location->code}}" />
                    </div>
                    <div class="form-group">
                        <label> Name</label>
                        <input class="form-control" name="name" placeholder="" required value="{{$location->name}}" />
                    </div>
                    <div class="form-group">
                        <label> Address</label>
                        <input class="form-control" name="address" placeholder="" required value="{{$location->address}}"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea id='demo' class="form-control ckeditor" name="description" placeholder="">{{$location->description}}</textarea>
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
