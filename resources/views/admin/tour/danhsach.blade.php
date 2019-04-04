@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tour
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if (session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <td><strong>ID</strong></td>
                        <td><strong>Company_id</strong></td>
                        <td><strong>Tag_id</strong></td>  
                        <td><strong>Title</strong></td>
                        <td><strong>Route</strong></td>  
                        <td><strong>Mean</strong></td>
                        <td><strong>Time_start</strong></td>
                        <td><strong>Time_end</strong></td>
                        <td><strong>Amount</strong></td>
                        <td><strong>Status</strong></td>  
                        <td><strong>Description</strong></td>
                        <td><strong>Price</strong></td>                  
                        <td colspan="2"><strong>Operations</strong></td>
                    </tr>
                </thead>                       
                <tbody>
                    @foreach ($tour as $t)
                    <tr align="center">
                        <td>{{$t->id}}</td>
                        <td>{{$t->company_id}}</td>
                        <td>{{$t->tag_id}}</td>
                        <td>{{$t->title}}</td>
                        <td>{{$t->route}}</td>
                        <td>{{$t->mean}}</td>
                        <td>{{$t->time_start}}</td>
                        <td>{{$t->time_end}}</td>
                        <td>{{$t->amount}}</td>
                        <td>{{$t->status}}</td>
                        <td>{{$t->description}}</td>
                        <td>{{$t->price}}</td>
                        <td><a href="admin/tour/update/{{$t->id}}"><i class="fas fa-edit"></i></a></td>
                        <td><a href="admin/tour/delete/{{$t->id}}" title=""><i class="glyphicon glyphicon-trash"></i></a></td>
                    </tr>
                    @endforeach 
                </tbody>                     
            </table>
        </div>
        <div>{{$tour->links()}}</div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
