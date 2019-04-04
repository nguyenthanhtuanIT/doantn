 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tour
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
                <form action="admin/tour/add" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Company_id</label>
                        <input class="form-control" name="company_id" placeholder="" required />
                    </div>
                    <div class="form-group">
                        <label>Tag_id</label>
                        <input class="form-control" name="tag_id" placeholder="" required />
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title" placeholder="" required />
                    </div>
                    <div class="form-group">
                        <label>Route</label>
                        <input class="form-control" name="route" placeholder="" required />
                    </div>
                    <div class="form-group">
                        <label>Mean</label>
                        <input class="form-control" name="mean" placeholder="" required />
                    </div>
                    <div class="form-group">
                        <label>Time-start</label>
                        <input class="form-control" type="date" name="time_start" value="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Time-end</label>
                        <input class="form-control" type="date" name="time_end" value="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input class="form-control" name="amount" placeholder="" required />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input class="form-control" name="status" placeholder="" required />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" placeholder="" required ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="price" placeholder="" required />
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
