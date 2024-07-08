@extends('master.main')
@section('content')
    <!-- BEGIN PAGE -->
    <div id="main-content">
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN THEME CUSTOMIZER-->
                    <div id="theme-change" class="hidden-phone">
                        <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme Color:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-green" data-style="green"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-red" data-style="red"></span>
                            </span>
                        </span>
                    </div>
                    <!-- END THEME CUSTOMIZER-->
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        Section2 Content

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
                            <h4> Section2 Content</h4>
                            <span class="tools">
                            </span>
                        </div>
                        <div class="widget-body">
                            <div>
                                <div class="clearfix">
                                    <div class="btn-group">
                                        <a href="{{ Route('section2.section2form') }}" class="btn btn-primary">Add
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

                                <table id='sliderView' class=" table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>

                                            <th>Heading</th>
                                            <th>Title</th>
                                            <th>Text</th>
                                            <th>Logo</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Heading</th>
                                            <th>Title</th>
                                            <th>Text</th>
                                            <th>Logo</th>
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
            {{-- .............................................. --}}
            <div class='row-fluid'>
                <div class="span12">
                  
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4> Section2 Slider Content</h4>
                            <span class="tools">
                            </span>
                        </div>
                        <div class="widget-body">
                            <div>
                                <div class="clearfix">
                                    <div class="btn-group">
                                        <a href="{{ Route('section2.sliderform') }}" class="btn btn-primary">Add
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

                                <table id='section2View' class=" table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>

                                            <th>Heading</th>
                                            <th>Text</th>
                                            <th>Address</th>
                                            <th>Url</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Heading</th>
                                            <th>Text</th>
                                            <th>Address</th>
                                            <th>Url</th>
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
        </div>
    </div>
@endsection
@section('js')
    <script>
        var successSound = new Audio("{{ asset('audio/success.mp3') }}");
        var errorSound = new Audio("{{ asset('audio/error.mp3') }}");
        var warningSound = new Audio("{{ asset('audio/warning.wav') }}");
        $(document).ready(function() {
            var table = '';
            console.log('Merchants ready');
            drawData();
            sliderData();
            var merchantId = 0;
            var payMerchantId = 0;
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

            table = $('#sliderView')
                .on('init.dt', function() {

                    console.log('Table initialisation complete: ' + new Date().getTime());
                })


                .DataTable({
                    "lengthMenu": [
                        [5, 10, 25, 50, -1],
                        [5, 10, 25, 50, "All"]
                    ],
                    ajax: "{{ Route('section2.getsection2') }}",

                    "stateSave": true,


                    columns: [


                        {
                            data: 'heading',

                        },
                        {
                            data: 'title',

                        },
                        {
                            data: 'text',

                        },
                        {
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
                                    "<li><a  href='#' onclick='javascript:deleteModel(" +
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
                        url: "{{ Route('section2.deletesection2') }}",
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
                title: "Are you sure you want to Active Status",
                confirmButtonText: 'Change Status',
                focusConfirm: false,
                showCloseButton: true,
            }).then((result) => {
                console.log(result)
                if (result.isConfirmed) {
                    let _token = "{{ csrf_token() }}";
                    $.ajax({
                        type: "post",
                        url: "{{ Route('section2.section2Changestatus') }}",
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
            var jqxhr = $.post('{{ Route('section2.getsingleContent2') }}', {
                id: id
            }, function(response) {
                // alert(response);
                Swal.fire({
                    title: "Are you sure you want to Update?",
                    html: "<div class='form-horizontal'>" +

                        "<div class='control-group'>" +
                        "<label class='control-label'>Heading</label>" +
                        "<div class='controls'>" +
                        "  <input name='heading' type='text'  value='" + response.heading +
                        "' placeholder='Heading' class='input-large'/>" +
                        "<span class='help-inline'></span>" +
                        "  </div>" +
                        "</div>" +
                        "<div class='control-group'>" +
                        "<label class='control-label'>Title</label>" +
                        "<div class='controls'>" +
                        "  <input name='title' type='text'  value='" + response.title +
                        "' placeholder='Title' class='input-large'/>" +
                        "<span class='help-inline'></span>" +
                        "  </div>" +
                        "</div>" +
                        "<div class='control-group'>" +
                        "<label class='control-label'>Text</label>" +
                        "<div class='controls'>" +
                        "  <textarea name='text' type='text' rows='4' cols='50' value='" + response.text +
                        "' placeholder='Text' class='input-large'>" + response.text +"</textarea>" +
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


                        const heading = Swal.getPopup().querySelector('input[name=heading]').value
                        const text = Swal.getPopup().querySelector('textarea[name=text]').value
                        const title = Swal.getPopup().querySelector('input[name=title]').value




                        return {
                            heading: heading,
                            text: text,
                            title: title,


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
                        let heading = result.value.heading;
                        let text = result.value.text;
                        let title = result.value.title;
                        let logo = result.value.logo;
                        formData.append("id", id);
                        formData.append("file", file);
                        formData.append("heading", heading);
                        formData.append("text", text);
                        formData.append("title", title);


                        $.ajax({
                            type: "POST",
                            url: "{{ Route('section2.updatesection2content') }}",
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
        //................................................................................................................................
        function sliderData() {

            console.log('sliderData called');

            section2table = $('#section2View')
                .on('init.dt', function() {

                    console.log('Table initialisation complete: ' + new Date().getTime());
                })
                .DataTable({
                    "lengthMenu": [
                        [5, 10, 25, 50, -1],
                        [5, 10, 25, 50, "All"]
                    ],
                    ajax: "{{ Route('section2.getsection2slider') }}",

                    "stateSave": true,


                    columns: [


                        {
                            data: 'heading',

                        },
                        {
                            data: 'text',

                        },
                        {
                            data: 'address',

                        },
                        {
                            data: 'url',

                        },
                        {
                            data: null,
                            render: function(row, data, type) {
                                var actions = "";
                                actions += "<div class='btn-group'>" +
                                    "<button data-toggle='dropdown' class='btn btn-info btn-small dropdown-toggle'>Select Action <span class='caret'></span></button>" +
                                    "<ul class='dropdown-menu'>" +
                                    "<li><a  href='javascript:;' onclick='javascript:sliderupdateModel(" +
                                    row.id + ")'>Update</a></li>" +
                                    "<li><a  href='#' onclick='javascript:sliderdeleteModel(" +
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

        function sliderupdateModel(id) {

            console.log(id);
            var jqxhr = $.post('{{ Route('section2.getsinglesectionslider') }}', {
                id: id
            }, function(response) {
                // alert(response);
                Swal.fire({
                    title: "Are you sure you want to Update?",
                    html: "<div class='form-horizontal'>" +

                        "<div class='control-group'>" +
                        "<label class='control-label'>Heading</label>" +
                        "<div class='controls'>" +
                        "  <input name='heading' type='text'  value='" + response.heading +
                        "' placeholder='Heading' class='input-large'/>" +
                        "<span class='help-inline'></span>" +
                        "  </div>" +
                        "</div>" +
                        "<div class='control-group'>" +
                        "<label class='control-label'>Text</label>" +
                        "<div class='controls'>" +
                        "  <textarea name='text' type='text' rows='4' cols='50' value='" + response.text +
                        "' placeholder='Text' class='input-large'>" + response.text +"</textarea>" +
                        "<span class='help-inline'></span>" +
                        "  </div>" +
                        "</div>" +
                        "<div class='control-group'>" +
                        "<label class='control-label'>Address</label>" +
                        "<div class='controls'>" +
                        "  <textarea name='address' type='text' rows='4' cols='50'  value='" + response.address +
                        "' placeholder='Title' class='input-large'>" + response.address +"</textarea>" +
                        "<span class='help-inline'></span>" +
                        "  </div>" +
                        "</div>" +
                        "<div class='control-group'>" +
                        "<label class='control-label'>Url</label>" +
                        "<div class='controls'>" +
                        "  <textarea name='url' type='text' rows='4' cols='50' value='" + response.url +
                        "' placeholder='Title' class='input-large'>" + response.url +"</textarea>" +
                        "<span class='help-inline'></span>" +
                        "  </div>" +
                        "</div>" +
                        "</div>",

                    preConfirm: () => {
                        const heading = Swal.getPopup().querySelector('input[name=heading]').value
                        const text = Swal.getPopup().querySelector('textarea[name=text]').value
                        const address = Swal.getPopup().querySelector('textarea[name=address]').value
                        const url = Swal.getPopup().querySelector('textarea[name=url]').value
                        return {
                            heading: heading,
                            text: text,
                            address: address,
                            url: url,
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
                        let heading = result.value.heading;
                        let text = result.value.text;
                        let address = result.value.address;
                        let url = result.value.url;
                        formData.append("id", id);
                        formData.append("heading", heading);
                        formData.append("text", text);
                        formData.append("address", address);
                        formData.append("url", url);
                        $.ajax({
                            type: "POST",
                            url: "{{ Route('section2.updatesection2slider') }}",
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
                            section2table.ajax.reload(null, false);
                        });


                    }
                });
            });

        }

        function sliderdeleteModel(id) {

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
                        url: "{{ Route('section2.deletesection2slider') }}",
                        data: {
                            id: id,
                        },
                        _token: _token,
                    }).done(function(data) {
                        section2table.ajax.reload();
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
    </script>
@endsection
