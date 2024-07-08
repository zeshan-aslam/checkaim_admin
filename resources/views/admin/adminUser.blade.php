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
                        ADMIN USER
                        
                    </h3>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <div class='row-fluid'>
                <div class="span7">
                  
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4> Admin User</h4>
                            <span class="tools">
                            </span>
                        </div>
                        <div class="widget-body">
                            <div>
                                <div class="clearfix">
                                    <div class="btn-group">
                                      
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
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="span5">
                    @if (Session::has('msg'))
                    <div class="alert alert-success text-center">
                        <button data-dismiss="alert" class="close" type="button">×</button>
                        <span>{{ Session::get('msg') }}</span>
                    </div>
                @endif
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4>Create New Admin</h4>
                        </div>
                        <div class="widget-body">
                            <form action="{{ Route('registerAdminUser') }}" method="POST" enctype="multipart/form-data" class='form-horizontal'>
                                   @csrf
                                   <div class="control-group">
                                    <label class="control-label" style="text-align: center">NAME</label>
                                    <div class="controls">
                                        <input class="span12" name="name" placeholder="Enter Name" type="text"/>
                                    </div>
                                    <div class="controls">
                                        @error('signup')
                                        <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                            </div>
                                    <div class="control-group">
                                        <label class="control-label" style="text-align: center">E_mail</label>
                                        <div class="controls">
                                            <input class="span12" name="email" placeholder="Enter Email" type="text"/>
                                        </div>
                                        <div class="controls">
                                            @error('login')
                                            <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" style="text-align: center">Password</label>
                                    <div class="controls">
                                        <input class="span12" name="password" placeholder="Enter Password" type="text"/>
                                    </div>
                                    <div class="controls">
                                        @error('signup')
                                        <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                            </div>
                            <div class="control-group" style="    display: flex;
                            flex-direction: row;
                            align-content: space-between;
                            flex-wrap: nowrap;
                            justify-content: space-evenly;">
                               
                                    <button type="submit" class="btn btn-success"><i class="icon-ok"></i> Save</button>
                                    <a href="" class="btn "><i class=" icon-remove"></i> Cancel</a>
                                
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE widget-->
                <!-- END -->
            </div>
            <!-- END -->
 

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
                            ajax: "{{ url('getadmin') }}",

                            "stateSave": true,
                            columns: [
                                {
                                    data: 'name',

                                },
                                {
                                    data: 'username',

                                },
                                {
                                    data: 'password',

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
            </script>
        @endsection
