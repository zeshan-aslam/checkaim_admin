@extends('master.main')
@section('content')
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
                        GDPR Legislation
                    </h3>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <div class="row-fluid">
                <div class='sapn12'>
                    <div class="widget">
                        <div class="widget-title">
                            <h4> GDPR Legislation</h4>
                        </div>
                        <div class="widget-body" style="padding: 32px 60px;">
                            <form action="{{ url('/GDPRLegislation') }}" method="POST" enctype="multipart/form-data"
                            class='form-horizontal'>
                            @if(session('message'))
                            <div class="alert alert-success">
                            {{ session('message') }}
                            </div>
                            @endif
   
                            @csrf
                                <div class="control-group">
                                    <label class="control-label"> Heading</label>
                                    <div class="controls">
                                        <input class="span6" name="title" placeholder="Enter Heading" type="text" />
                                    </div>
                                    <div class="controls">
                                        @error('title')
                                            <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Text</label>
                                    <div class="controls">
                                        <textarea id="content" class="input-block-level ckeditor" name="text" rows="3" required=""></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"><i class="icon-ok"></i> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            {{-- GDPRLegislation --}}
            <div class="widget blue">
                <div class="widget-title">
                    <h4>Content</h4>
                    <span class="tools">
                    </span>
                </div>
                <div class="widget-body">
                    <div>
                        <div class="clearfix">
                            
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
                                    <th>Text</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shows as $data)
                                <tr>
                                    <td>{{ $data->title }}</td>
                                    {{-- <td>{{ $data->text }}</td> --}}
                                    <td><a href="#myModal{{$data->id }}" role="button" class="btn btn-success" data-toggle="modal">text</a></td>
                                    <td><a href="{{ url('GDPRLegislation-edit/'.$data->id) }}" type="button" class="btn btn-primary btn-lg">Edit</a>
                                        <a href="{{ url('GDPRLegislation/'.$data->id) }}" type="button" class="btn btn-danger btn-lg">Delete</a>
                                    </td>
                                </tr>
                            @endforeach  
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Heading</th>
                                    <th>Text</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            {{--  --}}
            @foreach ($shows as $data)
            <div id="myModal{{$data->id }}" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" style="display: none;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel1">Description </h3>
                </div>
                <div class="modal-body">
                    {{ $data->text }}
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content', {
        height: 300,
        filebrowserUploadUrl: "editUniUpload.php"
    });
</script>
@endsection

