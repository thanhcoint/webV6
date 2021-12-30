@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Profile
                        </h2>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:10px">
                        <div class="col-lg-6">
                            <form action="admin/theloai/addProfile" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="form-group col-lg-8">
                                    <label>Thêm profile mail</label>
                                    <input type="text" class="form-control" name="profile_mail" />
                                </div>
                                <div class="col-sm-1"style="padding:9px"><br>
                                    <input input type="submit" value="Thêm profile" >
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <form action="admin/theloai/deleteProfile" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="form-group col-lg-8">
                                <label>Xóa profile mail</label>
                            <select class="form-control" name="profileMail">
                                @foreach($pro_file as $pr)
                                <option value="{{$pr->id}}">
                                {{$pr->mail_profile}}
                                </option>
                                @endforeach                          
                            </select>
                            </div>
                                <div class="col-sm-1"style="padding:9px"><br>
                                    <input input type="submit" value="Xóa profile" >
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-7" style="padding-bottom:120px">

                        @if(count($trung)>0)
                        Các mail bị trùng :<br>
                        <div class="alert alert-danger">
                        @foreach($trung as $value)
                        {{$value}}<br>
                        @endforeach
                        </div>
                        @endif
                    	@if(count($errors) > 0) <!-- kiem tra co ton tai eror khong -->
                    	<div class="alert alert-danger"><!-- alet trong bootraps -->
                    		@foreach($errors->all() as $err)
                    			{{$err}}<br>
                    		@endforeach
                    	</div>
                    	@endif
                        @if(session('eror'))
                    	<div class="alert alert-danger">
                    		{{session('eror')}}
                    	</div><!-- aet -->
                    	@endif
                    	@if(session('thongbao'))
                    	<div class="alert alert-success">
                    		{{session('thongbao')}}
                    	</div><!-- aet -->
                    	@endif
                        <form action="admin/theloai/them" method="POST">
                        	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            
                            <div class="form-group">
                            
                        <label>Chọn profile mail</label>
                        <select class="form-control" name="profileMail">
                            @foreach($pro_file as $pr)
                            <option value="{{$pr->id}}">
                               {{$pr->mail_profile}}
                            </option>
                            @endforeach                          
                        </select>
                                <br>
                                <label>Mỗi mail 1 dòng định dạng : mail|pass|khôi phục</label>
                                <br><br>
                                <textarea class="form-control" name="Ten" rows="10"></textarea>
                            </div>
                           
                            <button type="submit" class="btn btn-default">Thêm mail</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endsection