@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Customer
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
                        <td><strong>User_id</strong></td>
                        <td><strong>Full Name</strong></td>
                        <td><strong>Email</strong></td>
                        <td><strong>Address</strong></td>
                        <td><strong>Phone</strong></td>                          
                        <td colspan="2"><strong>Operations</strong></td>
                    </tr>
                </thead>                       
                <tbody>
                    @foreach ($customer as $cus)
                    <tr align="center">
                        <td>{{$cus->id}}</td>
                        <td>{{$cus->user_id}}</td>
                        <td>{{$cus->name}}</td>
                        <td>{{$cus->email}}</td>
                        <td>{{$cus->address}}</td>
                        <td>{{$cus->phone}}</td>
                        <td><a href="admin/customer/update/{{$cus->id}}"><i class="fas fa-edit"></i></a></td>
                        <td><a href="admin/customer/delete/{{$cus->id}}" title=""><i class="glyphicon glyphicon-trash"></i></a></td>
                    </tr>
                    @endforeach 
                </tbody>                     
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
