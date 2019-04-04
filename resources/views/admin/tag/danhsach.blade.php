@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tag
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
                        <td><strong>Title</strong></td>                      
                        <td colspan="2"><strong>Operations</strong></td>
                    </tr>
                </thead>                       
                <tbody>
                    @foreach ($tag as $t)
                    <tr align="center">
                        <td>{{$t->id}}</td>
                        <td>{{$t->title}}</td>
                        <td><a href="admin/tag/update/{{$t->id}}">
                            <i class="fas fa-edit"></i></a></td>
                        <td><a href="admin/tag/delete/{{$t->id}}" title="">
                            <i class="glyphicon glyphicon-trash"></i></a></td>
                    </tr>
                    @endforeach 
                </tbody>                     
            </table>
        </div>
        <div align="center">
            <!-- {{$tag->links()}} -->
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection