@extends('admin.layout.index')
@section('content')
<style type="text/css">


.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes label {
  display: block;
}

#checkboxes label:hover {
  background-color: #1e90ff;
}
.selectBox2 select {
  width: 100%;
  font-weight: bold;
}

.overSelect2 {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes2 {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes2 label {
  display: block;
}

#checkboxes2 label:hover {
  background-color: #1e90ff;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <br>
              @if(session('thongbao'))
                        <div class="alert alert-success">
                          {{session('thongbao')}}
                        </div><!-- aet -->
                        @endif
               
                   <!------------------------------------------------------------------------>
                    <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Chọn Profile khi chạy Auto
                        </h2>
                    </div>
                    <div class="col-lg-12">
                    <form action="admin/theloai/update" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <input type="hidden" name="id_so" value="1"/>
                    <div class="form-group col-lg-2">
                        <label>chọn mail profile - send mail</label>
                        <select class="form-control" name="action" id="action">   
                            <option value="{{$action[0]->action}}">
                            {{$action[0]->action}}
                              </option>
                            <option value="All">
                               All
                            </option>
                            @foreach($pro_file as $pr)
                          <option value="{{$pr->mail_profile}}">
                               {{$pr->mail_profile}}
                            </option>
                          @endforeach
                            
                        </select>
                    </div>
                    <div class="col-sm-3"style="padding:9px"><br>
                          <input input type="submit" value="Update" >
                      </div>
                    </form>
                    <form action="admin/theloai/update" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <input type="hidden" name="id_so" value="2"/>
                    <div class="form-group col-lg-2">
                        <label>chọn mail profile - delete mail</label>
                        <select class="form-control" name="action" id="action">  
                            <option value="{{$action[1]->action}}">
                            {{$action[1]->action}}
                              </option>
                            <option value="All">
                               All
                            </option>
                            @foreach($pro_file as $pr)
                          <option value="{{$pr->mail_profile}}">
                               {{$pr->mail_profile}}
                            </option>
                          @endforeach
                            
                        </select>
                    </div>
                    <div class="col-sm-3"style="padding:9px"><br>
                          <input input type="submit" value="Update" >
                      </div>
                    </form>
                   </div> 
                   <br>
                   <br>
                   <br>
                   <div class="col-lg-12">
                    <form action="admin/theloai/update" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <input type="hidden" name="id_so" value="3"/>
                    <div class="form-group col-lg-2">
                        <label>YouTube changePass</label>
                        <select class="form-control" name="action" id="action">   
                            <option value="{{$action[0]->action}}">
                            {{$action[2]->action}}
                              </option>
                            <option value="All">
                               All
                            </option>
                            @foreach($pro_file as $pr)
                          <option value="{{$pr->mail_profile}}">
                               {{$pr->mail_profile}}
                            </option>
                          @endforeach
                            
                        </select>
                    </div>
                    <div class="col-sm-3"style="padding:9px"><br>
                          <input input type="submit" value="Update" >
                      </div>
                    </form>
                    <form action="admin/theloai/update" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <input type="hidden" name="id_so" value="4"/>
                    <div class="form-group col-lg-2">
                        <label>YouTube watchVideo</label>
                        <select class="form-control" name="action" id="action">  
                            <option value="{{$action[1]->action}}">
                            {{$action[3]->action}}
                              </option>
                            <option value="All">
                               All
                            </option>
                            @foreach($pro_file as $pr)
                          <option value="{{$pr->mail_profile}}">
                               {{$pr->mail_profile}}
                            </option>
                          @endforeach
                            
                        </select>
                    </div>
                    <div class="col-sm-3"style="padding:9px"><br>
                          <input input type="submit" value="Update" >
                      </div>
                    </form>
                   </div> 
              
             
<br><br><br>
<div>
<div>

        <!-- Script -->

        <!-- /#page-wrapper -->
        @endsection