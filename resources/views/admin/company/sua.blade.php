 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Company
                    <small>{{$company->name}}</small>
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
                <form action="admin/company/update/{{$company->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label> User_id </label>
                        <input class="form-control" name="user_id" placeholder="" readonly value="{{$company->user_id}}" />
                    </div>
                    <div class="form-group">
                        <label> Full name</label>
                        <input class="form-control" name="name" placeholder="" required value="{{$company->name}}" />
                    </div>
                    <div class="form-group">
                        <label> Email</label>
                        <input class="form-control" name="email" placeholder="" data-validate="Valid email is required: ex@abc.xyz" value="{{$company->email}}" />
                    </div>
                    <div class="form-group">
                        <label> Address</label>
                        <input class="form-control" name="address" placeholder="" required value="{{$company->address}}" />
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input class="form-control" name="phone" placeholder="" value="{{$company->phone}}" />
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
