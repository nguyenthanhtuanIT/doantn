 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Customer
                    <small>{{$customer->name}}</small>
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
                <form action="admin/customer/update/{{$customer->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label> User_id </label>
                        <input class="form-control" name="user_id" placeholder="" readonly value="{{$customer->user_id}}" />
                    </div>
                    <div class="form-group">
                        <label> Full name</label>
                        <input class="form-control" name="name" placeholder="" required value="{{$customer->name}}" />
                    </div>
                    <div class="form-group">
                        <label> Email</label>
                        <input class="form-control" name="email" placeholder="" data-validate="Valid email is required: ex@abc.xyz" value="{{$customer->email}}" />
                    </div>
                    <div class="form-group">
                        <label> Address</label>
                        <input class="form-control" name="address" placeholder="" required value="{{$customer->address}}" />
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input class="form-control" name="phone" placeholder="" value="{{$customer->phone}}" />
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
