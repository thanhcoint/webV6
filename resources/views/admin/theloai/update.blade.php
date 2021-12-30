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
                    @if (session('thongbao'))
                        <div class="alert alert-success">
                            {{ session('thongbao') }}
                        </div><!-- aet -->
                    @endif
                    <div class="row">
                        <h3>Iphone - Mail App</h3>
                        </br>
                    </div>
                    <div class="row">
                        <form action="admin/theloai/update" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group col-lg-2">
                                <label>chọn mail profile </label>
                                <select class="form-control" name="mail_profile" id="mail_profile">
                                    @if ($id_mail_profile)
                                        @foreach ($id_mail_profile as $pro)
                                            <option value="{{ $pro->id }}">
                                                {{ $pro->mail_profile }}
                                            </option>
                                        @endforeach
                                    @endif
                                    <option value="All">
                                        All
                                    </option>
                                    @foreach ($pro_file as $pr)
                                        <option value="{{ $pr->id }}">
                                            {{ $pr->mail_profile }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>


                            <div class="form-group col-lg-2">
                                <label>Mail APP</label>
                                <select class="form-control" name="sendIos">
                                    <option value="No">
                                        No
                                    </option>
                                    @foreach ($status as $stt)
                                        <option value="{{ $stt->status_ }}">
                                            {{ $stt->status_ }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label>Login No Backup</label>
                                <select class="form-control" name="deleteIos">
                                    <option value="No">
                                        No
                                    </option>
                                    @foreach ($status as $stt)
                                        <option value="{{ $stt->status_ }}">
                                            {{ $stt->status_ }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3" style="padding:9px"><br>
                                <input input type="submit" value="Update">
                            </div>
                        </form>
                    </div>
                    <!-------------------------------------------------------------------
                                                                                                                <div class="row">
                                                                                                                    <h3>Iphone - Gmail App</h3>
                                                                                                                    </hr>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                    <form action="admin/theloai/update" method="POST">
                                                                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                                                                                        <div class="form-group col-lg-2">
                                                                                                                            <label>chọn mail profile</label>
                                                                                                                            <select class="form-control" name="mail_profile" id="mail_profile">
                                                                                                                                @if ($id_mail_profile)
                                                                                                                                @foreach ($id_mail_profile as $pro)
                                                                                                                                <option value="{{ $pro->id }}">
                                                                                                                                    {{ $pro->mail_profile }}
                                                                                                                                </option>
                                                                                                                                @endforeach
                                                                                                                                @endif
                                                                                                                                <option value="All">
                                                                                                                                    All
                                                                                                                                </option>
                                                                                                                                @foreach ($pro_file as $pr)
                                                                                                                                <option value="{{ $pr->id }}">
                                                                                                                                    {{ $pr->mail_profile }}
                                                                                                                                </option>
                                                                                                                                @endforeach

                                                                                                                            </select>
                                                                                                                        </div>


                                                                                                                        <div class="form-group col-lg-2">
                                                                                                                            <label>send Mail</label>
                                                                                                                            <select class="form-control" name="sendGmailApp">
                                                                                                                                <option value="No">
                                                                                                                                    No
                                                                                                                                </option>
                                                                                                                                @foreach ($status as $stt)
                                                                                                                                <option value="{{ $stt->status_ }}">
                                                                                                                                    {{ $stt->status_ }}
                                                                                                                                </option>
                                                                                                                                @endforeach
                                                                                                                            </select>
                                                                                                                        </div>

                                                                                                                        <div class="col-sm-3" style="padding:9px"><br>
                                                                                                                            <input input type="submit" value="Update">
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                </div>


                                                                                                                ---------------------------------------------------------------
                                                                                                                <div class="row">
                                                                                                                    <h3>Ipad - Mail APP</h3>
                                                                                                                    </hr>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                    <form action="admin/theloai/update" method="POST">
                                                                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                                                                                        <div class="form-group col-lg-2">
                                                                                                                            <label>chọn mail profile</label>
                                                                                                                            <select class="form-control" name="mail_profile" id="mail_profile">
                                                                                                                                @if ($id_mail_profile)
                                                                                                                                @foreach ($id_mail_profile as $pro)
                                                                                                                                <option value="{{ $pro->id }}">
                                                                                                                                    {{ $pro->mail_profile }}
                                                                                                                                </option>
                                                                                                                                @endforeach
                                                                                                                                @endif
                                                                                                                                <option value="All">
                                                                                                                                    All
                                                                                                                                </option>
                                                                                                                                @foreach ($pro_file as $pr)
                                                                                                                                <option value="{{ $pr->id }}">
                                                                                                                                    {{ $pr->mail_profile }}
                                                                                                                                </option>
                                                                                                                                @endforeach

                                                                                                                            </select>
                                                                                                                        </div>


                                                                                                                        <div class="form-group col-lg-2">
                                                                                                                            <label>send Mail</label>
                                                                                                                            <select class="form-control" name="send_mail_ipad">
                                                                                                                                <option value="No">
                                                                                                                                    No
                                                                                                                                </option>
                                                                                                                                @foreach ($status as $stt)
                                                                                                                                <option value="{{ $stt->status_ }}">
                                                                                                                                    {{ $stt->status_ }}
                                                                                                                                </option>
                                                                                                                                @endforeach
                                                                                                                            </select>
                                                                                                                        </div>

                                                                                                                        <div class="col-sm-3" style="padding:9px"><br>
                                                                                                                            <input input type="submit" value="Update">
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                </div>

                                                                                                                <div class="row">
                                                                                                                    -------------------------------------------------------------->


                    <div class="row">
                        <h3>YTB App Login & Backup</h3>
                        </hr>
                    </div>
                    <div class="row">
                        <form action="admin/theloai/update" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group col-lg-2">
                                <label>chọn mail profile</label>
                                <select class="form-control" name="mail_profile" id="mail_profile">
                                    @if ($id_mail_profile)
                                        @foreach ($id_mail_profile as $pro)
                                            <option value="{{ $pro->id }}">
                                                {{ $pro->mail_profile }}
                                            </option>
                                        @endforeach
                                    @endif
                                    <option value="All">
                                        All
                                    </option>
                                    @foreach ($pro_file as $pr)
                                        <option value="{{ $pr->id }}">
                                            {{ $pr->mail_profile }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>


                            <div class="form-group col-lg-2">
                                <label>LOGIN</label>
                                <select class="form-control" name="changePass">
                                    <option value="No">
                                        No
                                    </option>
                                    @foreach ($status as $stt)
                                        <option value="{{ $stt->status_ }}">
                                            {{ $stt->status_ }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label>RESTORE</label>
                                <select class="form-control" name="RestoreYTB">
                                    <option value="No">
                                        No
                                    </option>
                                    @foreach ($status as $stt)
                                        <option value="{{ $stt->status_ }}">
                                            {{ $stt->status_ }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3" style="padding:9px"><br>
                                <input input type="submit" value="Update">
                            </div>
                        </form>
                    </div>
                    <!------------------------------------------------------------------------>
                    <div class="row">
                        <h3>Mail App Login & Backup</h3>
                        </hr>
                    </div>
                    <div class="row">
                        <form action="admin/theloai/update" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group col-lg-2">
                                <label>chọn mail profile</label>
                                <select class="form-control" name="mail_profile" id="mail_profile">
                                    @if ($id_mail_profile)
                                        @foreach ($id_mail_profile as $pro)
                                            <option value="{{ $pro->id }}">
                                                {{ $pro->mail_profile }}
                                            </option>
                                        @endforeach
                                    @endif
                                    <option value="All">
                                        All
                                    </option>
                                    @foreach ($pro_file as $pr)
                                        <option value="{{ $pr->id }}">
                                            {{ $pr->mail_profile }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>


                            <div class="form-group col-lg-2">
                                <label>BACKUP</label>
                                <select class="form-control" name="download_book">
                                    <option value="No">
                                        No
                                    </option>
                                    @foreach ($status as $stt)
                                        <option value="{{ $stt->status_ }}">
                                            {{ $stt->status_ }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label>RESTORE</label>
                                <select class="form-control" name="send_mail">
                                    <option value="No">
                                        No
                                    </option>
                                    @foreach ($status as $stt)
                                        <option value="{{ $stt->status_ }}">
                                            {{ $stt->status_ }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3" style="padding:9px"><br>
                                <input input type="submit" value="Update">
                            </div>
                        </form>
                    </div>


                    <!------------------------------------------------------------------------>


                    <div class="row">
                        <h3>Mail 2FA</h3>
                        </br>
                    </div>
                    <div class="row">
                        <form action="admin/theloai/update" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group col-lg-2">
                                <label>chọn mail profile</label>
                                <select class="form-control" name="mail_profile" id="mail_profile">
                                    @if ($id_mail_profile)
                                        @foreach ($id_mail_profile as $pro)
                                            <option value="{{ $pro->id }}">
                                                {{ $pro->mail_profile }}
                                            </option>
                                        @endforeach
                                    @endif
                                    <option value="All">
                                        All
                                    </option>
                                    @foreach ($pro_file as $pr)
                                        <option value="{{ $pr->id }}">
                                            {{ $pr->mail_profile }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label>2FA</label>
                                <select class="form-control" name="send_mail_ipad">
                                    <option value="No">
                                        No
                                    </option>
                                    @foreach ($status as $stt)
                                        <option value="{{ $stt->status_ }}">
                                            {{ $stt->status_ }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-3" style="padding:9px"><br>
                                <input input type="submit" value="Update">
                            </div>
                        </form>
                    </div>

                    <br><br><br>
                    <div>
                        <div>

                            <!-- Script -->

                            <!-- /#page-wrapper -->
                        @endsection
