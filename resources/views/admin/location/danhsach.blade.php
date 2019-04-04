@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Location
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
                        <td><strong>Image_id</strong></td>
                        <td><strong>Code</strong></td>
                        <td><strong>Name</strong></td>
                        <td><strong>Address</strong></td>
                        <td><strong>Description</strong></td>                          
                        <td colspan="2"><strong>Operations</strong></td>
                    </tr>
                </thead>                       
                <tbody>
                    @foreach ($location as $lo)
                    <tr align="center">
                        <td>{{$lo->id}}</td>
                        <td>{{$lo->image_id}}</td>
                        <td>{{$lo->code}}</td>
                        <td>{{$lo->name}}</td>
                        <td>{{$lo->address}}</td>
                        <td>{{$lo->description}}</td>
                        <td><a href="admin/location/update/{{$lo->id}}"><i class="fas fa-edit"></i></a></td>
                        <td><a href="admin/location/delete/{{$lo->id}}" title=""><i class="glyphicon glyphicon-trash"></i></a></td>
                    </tr>
                    @endforeach 
                </tbody>                     
            </table>
        </div>
         <div align="center">
            {{$location->links()}}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
