@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add User
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                {{$err}}<br>
                                @endforeach
                            </div>
                            @endif
                            @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div><!-- aet -->
                        @endif
                        <form action="admin/user/add_user" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input class="form-control" name="email" placeholder="Enter email" />
                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <input type="password" class="form-control" name="password" placeholder="password" />
                            </div>
                             <div class="form-group">
                                <label>password Again</label>
                                <input type="password" class="form-control" name="passwordAgain" placeholder="password Again" />
                            </div>
                            <div class="form-group">
                                <label>Quyền Người dùng</label>
                                <label class="radio-inline">
                                    <input type="radio" name="author" value="1" checked="">Admin
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="author" value="0" checked="">Member
                                </label>
                            <div class="form-group">
                            <button type="submit" class="btn btn-default">User Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endsection