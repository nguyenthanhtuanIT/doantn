@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Image
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
                        <td><strong>Tour_ID</strong></td>
                        <td><strong>Title</strong></td>
                        <td><strong>Name</strong></td>                        
                        <td colspan="2"><strong>Operations</strong></td>
                    </tr>
                </thead>                       
                <tbody>
                    @foreach ($image as $img)
                    <tr align="center">
                        <td>{{$img->id}}</td>
                        <td>{{$img->tour_id}}</td>
                        <td>{{$img->img}}</td>
                        <td><img width="70px" height="45px" src="upload/{{$img->name}}"></td>
                        <td><a href="admin/image/update/{{$img->id}}"><i class="fas fa-edit"></i></a></td>
                        <td><a href="admin/image/delete/{{$img->id}}" title=""><i class="glyphicon glyphicon-trash"></i></a></td>
                    </tr>
                    @endforeach 
                </tbody>                     
            </table>
        </div>
        <div align="center">
            {{$image->links()}}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
