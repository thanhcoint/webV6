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
            <legend> Setting</legend>
            <div class="col-lg-12">
                <form class="form-horizontal" action="#" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <fieldset>
                        <!-- Select Basic -->
                        <div class="col-lg-4">
                            <label class="col-md-4 control-label" for="action">Action</label>
                            <div class="col-md-8">
                                <select id="action" name="action" class="form-control">
                                    <option value="{{ $pro_file[0]->action }}">{{ $pro_file[0]->action }}</option>
                                    <option value="Stop">Stop</option>
                                    <option value="Mail App V3">Mail App V3</option>
                                    <option value="Google V3">Google V3</option>
                                    <option value="Backup Google">Backup Google</option>
                                    <option value="Restore Google">Restore Google</option>
                                    <option value="Delete Backup Google">Delete Backup Google</option>
                                    <option value="Backup Mail App">Backup Mail App</option>
                                    <option value="Restore Mail App">Restore Mail App</option>
                                    <option value="Delete Backup Mail App">Delete Backup Mail App</option>
                                    <option value="Only Docs">Only Docs</option>
                                    <option value="Test Mode">Test Mode</option>
                                    <option value="Test Mode Backup">Test Mode Backup</option>
                                    <option value="test">test</option>
                                    <option value="testtest">testtest</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="col-md-4 control-label" for="somailbackup">Số Mail Backup</label>
                            <div class="col-md-8">
                                <select id="somailbackup" name="somailbackup" class="form-control">
                                    <option value="{{ $pro_file[0]->somailbackup }}">{{ $pro_file[0]->somailbackup }}
                                    </option>
                                    <option value="10">10</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="150">150</option>
                                    <option value="200">200</option>
                                    <option value="250">250</option>
                                    <option value="300">300</option>
                                    <option value="350">350</option>
                                    <option value="400">400</option>
                                    <option value="450">450</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="col-md-4 control-label" for="fakeip">FakeIP</label>
                            <div class="col-md-8">
                                <select id="fakeip" name="fakeip" class="form-control">
                                    <option value="{{ $pro_file[0]->fakeip }}">{{ $pro_file[0]->fakeip }}</option>
                                    <option value="VPN">VPN</option>
                                    <option value="3G">3G</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="col-md-4 control-label" for="Youtube">Youtube</label>
                            <div class="col-md-8">
                                <select id="Youtube" name="Youtube" class="form-control">
                                    <option value="{{ $pro_file[0]->Youtube }}">{{ $pro_file[0]->Youtube }}</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="col-md-4 control-label" for="timeWatchYTB">time Watch YTB</label>
                            <div class="col-md-8">
                                <select id="timeWatchYTB" name="timeWatchYTB" class="form-control">
                                    <option value="{{ $pro_file[0]->timeWatchYTB }}">{{ $pro_file[0]->timeWatchYTB }}
                                    </option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="60">60</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="col-md-4 control-label" for="CreatChannel">Creat Channel</label>
                            <div class="col-md-8">
                                <select id="CreatChannel" name="CreatChannel" class="form-control">
                                    <option value="{{ $pro_file[0]->CreatChannel }}">{{ $pro_file[0]->CreatChannel }}
                                    </option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="col-md-4 control-label" for="GmailApp">Gmail App</label>
                            <div class="col-md-8">
                                <select id="GmailApp" name="GmailApp" class="form-control">
                                    <option value="{{ $pro_file[0]->GmailApp }}">{{ $pro_file[0]->GmailApp }}</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="col-md-4 control-label" for="Docs">Docs</label>
                            <div class="col-md-8">
                                <select id="Docs" name="Docs" class="form-control">
                                    <option value="{{ $pro_file[0]->Docs }}">{{ $pro_file[0]->Docs }}</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="col-md-4 control-label" for="GoogleTrust">Google Trust</label>
                            <div class="col-md-8">
                                <select id="GoogleTrust" name="GoogleTrust" class="form-control">
                                    <option value="{{ $pro_file[0]->GoogleTrust }}">{{ $pro_file[0]->GoogleTrust }}
                                    </option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="col-md-4 control-label" for="ChromeTrust">Chrome Trust</label>
                            <div class="col-md-8">
                                <select id="ChromeTrust" name="ChromeTrust" class="form-control">
                                    <option value="{{ $pro_file[0]->ChromeTrust }}">{{ $pro_file[0]->ChromeTrust }}
                                    </option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>

                        <!-- Button -->
                        <br />

                    </fieldset>
                </form>
                <div class="col-lg-12">
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <label class="col-md-4 control-label"></label>
                    </div>
                    <div class="col-md-8">
                    </div>
                    <br />
                    <div class="col-md-4">
                        <div class="col-md-4">
                            <input type="checkbox" id="checkall" value='1' />Select All
                        </div>
                        <div class="col-md-8">
                            <button id="postUpdate">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <hr />
        </div>
        <div class="col-lg-12">
            <!------------------------------------------------>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th></th>
                        <th>profile</th>
                        <th>action</th>
                        <th>somailbackup</th>
                        <th>fakeip</th>
                        <th>Youtube</th>
                        <th>timeYTB</th>
                        <th>CreatChannel</th>
                        <th>Gmail</th>
                        <th>Docs</th>
                        <th>GG</th>
                        <th>Chrome</th>
                    </tr>
                </thead>
                <tbody id="data_ajax" name="data_ajax">
                    @foreach ($pro_file as $tl)
                        <td><input type="checkbox" class='checkbox' name='delete' value='{{ $tl->id }}' />
                        </td>
                        <td>{{ $tl->mail_profile }}</td>
                        <td>{{ $tl->action }}</td>
                        <td>{{ $tl->somailbackup }}</td>
                        <td>{{ $tl->fakeip }}</td>
                        <td>{{ $tl->Youtube }}</td>
                        <td>{{ $tl->timeWatchYTB }}</td>
                        <td>{{ $tl->CreatChannel }}</td>
                        <td>{{ $tl->GmailApp }}</td>
                        <td>{{ $tl->Docs }}</td>
                        <td>{{ $tl->GoogleTrust }}</td>
                        <td>{{ $tl->ChromeTrust }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!------------------------------------------------>
        </div>

        <!------------------------------------------------>

        <!------------------------------------------------>

    </div>
    </div>
    <!-- Script -->
    <script type="text/javascript">
        $(document).ready(function() {

            // Check all
            $("#checkall").change(function() {

                var checked = $(this).is(':checked');
                if (checked) {
                    $(".checkbox").each(function() {
                        $(this).prop("checked", true);
                    });
                } else {
                    $(".checkbox").each(function() {
                        $(this).prop("checked", false);
                    });
                }
            });

            // Changing state of CheckAll checkbox 
            $(".checkbox").click(function() {

                if ($(".checkbox").length == $(".checkbox:checked").length) {
                    $("#checkall").prop("checked", true);
                } else {
                    $("#checkall").prop("checked", false);
                }

            });

            $('#postUpdate').click(function() {

                // Confirm alert
                var deleteConfirm = confirm("Are you sure?");
                if (deleteConfirm == true) {

                    // Get userid from checked checkboxes
                    var users_arr = [];
                    $(".checkbox:checked").each(function() {
                        var userid = $(this).val();

                        users_arr.push(userid);
                    });

                    // Array length
                    var length = users_arr.length;
                    var action = $('#action').val();
                    var somailbackup = $('#somailbackup').val();
                    var fakeip = $('#fakeip').val();
                    var Youtube = $('#Youtube').val();
                    var timeWatchYTB = $('#timeWatchYTB').val();
                    var CreatChannel = $('#CreatChannel').val();
                    var GmailApp = $('#GmailApp').val();
                    var Docs = $('#Docs').val();
                    var GoogleTrust = $('#GoogleTrust').val();
                    var ChromeTrust = $('#ChromeTrust').val();
                    if (length > 0) {

                        // AJAX request
                        $.ajax({
                            url: 'admin/theloai/updateProfile',
                            type: 'POST',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                user_ids: users_arr,
                                action: action,
                                somailbackup: somailbackup,
                                fakeip: fakeip,
                                Youtube: Youtube,
                                timeWatchYTB: timeWatchYTB,
                                CreatChannel: CreatChannel,
                                GmailApp: GmailApp,
                                Docs: Docs,
                                GoogleTrust: GoogleTrust,
                                ChromeTrust: ChromeTrust
                            },
                            success: function(response) {
                                window.location.reload();
                                // Remove <tr>
                                $(".checkbox:checked").each(function() {
                                    var userid = $(this).val();

                                    $('#tr_' + userid).remove();
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
