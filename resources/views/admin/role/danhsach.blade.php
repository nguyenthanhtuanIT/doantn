@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Role
                    <small>List</small>
                </h1>
            </div>
            @if (session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <td><strong>ID</strong></td>
                        <td><strong>Name</strong></td>
                        <td><strong>Description</strong></td>                        
                        <td colspan="2"><strong>Operations</strong></td>
                    </tr>
                </thead>                       
                <tbody>
                    @foreach ($role as $rl)
                    <tr align="center">
                        <td>{{$rl->id}}</td>
                        <td>{{$rl->name}}</td>
                        <td>{{$rl->description}}</td>
                        <td><a href="admin/role/update/{{$rl->id}}"><i class="fas fa-edit"></i></a></td>
                        <td><a href="admin/role/delete/{{$rl->id}}" title=""><i class="glyphicon glyphicon-trash"></i></a></td>
                    </tr>
                    @endforeach 
                </tbody>                     
            </table>
        </div>
        <div align="center">
            {{$role->links()}}
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection