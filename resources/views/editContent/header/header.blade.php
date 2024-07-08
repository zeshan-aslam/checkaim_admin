@extends('master.main')
@section('content')
    <!-- BEGIN PAGE -->
    <div id="main-content">
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        Header Content
                        
                    </h3>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <div class='row-fluid'>
                <div class="span12">
                    @if (Session::has('msg'))
                        <div class="alert alert-success text-center">
                            <button data-dismiss="alert" class="close" type="button">×</button>
                            <span>{{ Session::get('msg') }}</span>
                        </div>
                    @endif
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4> Edit Header Content</h4>
                            <span class="tools">
                            </span>
                        </div>
                        <div class="widget-body">
                            <div>
                                <div class="clearfix">
                                    <div class="btn-group">
                                        <a href="{{ Route('header.headercontent') }}" class="btn btn-primary">Add
                                            Content</a>
                                    </div>
                                    <div class="btn-group pull-right">
                                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i
                                                class="icon-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#">Print</a></li>
                                            <li><a href="#">Save as PDF</a></li>
                                            <li><a href="#">Export to Excel</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="space15"></div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <table id='headerView' class=" table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>

                                            <th>Logo</th>
                                            <th>Login</th>
                                            <th>Sign Up</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>

                                            <th>Logo</th>
                                            <th>Login</th>
                                            <th>Sign Up</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE widget-->
                <!-- END -->
            </div>
            <!-- END -->
            <div class='row-fluid'>
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4> Menu Content</h4>
                            <span class="tools">
                            </span>
                        </div>
                        <div class="widget-body">
                            <div>
                                <div class="clearfix">
                                    <div class="btn-group">
                                        <a href="{{ Route('header.headermenu') }}" class="btn btn-primary">Add Content</a>
                                    </div>
                                    <div class="btn-group pull-right">
                                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i
                                                class="icon-angle-down"></i>
                                        </button>
                                      
                                    </div>
                                </div>
                                <div class="space15"></div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <table id='menuView' class=" table table-striped table-hover table-bordered">
                                    <thead class="text-center">
                                        <tr>

                                            <th>Menu Name</th>
                                            <th>Menu link</th>
                                            <th>Modal link</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>

                                            <th>Menu Name</th>
                                            <th>Menu link</th>
                                            <th>Modal link</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- END EXAMPLE TABLE widget-->
                <!-- END -->
            </div>

        @endsection
        @section('js')
            <script>
                // var successSound = new Audio("{{ asset('audio/success.mp3') }}");
                // var errorSound = new Audio("{{ asset('audio/error.mp3') }}");
                // var warningSound = new Audio("{{ asset('audio/warning.wav') }}");
                $(document).ready(function() {
                    var table = '';
                    console.log('Data ready');
                    drawData();
                    MenuData();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }

                    });
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": true,
                        "progressBar": false,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": true,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "2000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }

                });

                function drawData() {

                    console.log('function called');

                    table = $('#headerView')
                        .on('init.dt', function() {
                            console.log('Table initialisation complete: ' + new Date().getTime());
                        })
                        .DataTable({
                            "lengthMenu": [
                                [5, 10, 25, 50, -1],
                                [5, 10, 25, 50, "All"]
                            ],
                            ajax: "{{ Route('header.getheaderData') }}",

                            "stateSave": true,
                            columns: [{
                                    data: null,
                                    render: function(row, data, type) {
                                        if (row.logo === '') {
                                            return "<img src='{{ asset('testimg/dummy.png') }}' width='50px' height='50px'/>";
                                        } else {
                                            return "<img src='{{ asset('testimg') }}/" + row.logo +
                                                "' width='50px' height='50px' class='bg-dark'/>";
                                        }

                                    }
                                },
                                {
                                    data: 'login',

                                },
                                {
                                    data: 'signup',

                                },

                                {
                                    data: null,
                                    render: function(row, data, type) {
                                        if (row.status === 'active') {

                                            return "<label class='label label-success'>Active</label>";
                                        } else {
                                            return "<label class='label label-dark'>Suspend</label>";
                                        }

                                    }
                                },
                                {
                                    data: null,
                                    render: function(row, data, type) {
                                        var actions = "";
                                        actions += "<div class='btn-group'>" +
                                            "<button data-toggle='dropdown' class='btn btn-info btn-small dropdown-toggle'>Select Action <span class='caret'></span></button>" +
                                            "<ul class='dropdown-menu'>" +
                                            "<li><a  href='javascript:;' onclick='javascript:statusModel(" + row.id +
                                            ")'>ChangeStatus</a></li>" +
                                            "<li><a  href='javascript:;' onclick='javascript:updateModel(" +
                                            row.id + ")'>Update</a></li>" +
                                            "<li><a  href='' onclick='javascript:deleteModel(" +
                                            row.id +
                                            ")'  role='button' data-toggle='modal'>Remove</a></li>";

                                        actions += "</ul>" +
                                            "</div>";

                                        return actions;
                                    }
                                },

                            ],
                            "order": [
                                [1, 'asc']
                            ],


                        });



                }

                function deleteModel(id) {
                    Swal.fire({
                        title: "Are you sure you want to delete",
                        text: "You won't be able to revert this",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let _token = "{{ csrf_token() }}";
                            $.ajax({
                                type: "POST",
                                url: "{{ Route('header.delete') }}",
                                data: {
                                    id: id,
                                },
                                _token: _token,
                            }).done(function(data) {
                                table.ajax.reload();
                                if (data == 0) {
                                    Command: toastr["error"](" ", "Row has not been removed successfully")
                                    errorSound.play();
                                }
                                if (data == 1) {

                                    successSound.play();
                                    Command: toastr["success"]("Row has been Removed Successfully")
                                }

                            });
                        }


                    });
                }

                //................................................................................
                function statusModel(id) {

                    Swal.fire({
                        title: "Are you sure you want to Active Status where Id",
                        confirmButtonText: 'Change Status',
                        focusConfirm: false,
                        showCloseButton: true,
                    }).then((result) => {
                        console.log(result)
                        if (result.isConfirmed) {
                            let _token = "{{ csrf_token() }}";
                            $.ajax({
                                type: "post",
                                url: "{{ Route('header.changeStatus') }}",
                                data: {
                                    id: id,
                                },
                                _token: _token,
                            }).done(function(data) {
                                console.log(data);
                                if (data == 0) {
                                    // alert('Status Active');
                                    Command: toastr["error"](" ", "Status Already Active")
                                    // errorSound.play();
                                }

                                if (data == 1) {
                                    // alert('Status Suspend');
                                    Command: toastr["success"]("Status Changed Successfully")
                                    // successSound.play();
                                }
                                table.ajax.reload();
                            });
                        }


                    });



                }
                //................................................................................
                function updateModel(id) {
                    console.log(id);
                    var jqxhr = $.post('{{ Route('header.getsingleData') }}', {
                        id: id
                    }, function(response) {
                        // alert(response);
                        Swal.fire({
                            title: "Are you sure you want to Update?",
                            html: "<div class='form-horizontal'>" +

                                "<div class='control-group'>" +
                                "<label class='control-label'>Login</label>" +
                                "<div class='controls'>" +
                                "  <input name='login' type='text'  value='" + response.login +
                                "' placeholder='Email' class='input-large'/>" +
                                "<span class='help-inline'></span>" +
                                "  </div>" +
                                "</div>" +
                                "<div class='control-group'>" +
                                "<label class='control-label'>Sign Up</label>" +
                                "<div class='controls'>" +
                                "  <input name='signup' type='text'  value='" + response.signup +
                                "' placeholder='Email' class='input-large'/>" +
                                "<span class='help-inline'></span>" +
                                "  </div>" +
                                "</div>" +
                                "<div class='control-group'>" +
                                "<label class='control-label'>Select Logo</label>" +
                                "<div class='controls'>" +
                                "<input name='file' type='file' class='files' accept='image/*' />" +
                                "<span class='help-inline'></span>" +
                                "  </div>" +
                                "</div>" +
                                "</div>",

                            preConfirm: () => {


                                const login = Swal.getPopup().querySelector('input[name=login]').value
                                const signup = Swal.getPopup().querySelector('input[name=signup]').value


                                return {
                                    login: login,
                                    signup: signup,

                                }



                            },
                            confirmButtonText: 'Update Record',
                            focusConfirm: false,
                            showCloseButton: true,
                        }).then((result) => {
                            console.log(result);
                            let _token = $('input[name=_token]').val();
                            if (result.isConfirmed) {
                                console.log(result);
                                var formData = new FormData();
                                var file = $('.files')[0].files[0];
                                let login = result.value.login;
                                let signup = result.value.signup;
                                formData.append("file", file);
                                formData.append("login", login);
                                formData.append("signup", signup);
                                formData.append('id', id);
                                console.log(file);
                                $.ajax({
                                    type: "POST",
                                    url: "{{ Route('header.updateData') }}",
                                    dataType: 'JSON',
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    data: formData,
                                    _token: _token,
                                }).done(function(res) {
                                    console.log(res);
                                    if (res == 1) {
                                        Command: toastr["success"](
                                            "Data Updated Successfully")
                                        // successSound.play();


                                    }
                                    if (!res == 1) {
                                        Command: toastr["error"](
                                            "Not Updated Successfully")
                                        // successSound.play();

                                    }
                                    table.ajax.reload(null, false);
                                });


                            }
                        });
                    });
                }
//..........................Edit Content For MenuBar.................................................
                function MenuData() {

                    console.log('MenuData function called');
                    Menutable = $('#menuView')
                        .on('init.dt', function() {
                            console.log('Menu Table initialisation complete: ' + new Date().getTime());
                        })
                        .DataTable({
                            "lengthMenu": [
                                [5, 10, 25, 50, -1],
                                [5, 10, 25, 50, "All"]
                            ],
                            ajax: "{{ Route('header.getMenuData') }}",

                            "stateSave": true,
                           
                            columns: [
                                {
                                    data: 'menu_name',

                                },
                                {
                                    data: 'menu_link',

                                },
                                {
                                  data:'link_modal',	
                                },
                                {
                                    data: null,
                                    render: function(row, data, type) {
                                        var actions = "";
                                        actions += "<div class='btn-group'>" +
                                            "<button data-toggle='dropdown' class='btn btn-info btn-small dropdown-toggle'>Select Action <span class='caret'></span></button>" +
                                            "<ul class='dropdown-menu'>" +
                                            "<li><a  href='javascript:;' onclick='javascript:MenuupdateModel(" +
                                            row.id + ")'>Update</a></li>" +
                                            "<li><a  href='' onclick='javascript:MenudeleteModel(" +
                                            row.id +
                                            ")'  role='button' data-toggle='modal'>Remove</a></li>";

                                        actions += "</ul>" +
                                            "</div>";

                                        return actions;
                                    }
                                },
                            ],
                        });


                }
                function MenudeleteModel(id) {
                    Swal.fire({
                        title: "Are you sure you want to delete",
                        text: "You won't be able to revert this",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let _token = "{{ csrf_token() }}";
                            $.ajax({
                                type: "POST",
                                url: "{{ Route('header.menudelete') }}",
                                data: {
                                    id: id,
                                },
                                _token: _token,
                            }).done(function(data) {
                                Menutable.ajax.reload();
                                if (data == 0) {
                                    Command: toastr["error"](" ", "Row has not been removed successfully")
                                    // errorSound.play();
                                }
                                if (data == 1) {

                                    // successSound.play();
                                    Command: toastr["success"]("Row has been Removed Successfully")
                                }

                            });
                        }


                    });
                }

               
                //................................................................................
                function MenuupdateModel(id) {
                    console.log(id);
                    var jqxhr = $.post('{{ Route('header.getMenusingleData') }}', {
                        id: id
                    }, function(response) {
                        // alert(response);
                        Swal.fire({
                            title: "Are you sure you want to Update?",
                            html: "<div class='form-horizontal'>" +

                                "<div class='control-group'>" +
                                "<label class='control-label'>Menu Name</label>" +
                                "<div class='controls'>" +
                                "  <input name='menu_name' type='text'  value='" + response.menu_name +
                                "' placeholder='Email' class='input-large'/>" +
                                "<span class='help-inline'></span>" +
                                "  </div>" +
                                "</div>" +
                                "<div class='control-group'>" +
                                "<label class='control-label'>Menu link</label>" +
                                "<div class='controls'>" +
                                "  <input name='menu_link' type='text'  value='" + response.menu_link +
                                "' placeholder='Email' class='input-large'/>" +
                                "<span class='help-inline'></span>" +
                                "  </div>" +
                                "</div>" +
                                "<div class='control-group'>" +
                                "<label class='control-label'>Menu link</label>" +
                                "<div class='controls'>" +
                                "  <input name='link_modal' type='text'  value='" + response.link_modal +
                                "' placeholder='Enter Modal link' class='input-large'/>" +
                                "<span class='help-inline'></span>" +
                                "  </div>" +
                                "</div>" +
                                "</div>",

                            preConfirm: () => {


                                const menu_name = Swal.getPopup().querySelector('input[name=menu_name]').value
                                const menu_link = Swal.getPopup().querySelector('input[name=menu_link]').value
                                const link_modal = Swal.getPopup().querySelector('input[name=link_modal]').value


                                return {
                                    menu_name: menu_name,
                                    menu_link: menu_link,
                                    link_modal:link_modal,

                                }



                            },
                            confirmButtonText: 'Update Record',
                            focusConfirm: false,
                            showCloseButton: true,
                        }).then((result) => {
                            console.log(result);
                            let _token = $('input[name=_token]').val();
                            if (result.isConfirmed) {
                                console.log(result);
                                var formData = new FormData();
                                let menu_name = result.value.menu_name;
                                let menu_link = result.value.menu_link;
                                let link_modal = result.value.link_modal;
                                formData.append("menu_name", menu_name);
                                formData.append("menu_link", menu_link); 
                                formData.append("link_modal", link_modal);
                                formData.append('id', id);
                                $.ajax({
                                    type: "POST",
                                    url: "{{ Route('header.updateMenuData') }}",
                                    dataType: 'JSON',
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    data: formData,
                                    _token: _token,
                                }).done(function(res) {
                                    console.log(res);
                                    if (res == 1) {
                                        Command: toastr["success"](
                                            "Data Updated Successfully")
                                        // successSound.play();


                                    }
                                    if (!res == 1) {
                                        Command: toastr["error"](
                                            "Not Updated Successfully")
                                        // successSound.play();

                                    }
                                    Menutable.ajax.reload(null, false);
                                });


                            }
                        });
                    });
                }
            </script>
        @endsection
