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
                            <form action="{{ Route('section2.insertsection2') }}" method="POST"
                                enctype="multipart/form-data" class='form-horizontal'>
                                @csrf
                                <div class="control-group">
                                    <label class="control-label"> Heading</label>
                                    <div class="controls">
                                        <input class="span6" name="heading" placeholder="Enter Heading" type="text" />
                                    </div>
                                    <div class="controls">
                                        @error('heading')
                                            <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Text</label>
                                    <div class="controls">
                                        <textarea class="span6" name="text" placeholder="Enter Text" type="text"></textarea>
                                    </div>
                                    <div class="controls">
                                        @error('text')
                                            <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}
                                            </div>
                                        @enderror
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
                                    <td>1</td>
                                    <td>2</td>
                                    <td>
                                        <a href="#" type="button" class="btn btn-primary btn-lg">Edit</a>
                                        <a href="#" type="button" class="btn btn-danger btn-lg">Delete</a>

                                    </td>
                                  
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

        </div>
    </div>
@endsection


