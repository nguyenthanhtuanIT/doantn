@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bill
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
                        <td><strong>Tour_id</strong></td>
                        <td><strong>Amount people</strong></td>
                        <td><strong>Price</strong></td>
                        <td><strong>Total_Price</strong></td>                       
                        <td colspan="2"><strong>Operations</strong></td>
                    </tr>
                </thead>                       
                <tbody>
                    @foreach ($bill as $bil)
                    <tr align="center">
                        <td>{{$bil->id}}</td>
                        <td>{{$bil->user_id}}</td>
                        <td>{{$bil->tour_id}}</td>
                        <td>{{$bil->amount}}</td>
                        <td>{{$bil->price}}</td>
                        <td>{{$bil->totalprice}}</td>
                        <td><a href="admin/bill/update/{{$bil->id}}"><i class="fas fa-edit"></i></a></td>
                        <td><a href="admin/bill/delete/{{$bil->id}}" title=""><i class="glyphicon glyphicon-trash"></i></a></td>
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
