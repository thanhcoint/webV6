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
                <form action="admin/gmail/search" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group col-lg-2">
                        <label>chọn mail profile</label>
                        <select class="form-control" name="mail_profile" id="mail_profile">
                          @if($id_mail_profile)
                            @foreach($id_mail_profile as $pro)
                            <option value="{{$pro->id}}">
                                {{$pro->mail_profile}}
                              </option>
                            @endforeach
                          @endif
                            <option value="All">
                               All
                            </option>
                            @foreach($pro_file as $pr)
                          <option value="{{$pr->id}}">
                               {{$pr->mail_profile}}
                            </option>
                          @endforeach
                          <option value="All">
                               All
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-lg-2">
                        <label>Send Mail</label>
                        <select class="form-control" name="sendGmailApp">

                          @foreach($status as $stt)
                          <option value="{{$stt->status_}}">
                               {{$stt->status_}}
                            </option>
                          @endforeach
                        </select>
                    </div>
                 <div class="col-sm-1"style="padding:9px"><br>
                    <input input type="submit" value="Search" >
                 </div>
                    </form>
                    </div></div>
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
                  <form action="admin/gmail/download_all" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <input type="hidden" name="theloai_post" value="{{$theloai}}"/>
                        <input input type="submit" value="download all" >
                    </form>
                </div>
                <div class="col-sm-1">
                    <a class="btn sbold green" href="admin/gmail/delete_all/{{$link}}" onclick="return confirm('Do you want to delete all?');"> Delete All <i class="glyphicon glyphicon-trash"></i></a>
              </div>
            </div>
        </div>
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
                    <th>New Pass</th> 
                    <th>Recovery Mail</th> 
                    <th>Old Pass</th>  
                    <th>PassGen</th>                     
                    <th>Send Mail</th>
                    <th>Update At</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody id="data_ajax" name="data_ajax">
                @foreach($theloai as $value =>$tl)
                 <td><input type="checkbox" class='checkbox' name='delete' value='{{$tl->id}}' /></td>
                    <td>{{$tl->Ten}}</td>
                    <td>{{$tl->newPass}}</td>   
                    <td>{{$tl->recoveryMail}}</td>   
                    <td>{{$tl->oldPass}}</td> 
                    <td>{{$tl->passGen}}</td>    
                    
                    <td>{{$tl->sendGmailApp}}</td>
                    <td>{{$tl->updated_at}}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/gmail/delete/{{$tl->id}}"> Delete</a></td></tr>
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
                    url: 'admin/gmail/delete_select',
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
                    url: 'admin/gmail/download_select',
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
      @section('script')
      <script>
      $(document).ready(function(){
        //alert('da chay dc ');
        $("#mail_profile").change(function(){
          var id_mail_profile = $(this).val();
          //alert(id_mail_profile);
            window.location = 'admin/gmail/'+id_mail_profile;
        });
      });
      </script>
      @endsection
        <!-- /#page-wrapper -->
        @endsection