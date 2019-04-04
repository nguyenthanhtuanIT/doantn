@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Detail-Tour
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
                        <td><strong>Detail-Tour</strong></td>                        
                        <td colspan="2"><strong>Operations</strong></td>
                    </tr>
                </thead>                       
                <tbody>
                    @foreach ($detail as $dt)
                    <tr align="center">
                        <td>{{$dt->id}}</td>
                        <td>{{$dt->tour_id}}</td>
                        <td>{{$dt->detail}}</td>
                        <td><a href="admin/detail/update/{{$dt->id}}"><i class="fas fa-edit"></i></a></td>
                        <td><a href="admin/detail/delete/{{$dt->id}}" title=""><i class="glyphicon glyphicon-trash"></i></a></td>
                    </tr>
                    @endforeach 
                </tbody>                     
            </table>
        </div>
        <div>{{$detail->links()}}</div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
