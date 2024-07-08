@extends('master.main')
@section('content')
<div id="main-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
               <!-- BEGIN PAGE HEADER-->
               <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        Section3 Content 
                    </h3>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <div class="row-fluid">
                <div class='sapn12'>
                    <div class="widget">
                        <div class="widget-title">
                            <h4>Section3 Content Form</h4>
                        </div>
                        <div class="widget-body" style="padding: 32px 60px;">
                            <form action="{{ Route('section3.insertsection3') }}" method="POST" enctype="multipart/form-data" class='form-horizontal'>
                                   @csrf
                                <div class="control-group">
                                    <label class="control-label">Heading</label>
                                    <div class="controls">
                                        <input class="span6" name="heading" placeholder="Enter Heading" type="text"/>
                                    </div>
                                    <div class="controls">
                                        @error('heading')
                                        <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}</div>
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
                                            <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Bottom Text</label>
                                    <div class="controls">
                                        <textarea class="span6" name="btm_text" placeholder="Enter Text" rows="3"></textarea>
                                    </div>
                                    <div class="controls">
                                        @error('btm_text')
                                        <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Bottom Highlight Text</label>
                                    <div class="controls">
                                        <textarea class="span6" name="btm_hl_text" placeholder="Enter Text" rows="3"></textarea>
                                    </div>
                                    <div class="controls">
                                        @error('btm_hl_text')
                                        <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                               
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"><i class="icon-ok"></i> Save</button>
                                    <a href="{{Route('section3.section3content')}}" class="btn "><i class=" icon-remove"></i> Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            
            </div>
    </div>
</div>
@endsection