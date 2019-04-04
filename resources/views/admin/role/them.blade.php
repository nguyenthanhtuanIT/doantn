 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Role
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
                        <form action="admin/role/add" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label> Name</label>
                                <input class="form-control" name="name" placeholder="Enter role name" />
                            </div>
                            <div class="form-group">
                                <label> Description</label>
                                <input class="form-control" name="description" placeholder="Enter description" />
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
