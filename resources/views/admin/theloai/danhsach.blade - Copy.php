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
        <div class="row">
            <div class="col-lg-12">
            <div class="row">
                <form action="admin/theloai/search" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group col-lg-3">
                        <label>Phương pháp Lọc</label>
                        <select class="form-control" name="order_by">
                          
                            <option value="khong_loai_tru">
                               không loại trừ
                            </option>
                            <option value="loai_tru">
                               loại trừ
                            </option>
                            
                        </select>
                    </div>
                      <div class="form-group col-lg-3">
                        <label>Download App</label>
                        <select class="form-control" name="status">
                          @foreach($downloadapp as $dlapp)
                          <option value="{{$dlapp->status}}">
                               {{$dlapp->status}}
                            </option>
                          @endforeach
                        </select>
                    </div>
              <div class="form-group col-lg-3">
                <label>Dịch Vụ Đã Dùng</label>
                    <div class="form-group col-lg-12" onclick="showCheckboxes()">
                      <select class="form-control">
                        <option>Select an option</option>
                      </select>
                      <div class="overSelect" class="form-control col-lg-12"></div>                    
                    </div>
                    <div id="checkboxes" class="form-group col-lg-12">
                      <label ><input type="checkbox" name="download_app" value="Done" />Download App</label>
                      <label><input type="checkbox" name="download_book" value="Done" />Download Book</label>
                      <label><input type="checkbox" name="send_mail" value="Done" />Send Mail </label>
                    </div>

                </div>
                  <!--<div class="form-group col-lg-3">
                    <label>catelogy Parent</label>
                        <div class="form-group col-lg-12" onclick="showCheckboxes2()">
                          <select class="form-control">
                            <option>Select an option</option>
                          </select>
                          <div class="overSelect2" class="form-control col-lg-12"></div>   
                        </div>
                <div id="checkboxes2" class="form-group col-lg-12">
                  <label><input type="checkbox" id="one" name="status" value="yes" />status</label>
                  <label><input type="checkbox" id="one" name="stt2" value="yes" />status2</label>
                </div>
                </div> -->
                 <div class="col-sm-3"style="padding:9px"><br>
                    <input input type="submit" value="Search" >
                 </div>
                    </form>
                <div class="col-sm-10">    
                    <div class="col-sm-2">
                        <input type="checkbox" id="checkall" value='1'/>Select All
                    </div>
                    <div class="col-sm-2">
                        <input type="button" id="download" value='download Select'>
                    </div>
                    <div class="col-sm-1">
                    <input type="button" id="delete" value='Delete Select'>
                    </div>
                </div>
                <div class="col-sm-1">
               <!-- <a class="btn sbold green" href="admin/theloai/download_all"> Download All<i class="fa fa-plus"></i></a> -->
                  <form action="admin/theloai/download_all" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <input type="hidden" name="theloai_post" value="{{$theloai}}"/>
                        <input input type="submit" value="download all" >
                    </form>
                </div>
                <div class="col-sm-1">
                    <a class="btn sbold green" href="admin/theloai/delete_all" onclick="return confirm('Do you want to delete all?');"> Delete All <i class="glyphicon glyphicon-trash"></i></a>
              </div>
            </div>
        </div><br><br>  
        <!-- /.col-lg-12 -->
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
                @endforeach
            </div>
            @endif
        <div class="col-sm-9">
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div><!-- aet -->
            @endif
        </div>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                 <th></th>
                    <th>Email</th>                
                    
                    <th>Download App</th>
                    <th>Download Book</th>
                    <th>Send Mail</th>
                    <th>Update At</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($theloai as $value =>$tl)
                 <td><input type="checkbox" class='checkbox' name='delete' value='{{$tl->id}}' /></td>
                    <td>{{$tl->Ten}}</td>
                    
                    <td>{{$tl->download_app}}</td>
                    <td>{{$tl->download_book}}</td>
                    <td>{{$tl->send_mail}}</td>
                    <td>{{$tl->updated_at}}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/theloai/delete/{{$tl->id}}"> Delete</a></td>
                   <!-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/theloai/sua/">Edit</a></td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<br><br><br>
        <!-- Script -->
     <script type="text/javascript">
      var expanded = false;
          function showCheckboxes() {
            var checkboxes = document.getElementById("checkboxes");
            if (!expanded) {
              checkboxes.style.display = "block";
              expanded = true;
            } else {
              checkboxes.style.display = "none";
              expanded = false;
            }
          }
        var expanded2 = false;
          function showCheckboxes2() {
            var checkboxes2 = document.getElementById("checkboxes2");
            if (!expanded2) {
              checkboxes2.style.display = "block";
              expanded2 = true;
            } else {
              checkboxes2.style.display = "none";
              expanded2 = false;
            }
          }
     $(document).ready(function(){

        // Check all
        $("#checkall").change(function(){

           var checked = $(this).is(':checked');
           if(checked){
              $(".checkbox").each(function(){
                  $(this).prop("checked",true);
              });
           }else{
              $(".checkbox").each(function(){
                  $(this).prop("checked",false);
              });
           }
        });

        // Changing state of CheckAll checkbox 
        $(".checkbox").click(function(){

           if($(".checkbox").length == $(".checkbox:checked").length) {
               $("#checkall").prop("checked", true);
           } else {
               $("#checkall").prop("checked",false);
           }

        });

        // Delete button clicked
        $('#delete').click(function(){

           // Confirm alert
           var deleteConfirm = confirm("Are you sure?");
           if (deleteConfirm == true) {

              // Get userid from checked checkboxes
              var users_arr = [];
              $(".checkbox:checked").each(function(){
                  var userid = $(this).val();

                  users_arr.push(userid);
              });

              // Array length
              var length = users_arr.length;

              if(length > 0){

                 // AJAX request
                 $.ajax({
                    url: 'admin/theloai/delete_select',
                    type: 'post',
                    data: {"_token": "{{ csrf_token() }}",user_ids: users_arr},
                    success: function(response){
                        window.location.reload();
                       // Remove <tr>
                       $(".checkbox:checked").each(function(){
                           var userid = $(this).val();

                           $('#tr_'+userid).remove();
                       });
                    }
                 });
              }
           } 

        });
        $('#download').click(function(){

           // Confirm alert
           var deleteConfirm = confirm("Are you sure?");
           if (deleteConfirm == true) {

              // Get userid from checked checkboxes
              var users_arr = [];
              $(".checkbox:checked").each(function(){
                  var userid = $(this).val();

                  users_arr.push(userid);
              });

              // Array length
              var length = users_arr.length;

              if(length > 0){

                 // AJAX request
                 $.ajax({
                    url: 'admin/theloai/download_select',
                    type: 'post',
                    data: {"_token": "{{ csrf_token() }}",user_ids: users_arr},
                    success: function(response){
                        window.location = 'admin/theloai/download_select';
                       // Remove <tr>
                       $(".checkbox:checked").each(function(){
                           var userid = $(this).val();

                           $('#tr_'+userid).remove();
                       });
                    }
                 });
              }
           } 

        });

      });
      </script>
        <!-- /#page-wrapper -->
        @endsection