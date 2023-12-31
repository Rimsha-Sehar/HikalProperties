
@extends('backend.index')
@section('content')
@php
   use Carbon\Carbon;
@endphp
<div class="mainSection-title">
    <div class="row">
        <div class="col-12">
            <div
              class="d-flex justify-content-between align-items-center flex-wrap gr-15"
            >
                <div class="d-flex flex-column">
                    <h4>{{ get_phrase('Subscription Report') }}</h4>
                    <ul class="d-flex align-items-center eBreadcrumb-2">
                        <li><a href="#">{{ get_phrase('Home') }}</a></li>
                        <li><a href="#">{{ get_phrase('Subscriptions') }}</a></li>
                        <li><a href="#">{{ get_phrase('Subscription Report') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
			<div class="search-filter-area d-flex justify-content-md-between justify-content-center align-items-center flex-wrap gr-15 pb-4">
				<form method="GET" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('admin.subscription.report', ['date_form' => $date_from, 'date_to' => $date_to]) }}">
              	@csrf
              	<div class="d-flex justify-content-start align-items-center row">
	                <div class="col-xl-8">
						<input type="text" class="form-control eForm-control test" name="eDateRange" value="{{  $date_from->format('m/d/Y').' - '. $date_to->format('m/d/Y') }}" />
	                </div>
	                <div class="col-xl-2">
	                	<button type="submit" class="eBtn eBtn btn-secondary form-control">{{ get_phrase('Filter') }}</button>
	                </div>
                </div>
              </form>
              <!-- Export Button -->
              @if(count($subscriptions) > 0)
              <div class="position-relative">
                <button
                  class="eBtn-3 dropdown-toggle"
                  type="button"
                  id="defaultDropdown"
                  data-bs-toggle="dropdown"
                  data-bs-auto-close="true"
                  aria-expanded="false"
                >
                  <span class="pr-10">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="12.31"
                      height="10.77"
                      viewBox="0 0 10.771 12.31"
                    >
                      <path
                        id="arrow-right-from-bracket-solid"
                        d="M3.847,1.539H2.308a.769.769,0,0,0-.769.769V8.463a.769.769,0,0,0,.769.769H3.847a.769.769,0,0,1,0,1.539H2.308A2.308,2.308,0,0,1,0,8.463V2.308A2.308,2.308,0,0,1,2.308,0H3.847a.769.769,0,1,1,0,1.539Zm8.237,4.39L9.007,9.007A.769.769,0,0,1,7.919,7.919L9.685,6.155H4.616a.769.769,0,0,1,0-1.539H9.685L7.92,2.852A.769.769,0,0,1,9.008,1.764l3.078,3.078A.77.77,0,0,1,12.084,5.929Z"
                        transform="translate(0 12.31) rotate(-90)"
                        fill="#00a3ff"
                      />
                    </svg>
                  </span>
                  {{ get_phrase('Export') }}
                </button>
                <ul
                  class="dropdown-menu dropdown-menu-end eDropdown-menu-2"
                >
	                <li>
	                 	<a class="dropdown-item" id="pdf" href="{{ route('admin.subscriptionReportPdf') }}">{{ get_phrase('PDF') }}</a>
	                </li>
	                <li>
	                	<a class="dropdown-item" id="print" href="javascript:;" onclick="report_print('subscription_report')">{{ get_phrase('Print') }}</a>
	                </li>
                </ul>
              </div>
              @endif
            </div>
        	@if(count($subscriptions) > 0)
        	<div class="table-responsive" id="subscription_report">
				<table class="table eTable">
					<thead>
	                    <th>#</th>
	                    <th>{{ get_phrase('Package Name') }}</th>
	                    <th>{{ get_phrase('price') }}</th>
	                    <th>{{ get_phrase('User') }}</th>
	                    <th>{{ get_phrase('Payment Method') }}</th>
	                    <th>{{ get_phrase('Purchase Date') }}</th>
	                    <th>{{ get_phrase('Expire Date') }}</th>
	                </thead>
	                <tbody>
	                	@foreach($subscriptions as $subscription)

	                		<tr>
	                			<td>{{ $loop->index + 1 }}</td>
                        <td><strong>{{ $subscription->subscription_to_package->name }}</strong></td>
                        <td>{{ $subscription->paid_amount }}</td>
	                			<td><strong>{{ $subscription->subscription_to_user->name }}</strong></td>
	                			<td>{{ $subscription->payment_method }}</td>
	                			<td>{{  $subscription->created_at->format('Y-m-d') }}</td>
                        <td>{{  \Carbon\Carbon::parse($subscription->expire_date)->format('Y-m-d') }}</td>
	                		</tr>
	                	@endforeach
	                </tbody>
				</table>
			</div>
			@else
			 @include('backend.admin.no_data_found')
			@endif
		</div>
	</div>
</div>

<script type="text/javascript">

  	"use strict";

	function report_print(printableAreaDivId) {
		var printContents = document.getElementById(printableAreaDivId).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

</script>


@endsection
