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
                        Header Menu Content
                    </h3>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <div class="row-fluid">
                <div class='sapn12'>
                    <div class="widget">
                        <div class="widget-title">
                            <h4> Header Menu Section Content</h4>
                        </div>
                        <div class="widget-body" style="padding: 32px 60px;">
                            <form action="{{ Route('header.insertMenu') }}" method="POST"  class='form-horizontal'>
                                   @csrf
                                  
                               
                                    <div class="control-group">
                                        <label class="control-label">Menu Name</label>
                                        <div class="controls">
                                            <input class="span6" name="name" placeholder="Enter Menu Name" type="text"/>
                                        </div>
                                        <div class="controls">
                                            @error('name')
                                            <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Menu link</label>
                                    <div class="controls">
                                        <input class="span6" name="link" placeholder="Enter Link" type="text"/>
                                    </div>
                                    <div class="controls">
                                        @error('link')
                                        <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Modal link</label>
                                <div class="controls">
                                    <input class="span6" name="modal" placeholder="Enter Modal Link" type="text"/>
                                </div>
                                <div class="controls">
                                    @error('modal')
                                    <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}</div>
                                    @enderror
                                </div>
                        </div>
                            <div class="control-group">
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"><i class="icon-ok"></i> Save</button>
                                    <a href="{{Route('header.getheader')}}" class="btn "><i class=" icon-remove"></i> Cancel</a>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            
            </div>
    </div>
</div>


@endsection