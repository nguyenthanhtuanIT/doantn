@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
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
                        <td><strong>Role_id</strong></td>
                        <td><strong>Username</strong></td>
                        <td><strong>Password</strong></td>                          
                        <td colspan="2"><strong>Operations</strong></td>
                    </tr>
                </thead>                       
                <tbody>
                    @foreach ($user as $us)
                    <tr align="center">
                        <td>{{$us->id}}</td>
                        <td>{{$us->role_id}}</td>
                        <td>{{$us->username}}</td>
                        <td>{{$us->password}}</td>
                        <td><a href="admin/user/update/{{$us->id}}"><i class="fas fa-edit"></i></a></td>
                        <td><a href="admin/user/delete/{{$us->id}}" title=""><i class="glyphicon glyphicon-trash"></i></a></td>
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
