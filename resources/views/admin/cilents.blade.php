@extends('master.main')
@section('content')
    <!-- BEGIN PAGE -->
    <div id="main-content">
		
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
          
             <h3 class="page-title">
                        Clients
                    </h3>
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EDITABLE TABLE widget-->
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN EXAMPLE TABLE widget-->
                            <div class="widget blue">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Clients listing</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <div>
                                        <div class="clearfix">
                                            <div class="btn-group">
                                               
                                            </div>
                                          
                                        </div>
                                        <div class="space15"></div>
                                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                            <thead>
                                                <tr>
                                                    <th>Company Name</th>
                                                    <th>User Name</th>
                                                    <th>Email</th>
                                                    <th>PHONE NUMBER</th>
                                                    <th>MONTHLY FEE</th>
                                                    <th>DAILY CHARGE</th>
                                                    <th>BALANCE</th>
                                                    <th>JOIN DATE</th>
                                                    <th>STATUS</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												@php $no_of_days_in_month = cal_days_in_month(CAL_GREGORIAN,date('m'),date('y')); @endphp
                                                @foreach ($dataToShow as $row)
                                                    <tr class="">
                                                        <td>{{ $row['av_company'] }}</td>
                                                        <td>{{ $row['first_name'] }}-{{ $row['last_name'] }}</td>
                                                        <td>{{substr($row['av_email'], 0, 25)}}</td>
                                                        <td>{{ $row['av_phone'] }}</td>
                                                        <td>{{ $row['monthly_license_fee'] }}</td>
														
                                                        <td>{{round((int)$row['monthly_license_fee']/$no_of_days_in_month,2)}}</td>
                                                        <td>$0.00</td>
                                                        <td>2020-05-12</td>
                                                        <td>
                                                            @if ($row['av_campaign_status'] == 'approve')
                                                                <label class='label label-success'>Approved</label>
                                                            @elseif ($row['av_campaign_status'] == 'waiting')
                                                                <label class='label label-warning'>Waiting</label>
                                                            @else
                                                                <label class='label label-dark'>Suspend</label>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class='btn-group'>
                                                                <button data-toggle='dropdown'
                                                                    class='btn btn-info btn-small dropdown-toggle'>Select
                                                                    Action <span class='caret'></span></button>
                                                                <ul class='dropdown-menu'>
                                                                    <li><a href='javascript:;'><a class="view"
                                                                                href="{{ url('/single_cilent', $row['id']) }}">View</a></a>
                                                                    </li>
                                                                    <li><a target="_blank"
                                                                                href="https://checkaim.com/newadmin/controller/clients.php?clientlogin=yes&uid={{ $row['id'] }}">Login</a>
                                                                    </li>
                                                                    <li><a class="view"
                                                                                href="{{ url('/delete_cilent', $row['id']) }}">Delete</a>
                                                                    </li>
                                                                    @if ($row['av_campaign_status'] == 'approve')
                                                                        <li>
                                                                            <a href='javascript:;'
                                                                                onclick="UpdateStatus({{ $row['id'] }},'waiting')">Waiting</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href='javascript:;'
                                                                                onclick="UpdateStatus({{ $row['id'] }},'suspend')">Suspend</a>
                                                                        </li>
                                                                    @elseif ($row['av_campaign_status'] == 'waiting')
                                                                    <li>
                                                                        <a href='javascript:;'
                                                                            onclick="UpdateStatus({{ $row['id'] }},'approve')">Approved</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href='javascript:;'
                                                                            onclick="UpdateStatus({{ $row['id'] }},'suspend')">Suspend</a>
                                                                    </li>
                                                                    @else
                                                                    <li>
                                                                        <a href='javascript:;'
                                                                            onclick="UpdateStatus({{ $row['id'] }},'approve')">Approved</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href='javascript:;'
                                                                            onclick="UpdateStatus({{ $row['id'] }},'suspend')">Suspend</a>
                                                                    </li>
                                                                    @endif

                                                                </ul>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE widget-->
                        </div>
                    </div>

                    <!-- END EDITABLE TABLE widget-->
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

        function UpdateStatus(id,status) {
            url = "{{ url('statusChange') }}";
            console.log(id);
           console.log(status);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: "POST",
				dataType:' application/json',
                data: {
                    id: id,
                    status:status,
                },
                cache: false,
              success: function(data){
                    console.log(data);
                   window.location.reload();
                },
           error: function(xhr,status,error){
         var errorMessage = xhr.status + ': ' + xhr.statusText
         console.log('Error - ' + error);
					 window.location.reload();
     }
            });
        }
    </script>
@endsection
