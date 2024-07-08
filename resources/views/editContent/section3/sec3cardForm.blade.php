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
                        Section3 Card Content 
                    </h3>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <div class="row-fluid">
                <div class='sapn12'>
                    <div class="widget">
                        <div class="widget-title">
                            <h4>Section3 Card Content Form</h4>
                        </div>
                        <div class="widget-body" style="padding: 32px 60px;">
                            <form action="{{ Route('section3.insert_section3_card_content') }}" method="POST" enctype="multipart/form-data" class='form-horizontal'>
                                   @csrf
                                <div class="control-group">
                                    <label class="control-label">Main Heading</label>
                                    <div class="controls">
                                        <input class="span6" name="main_heading" placeholder="Enter Heading" type="text"/>
                                    </div>
                                    <div class="controls">
                                        @error('main_heading')
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
                                    <label class="control-label">Heading</label>
                                    <div class="controls">
                                        <textarea class="span6" name="heading" placeholder="Enter heading" rows="3"></textarea>
                                    </div>
                                    <div class="controls">
                                        @error('heading')
                                        <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Item List</label>
                                    <div class="controls">
                                        <textarea class="span6" name="list_text" placeholder="Enter item list% in this %format" rows="3"></textarea>
                                        <span><b style="color:red">Hint:</b>Separate each item list using '%' keyword</span>
                                    </div>
                                    <div class="controls">
                                        @error('list_text')
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