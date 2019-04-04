@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Comment
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
                        <td><strong>Tour_id</strong></td>
                        <td><strong>User_id</strong></td>
                        <td><strong>Content</strong></td>
                        <td><strong>Check</strong></td>
                        <td><strong>Create_at</strong></td>
                        <td><strong>Updated_at</strong></td>
                        <td colspan="2"><strong>Operations</strong></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comment as $com)
                    <tr align="center">
                        <td>{{$com->id}}</td>
                        <td>{{$com->tour_id}}</td>
                        <td>{{$com->user_id}}</td>
                        <td>{{$com->content}}</td>
                        <td>{{$com->KT}}</td>
                        <td>{{$com->create_at}}</td>
                        <td>{{$com->updated_at}}</td>
                        <td><a href="admin/comment/update/{{$com->id}}"><i class="fas fa-edit"></i></a></td>
                        <td><a href="admin/comment/delete/{{$com->id}}" title=""><i class="glyphicon glyphicon-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div align="center">
            {{$comment->links()}}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
