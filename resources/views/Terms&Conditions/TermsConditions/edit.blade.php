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
                        Terms and Conditions
                    </h3>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <div class="row-fluid">
                <div class='sapn12'>
                    <div class="widget">
                        <div class="widget-title">
                            <h4> Terms and Conditions</h4>
                        </div>
                        <div class="widget-body" style="padding: 32px 60px;">
                            <form action="{{ url('TermsConditions_update/'.$policy_edit->id) }}" method="POST" enctype="multipart/form-data"
                                class='form-horizontal'>
                                @csrf
                                <div class="control-group">
                                    <label class="control-label"> Heading</label>
                                    <div class="controls">
                                        <input class="span6" name="heading" placeholder="Enter Heading" type="text" value="{{$policy_edit->heading}}"
                                            required />
                                    </div>
                                    <div class="controls">
                                        @error('heading')
                                            <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="control-group">
                                    <label class="control-label">Text</label>
                                    <div class="controls">
                                        <textarea class="span6 ckeditor" name="text" placeholder="Enter Text" type="text" name="editor1" rows="6"
                                            required>{{$policy_edit->text}}</textarea>
                                    </div>
                                    <div class="controls">
                                        @error('text')
                                            <div class="alert alert-danger span6" style="margin-top: 5px;">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div> --}}

                                <div class="control-group">
                                    <label class="control-label">Text</label>
                                    <div class="controls">
                                        <textarea id="content" class="input-block-level ckeditor" name="text" rows="3" required="">{{$policy_edit->text}}</textarea>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"><i class="icon-ok"></i>Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            {{-- list privacy and policy --}}
            
            {{--  --}}

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
