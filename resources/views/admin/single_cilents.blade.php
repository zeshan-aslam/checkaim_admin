@extends('master.main')
@section('content')
    <!-- BEGIN PAGE -->
    <div id="main-content">
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
			 <h3 class="page-title">
                        Clients
                    </h3>
            <div class="row-fluid">
                <div class="span8">
                    <div class="widget black">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Profile </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body" style="padding-left: 70px!important;
                        padding-right: 32px!important;">
                            <!-- BEGIN FORM-->
                            <form action="#" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">First Name</label>
                                <div class="controls">
                                    <span class="help-inline">{{ $single_view['first_name'] }}</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Last Name</label>
                                <div class="controls">
                                    <span class="help-inline">{{ $single_view['last_name'] }}</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Category</label>
                                <div class="controls">
                                    <span class="help-inline">{{ $single_view['av_category'] }}</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Url</label>
                                <div class="controls">
                                    <span class="help-inline">{{ $single_view['av_url'] }}</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Fax</label>
                                <div class="controls">
									@if( isset($single_view['av_fax']))
									
									 <span class="help-inline">{{ $single_view['av_fax']}}</span>
								
									@else
									
								<span class="help-inline"></span>

									
									 @endif
                                   
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Phone Number</label>
                                <div class="controls">
                                    <span class="help-inline">{{ $single_view['av_phone'] }}</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <span class="help-inline">{{ $single_view['av_email'] }}</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <span class="help-inline">{{ $single_view['av_address'] }}</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Post Code</label>
                                <div class="controls">
                                
									
									@if( isset($single_view['av_post_code']))
									
									 <span class="help-inline">{{ $single_view['av_post_code']}}</span>
									
									@else
									
								<span class="help-inline"></span>

									
									 @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">City</label>
                                <div class="controls">
                                    
									@if( isset($single_view['av_city']))
									
									 <span class="help-inline">{{ $single_view['av_city'] }}</span>
									
									@else
									
								<span class="help-inline"></span>

									
									 @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">State</label>
                                <div class="controls">
                                 
									@if( isset($single_view['av_state']))
									
									 <span class="help-inline">{{ $single_view['av_state']}}</span>
									
									@else
									
								<span class="help-inline"></span>

									
									 @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Country</label>
                                <div class="controls">
                                   
									@if( isset($single_view['av_country']))
									
									 <span class="help-inline">{{ $single_view['av_country']}}</span>
									
									@else
									
								<span class="help-inline"></span>

									
									 @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Currency</label>
                                <div class="controls">
                                    <span class="help-inline">{{ $single_view['av_Currency'] }}</span>
                                </div>
                               
                            </div>
                            <div class="control-group">
                                <label class="control-label">Status</label>
                                <div class="controls">
                                    <span class="help-inline">{{ $single_view['av_campaign_status'] }}</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Monthly Fee</label>
                                <div class="controls">
                                   
									@if( isset($single_view['monthly_license_fee']))
									
									 <span class="help-inline">{{ $single_view['monthly_license_fee']}}</span>
									
									@else
									
								<span class="help-inline"></span>
									
									 @endif
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                
                    <!-- END GRID PORTLET-->
                </div>

                <!-- END GRID PORTLET-->
            </div>
        </div>
    </div>
    </div>
@endsection
@section('js')
    <!--script for this page only-->
    <script src="{{ asset('theme/assets/data-tables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('theme/assets/data-tables/DT_bootstrap.js') }}"></script>
    <script src="{{ asset('theme/js/editable-table.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            EditableTable.init();
        });
    </script>
@endsection
