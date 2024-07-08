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
                        Section1 Content
                    </h3>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <div class="row-fluid">
                <div class='sapn12'>
                    <div class="widget">
                        <div class="widget-title" >
                            <h4>  Section1 Edit Content</h4>
                        </div>
                        <div class="widget-body" style="padding: 32px 60px;">
                            <form action="{{ Route('section1.insertsection1') }}" method="POST" enctype="multipart/form-data" class='form-horizontal'>
                                   @csrf
                                <div class="control-group">
                                    <label class="control-label"> Heading</label>
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
                                        <label class="control-label">text</label>
                                        <div class="controls">
                                            {{-- <input class="span6" name="text"  type="text"/> --}}
                                            <textarea class="span6" name="text" placeholder="Enter text" rows="3"></textarea>
                                        </div>
                                        <div class="controls">
                                            @error('text')
                                            <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Button Text</label>
                                    <div class="controls">
                                        <textarea class="span6" name="btn_text" placeholder="Enter Button Name" type="text"></textarea>
                                    </div>
                                    <div class="controls">
                                        @error('btn_text')
                                        <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                    <div class="control-group">
                                        <label class="control-label">Video Link</label>
                                        <div class="controls">
                                            <textarea class="span6" name="v_link" placeholder="Enter Video Link" class="span12" rows="3"></textarea>
                                        </div>
                                        <div class="controls">
                                            @error('v_link')
                                            <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"><i class="icon-ok"></i> Save</button>
                                    <a href="{{Route('section1.getcontent')}}" class="btn "><i class=" icon-remove"></i> Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            
            </div>
    </div>
</div>
@endsection