@extends('frontend/layouts/default')
@section('content')

<div class="container-fluid">
	<div class="row-fluid">


		<div class="span9" style="margin-left:-30px;">
			<!--Body content-->
			<div class="row-fluid">
				 <div class="well well-small">
                    <div class="span">
                       <h4 class="business-title">{{$companies->title}}</h4>
                    </div>
                    <div class="pull-right">
                        <div class="span">
                            <h5  class="business-title">
								@foreach($companies->comcontacts as $contact)
								@if($contact->phone_type == 'landline')
								<i class="icon-phone-sign"></i>
								{{$contact->phone_value}}
								@endif
								@endforeach		
                            </h5>
                        </div>
                        <div class="span">
                            <i class="icon-globe"></i>
                            <span class="business-title"><a href="http://www.bharathicalltaxi.com" >www.ultimatechennai.com</a></span>
                        </div> 
                    </div>  
                </div>

				<div class="span6">
					@foreach($companies->comcontacts as $contact)
					@if($contact->phone_type == 'landline')
					<strong>Landline: </strong><span class="label label-inverse">{{$contact->phone_value}}</span>
					@elseif($contact->phone_type == 'addlandline')
					, <span class="label label-inverse">{{$contact->phone_value}}</span>
					@endif
					@endforeach		

					@foreach($companies->comcontacts as $contact)
					@if($contact->phone_type == 'mobile')
					<strong>Phone: </strong><span class="label label-inverse">{{$contact->phone_value}}</span>
					@elseif($contact->phone_type == 'addmobile')
					, <span class="label label-inverse">{{$contact->phone_value}}</span>
					@endif
					@endforeach

					@foreach($companies->comcontacts as $contact)
					@if($contact->phone_type == 'fax')
					<strong>Fax: </strong><span class="label label-inverse">{{$contact->phone_value}}</span>
					@elseif($contact->phone_type == 'addfax')
					, <span class="label label-inverse">{{$contact->phone_value}}</span>
					@endif
					@endforeach
				</div>
			</div>
		</div>


		<div class="span3">
			<!--Sidebar content-->
		</div>

	</div>
</div>
<h3>{{$companies->location}}</h3><br />


@stop
