@extends('frontend/layouts/default')
@section('content')

    <!--Main Body Container-->

<div class="maincontaingerAlign container">
    <div class="row">
        <div class="span9" >
            <!--Body content-->
            <div class="row">
                <div class="well well-small" data-spy="affix" data-offset-top="20">
                    <div class="span" style="margin-left:0px">
                         <h4 class="business-title">{{$companies->title}}</h4>
                    </div>
                         <div class="span"><i class="icon-check-sign icon-2x" style="line-height:8px"></i></div>
                    <div class="pull-right">
                        <div class="span">
                             <h5 class="business-title">

                             	@foreach($companies->comcontacts as $contact)

    								@if($contact->phone_type == 'landline')
    									<i class="icon-phone-sign"></i>
    									{{$contact->phone_value}}
    								@endif

								@endforeach			

							</h5>
                        </div>
                        @if($companies->website)
                        <div class="span">
                            <i class="icon-globe"></i>
                            <span class="business-title"><a href="http://{{$companies->website}}" >{{$companies->website}}</a></span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span5">
                    <p class="itemdetails">         
                        @foreach($companies->comcontacts as $contact)

                            @if($contact->phone_type == 'landline')
                            <i class="icon-phone-sign"></i><strong> Landline : </strong>{{$contact->phone_value}}
                            @elseif($contact->phone_type == 'addlandline')
                            , {{$contact->phone_value}}
                            @endif

                        @endforeach

                        </p>
                    <p class="itemdetails"    
                    @foreach($companies->comcontacts as $contact)
                        @if($contact->phone_type == 'mobile')
                        ><i class="icon-mobile-phone"></i><strong> Mobile : </strong>{{$contact->phone_value}}
                        @elseif($contact->phone_type == 'addmobile')
                        , {{$contact->phone_value}}
                        @endif
                    @endforeach
                    </p>

                    <p class="itemdetails"><i class="icon-flag"></i><strong> Address : </strong>{{$companies->address}}, {{$companies->location}}, {{$companies->city}} - {{$companies->zipcode}}</p>

                    @if($companies->landmark)
                    <p class="itemdetails"><i class="icon-flag"></i><strong> Landmark : </strong>{{$companies->landmark}}</p>
                    @endif
                    <p class="itemdetails"><i class="icon-map-marker"></i><strong> Area : </strong>{{$companies->location}}</p>
                    @if($companies->website)
                    <p class="itemdetails"><i class="icon-globe"></i><strong> Website : </strong><a href="http://{{$companies->website}}">{{$companies->website}}</a></p>
                    @endif
                    <p class="itemdetails">
                    @foreach($companies->comcontacts as $contact)
                        @if($contact->phone_type == 'fax')
                        <i class="icon-print"></i><strong> Fax : </strong>{{$contact->phone_value}}
                        @elseif($contact->phone_type == 'addfax')
                        , {{$contact->phone_value}}
                        @endif
                    @endforeach
                    </p>
                </div>
                <div class="span4">   
                    <div class="row">
                        
                        <div class="span3">
                            <img alt="" src="http://placehold.it/120x90" class="img-rounded">                   
                        </div>
                        <div class="span1">                        
                                <i class="icon-heart icon-2x"></i>

                        </div>
                    </div>
                    <div class="row">     
                        <br />            
                        <p class="itemdetails"><i class="icon-truck"></i><strong> Nearest Bus Stop : </strong>{{$companies->nearest_bus}}</p>
                        <p class="itemdetails"><i class="icon-road"></i><strong> Other Transport : </strong>{{$companies->other_trans}}</p>
                       <p class="itemdetails"><i class="icon-time"></i><strong> Weekly Holiday : </strong>{{$companies->weekly_holiday}}</p>                
                    </div>
                </div>
                <!-- <div class="row row-margin">
                    <div class="span2">
                        <button class="btn btn-info" type="button">Own This</button>
                    </div>
                    <div class="span2">
                        <button class="btn btn-info" type="button">Edit This</button>
                    </div>
                    <div class="span2">
                        <button class="btn btn-info" type="button">Report This</button>
                    </div>
                </div> -->
                <p class="label label-inverse">When you call, don't forget to mention that you found the details on <span class="label label-info">Chipap.com</span></p>
            </div>
            <hr class="hr_separator" />
            <div id="span9">
                <h5>Key Features</h5>
                <ul id="amenities">
                    <li><i class="icon-chevron-sign-right"></i> Parking</li>
                    <li><i class="icon-chevron-sign-right"></i> First-Aid</li>
                    <li><i class="icon-chevron-sign-right"></i> Kids Area</li>
                    <li><i class="icon-chevron-sign-right"></i> Air-Conditioned</li>
                    <li><i class="icon-chevron-sign-right"></i> Dry-Cleaning</li>
                    <li><i class="icon-chevron-sign-right"></i> Home-Delivery</li>
                    <li><i class="icon-chevron-sign-right"></i> Happy Hours</li>
                    <li><i class="icon-chevron-sign-right"></i> Roof-Top</li>
                    <li><i class="icon-chevron-sign-right"></i> Library</li>
                    <li><i class="icon-chevron-sign-right"></i> Non-Vegetarian</li>
                    <li><i class="icon-chevron-sign-right"></i> Bar</li>
                    <li><i class="icon-chevron-sign-right"></i> Swimming Pool</li>
                    <li><i class="icon-chevron-sign-right"></i> Online Booking</li>
                    <li><i class="icon-chevron-sign-right"></i> Wi-Fi</li>
                </ul>
            </div>
            <hr class="hr_separator" />
            <div id="span9">
                <div class="tabbable"> <!-- Only required for left/right tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">Section 1</a></li>
                        <li><a href="#tab2" data-toggle="tab">Section 2</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                          <p>I'm in Section 1.</p>
                    </div>
                    <div class="tab-pane" id="tab2">
                          <p>Howdy, I'm in Section 2.</p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="span3">
            <!--Sidebar content-->
            <div class="well well-small">
                <h4 class="business-title">Sponsored</h4> 
            </div>
            <div class="row">                 
                        <img alt="" align="right" src="http://placehold.it/220x600" class="img-rounded">                   
            </div>
        </div>
    </div>
</div>

@stop
