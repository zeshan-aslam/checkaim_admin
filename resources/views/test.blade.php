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
                        Client Contract

                    </h3>
                    <ul class="breadcrumb">
                        {{-- <li>
                      <a href="#">Home</a>
                      <span class="divider">/</span>
                  </li>
                  <li>
                      <a href="#">Metro Lab</a>
                      <span class="divider">/</span>
                  </li> --}}
                        <li class="active">
                            User Listing
                        </li>
                        <li class="pull-right search-wrap">
                            <form action="search_result.html" class="hidden-phone">
                                <div class="input-append search-input-area">
                                    <input class="" id="appendedInputButton" type="text">
                                    <button class="btn" type="button"><i class="icon-search"></i> </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EDITABLE TABLE widget-->
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN EXAMPLE TABLE widget-->
                            <div class="widget blue">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i> User List</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <div>
                                        <div class="clearfix">
                                            <div class="btn-group">
                                                {{-- <button id="editable-sample_new" class="btn green">
                                                    Add New <i class="icon-plus"></i>
                                                </button> --}}
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
                                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                            <thead>
                                                <tr>
                                                    <th>Company Name</th>
                                                    <th>Contact Email</th>
                                                    <th>Contract Text</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($client as $response)
                                                    <tr class="">
                                                        <td>{{ $response->company_name ? $response->company_name : '' }}
                                                        </td>
                                                        <td>{{ $response->contact_email }}</td>
                                                        <td> <a href="#myModal{{ $response->id }}" role="button"
                                                                class="btn btn-warning" data-toggle="modal">Contract</a>
                                                        </td>
                                                        <td>${{ $response->cMonthlyFee }}</td>
                                                        <td>
                                                           @if ($response->cMonthlyFee<=300 && $response->sigStatus==1)
                                                            <a href="https://www.sandbox.paypal.com/webapps/billing/plans/subscribe?plan_id=P-5T705313R53331815MMHSICA"
                                                            role="button" class="btn btn-info"
                                                            data-toggle="modal">Subscribe by Paypal</a>
                                                           @else
                                                            <span class="label label-success">Signed</span>
                                                           
                                                           
                                                           @endif 
                                                            
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
    <!-- Modal -->
    @foreach ($client as $response)
        <div id="myModal{{ $response->id }}" class="modal hide fade" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel3" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel3">Contract </h3>
            </div>
            <div class="modal-body">
                {!! $response->contract_text !!}
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button data-dismiss="modal" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    @endforeach
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

        function UpdateStatus(id, status) {
            url = "{{ url('/statusChange') }}";
            console.log(id);
            console.log(status);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id: id,
                    status: status,
                },
                success: function(response) {
                    console.log(response);
                    window.location.reload();
                },
                catch: function(err) {
                    console.log(err);
                }
            });
        }
    </script>

    <script
        src="https://www.paypal.com/sdk/js?client-id=AW0kCpQPUUj_PZo1xsOKCxbHBnMxi_wLrvR1QCmzVDelF8LEKmeWXuSvre6UQEgRWsI7aJPj6ET2PcVj&vault=true&intent=subscription"
        data-sdk-integration-source="button-factory"></script>
    <script>
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'gold',
                layout: 'horizontal',
                label: 'subscribe'
            },
            createSubscription: function(data, actions) {
                return actions.subscription.create({
                    /* Creates the subscription */
                    plan_id: 'P-5T705313R53331815MMHSICA'
                });
            },
            onApprove: function(data, actions) {
                alert(data.subscriptionID); // You can add optional success message for the subscriber here
            }
        }).render('#paypal-button-container-P-5T705313R53331815MMHSICA'); // Renders the PayPal button
    </script>
@endsection
