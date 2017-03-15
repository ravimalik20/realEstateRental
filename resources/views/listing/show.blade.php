@extends('layouts.main')

@section('extra-styles')

	<link rel="stylesheet" type="text/css" href="/css/listing.css" />
    <link rel="stylesheet" type="text/css" href="/css/modal-gallery.css" />

@endsection

@section('content')

<div class="container page-content-container">
   <div>
      
      <div class="listing-container">
         <!-- Location Bar -->
         <div class="location-bar">
            <div class="row">
               <div class="col-md-6">
                  <!-- Full Address -->
                  <i class="fa fa-map-marker text-map-marker"></i>
                  <span>470 Second St, London Ontario, N5V 2B3</span>
               </div>
               <div class="col-md-6 text-right">
                  <div class="info-bar-item" >                     
                     <span>Room</span>                    
                  </div>
                  <div class="info-bar-item">                                       
                     <span>London Campus</span>
                  </div>
                  <div class="info-bar-item">
                     <span class="badge badge-inset badge-green">0.9 km</span>
                  </div>
               </div>
            </div>
         </div>
         <!-- //End Location Bar -->
         <!-- Jumbotron -->   
         <div class="jumbotron">
            <div class="pull-down-info-container">
               <!-- If the listing is not available yet, then show the available date -->
               <div class="pull-down-info" style="display: none;">
                  <span class="fa fa-stack">
                  <i class="fa fa-square fa-stack-2x"></i>
                  <i class="fa fa-calendar fa-stack-1x"></i>
                  </span>
                  <span>Available: </span>
                  <span>08-Feb-2017</span>
               </div>
               <!-- Otherwise, show a message indicating that the listing is available -->
               <div class="pull-down-info">
                  <span class="fa fa-stack">
                  <i class="fa fa-square fa-stack-2x"></i>
                  <i class="fa fa-check fa-stack-1x"></i>
                  </span>
                  <span>Available Now!</span>                
               </div>
            </div>
            <div class="row">
               <!-- Cover Photo -->
               <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="cover-photo-container">
                     <a href="#" class="img-thumbnail">
                     <img class="img-responsive cover-photo" src="/listing/photos/16597_thumb.jpg">                    
                     </a>
                  </div>
                  
               </div>
               <!-- Rent and Capacity Info -->
               <div class="col-md-8 col-sm-8 col-xs-12">
                  <!-- Rent -->
                  <h1>
                     <i class="note fa fa-dollar"></i>
                     <span>350/mo</span>
                     <small>
                     <span style="display: none;">+ utilities</span>
                     <span>(utilities included)</span>
                     </small>
                  </h1>
                  <div class="row">
                     <div class="col-md-6">
                        <ul class="list-unstyled list-details">
                           <li>
                              <i class="fa fa-bed fa-fw"></i>
                              <span>4 Bedroom</span>
                           </li>
                           <li>
                              <i class="fa fa-male fa-fw"></i>
                              <span>3 Bathroom</span>
                           </li>
                           <li>
                              <i class="fa fa-users fa-fw"></i>
                              <span>4 Tenant(s) Max</span>
                           </li>
                           <li>
                              <i class="fa fa-car fa-fw"></i>
                              <span>1 Parking Spot(s)</span>
                           </li>
                        </ul>
                     </div>
                     <div class="col-md-6 text-muted">
                        <span>Lease is required.</span>
                        <span>Initial payment due: First &amp; Last Month's Rent.</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- /Jumbotron -->    
         <!-- Thumbnail Gallery Carousel -->   
         <div class="photo-gallery-container">
            <!-- Carousel -->
            <div id="ListingPhotoCarousel" class="carousel slide" data-interval="false">
               <!-- Slide Wrapper -->
               <div class="carousel-inner">
                  <div class="item active">
                     <div class="row">
                        <div class="col-md-2 col-sm-6 col-xs-12">                                                        
                           <a href="javascript:;" class="thumbnail" data-bind="popover: { content: img.description, trigger: 'hover', placement: 'top', maxWidth: '250px' },
                              click: raiseThumbnailClick">
                           <img class="img-responsive" src="/listing/photos/16597_thumb.jpg" alt="" data-bind="src: img.thumbnailUrl" style="height: 100px">
                           </a>                                                                                  
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">                                                        
                           <a href="javascript:;" class="thumbnail" data-bind="popover: { content: img.description, trigger: 'hover', placement: 'top', maxWidth: '250px' },
                              click: raiseThumbnailClick">
                           <img class="img-responsive" src="/listing/photos/16598_thumb.jpg" alt="" data-bind="src: img.thumbnailUrl" style="height: 100px">
                           </a>                                                                                  
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">                                                        
                           <a href="javascript:;" class="thumbnail" data-bind="popover: { content: img.description, trigger: 'hover', placement: 'top', maxWidth: '250px' },
                              click: raiseThumbnailClick">
                           <img class="img-responsive" src="/listing/photos/16599_thumb.jpg" alt="" data-bind="src: img.thumbnailUrl" style="height: 100px">
                           </a>                                                                                  
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">                                                        
                           <a href="javascript:;" class="thumbnail" data-bind="popover: { content: img.description, trigger: 'hover', placement: 'top', maxWidth: '250px' },
                              click: raiseThumbnailClick">
                           <img class="img-responsive" src="/listing/photos/16600_thumb.jpg" alt="" data-bind="src: img.thumbnailUrl" style="height: 100px">
                           </a>                                                                                  
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">                                                        
                           <a href="javascript:;" class="thumbnail" data-bind="popover: { content: img.description, trigger: 'hover', placement: 'top', maxWidth: '250px' },
                              click: raiseThumbnailClick">
                           <img class="img-responsive" src="/listing/photos/16601_thumb.jpg" alt="" data-bind="src: img.thumbnailUrl" style="height: 100px">
                           </a>                                                                                  
                        </div>
                     </div>
                  </div>
               </div>
               <!-- //End Slide Wrapper -->
               <!-- Controls -->
               <a class="left carousel-control" href="#ListingPhotoCarousel" data-slide="prev" data-bind="visible: photos.pageCount() > 1" style="display: none;">
               <i class="fa fa-chevron-left fa-2x"></i>
               </a>
               <a class="right carousel-control" href="#ListingPhotoCarousel" data-slide="next" data-bind="visible: photos.pageCount() > 1" style="display: none;">
               <i class="fa fa-chevron-right fa-2x"></i>
               </a>
               <!-- Indicators -->
               <ol class="carousel-indicators" data-bind="foreach: photos.allPages, visible: photos.pageCount() > 1" style="display: none;">
                  <li data-target="#ListingPhotoCarousel" data-bind="attr: { 'data-slide-to': $index() },
                     css: { 'active': $index() + 1 === $parent.photos.currentPage() }" data-slide-to="0" class="active"></li>
               </ol>
            </div>
            <!-- //End Carousel -->
            <!-- No Photos Message -->
            <div class="text-center text-muted" data-bind="visible: photos().length === 0" style="display: none;">           
               <i class="fa fa-image"></i>
               <span>No photos available.</span>
            </div>
         </div>
         <!-- //End Thumbnail Gallery Carousel -->              
         <!-- Listing Details -->
         <div class="listing-details-container">
            <div class="row">
               <!-- Left Column -->
               <div class="col-md-7">
                  <ul class="list-group">
                     <!-- Description -->
                     <li class="list-group-item">
                        <h4 class="list-group-item-heading">
                           <span class="fa-stack">
                           <i class="fa fa-square fa-stack-2x"></i>
                           <i class="fa fa-comment fa-inverse fa-stack-1x"></i>
                           </span>
                           <span>Description</span>
                        </h4>
                        <p data-bind="text: description">Clean well kept townhouse, 1km from Fanshawe College.
                           4 bedrooms; 3 bathrooms; keyed entry on individual bedrooms;  partially furnished. 
                           Appliances included: fridge, stove, microwave, dishwasher, washer and dryer.
                           Rent from $350 to $450 per room - price varies depending on room size. Internet available at $15 per month.
                           Contact Bill Ralph at 416-917-7782 /  wralph1942@gmail.com.  Or...
                           Marilyn Bates at 519-455-7577
                        </p>
                     </li>
                     <!-- //End Description -->
                     <!-- Amenities & Restrictions -->
                     <li class="list-group-item">
                        <h4 class="list-group-item-heading">
                           <span class="fa-stack">
                           <i class="fa fa-square fa-stack-2x"></i>
                           <i class="fa fa-check fa-inverse fa-stack-1x"></i>
                           </span>
                           <span>Amenities &amp; Restrictions</span>
                        </h4>
                        <!-- Amenities Panel -->
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <i class="fa fa-plus-circle text-success"></i>
                              <span>&nbsp;Amenities</span>
                           </div>
                           <div class="panel-body">
                              <ul class="list-inline" data-bind="foreach: amenities">
                                 <li class="pull-left" style="width: 50%;">
                                    <i class="fa fa-check text-success"></i>
                                    <span data-bind="text: name">Dishwasher</span>
                                 </li>
                                 <li class="pull-left" style="width: 50%;">
                                    <i class="fa fa-check text-success"></i>
                                    <span data-bind="text: name">Parking</span>
                                 </li>
                                 <li class="pull-left" style="width: 50%;">
                                    <i class="fa fa-check text-success"></i>
                                    <span data-bind="text: name">Partially furnished</span>
                                 </li>
                                 <li class="pull-left" style="width: 50%;">
                                    <i class="fa fa-check text-success"></i>
                                    <span data-bind="text: name">Microwave</span>
                                 </li>
                                 <li class="pull-left" style="width: 50%;">
                                    <i class="fa fa-check text-success"></i>
                                    <span data-bind="text: name">Laundry</span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <!-- /Amenities Panel -->
                        <!-- Restrictions Panel -->
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <i class="fa fa-ban text-danger"></i>
                              <span>&nbsp;Restrictions</span>
                           </div>
                           <div class="panel-body">
                              <ul class="list-inline" data-bind="foreach: restrictions">
                                 <li class="pull-left" style="width: 50%;">
                                    <i class="fa fa-times text-muted"></i>
                                    <span data-bind="text: name">No pets</span>
                                 </li>
                                 <li class="pull-left" style="width: 50%;">
                                    <i class="fa fa-times text-muted"></i>
                                    <span data-bind="text: name">No smoking</span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <!-- /Restrictions Panel -->                       
                     </li>
                     <!-- //End Amenities & Restrictions -->
                     <!-- Website URL -->
                     <li class="list-group-item">
                        <h4 class="list-group-item-heading">
                           <span class="fa-stack">
                           <i class="fa fa-square fa-stack-2x"></i>
                           <i class="fa fa-link fa-inverse fa-stack-1x"></i>
                           </span>
                           <span>Website URL</span>
                        </h4>
                        <a href="http://ranss7.com/bills%20page.html" target="_blank" data-bind="attr: { href: websiteUrl.fullUrl() }, text: websiteUrl.fullUrl()">http://ranss7.com/bills%20page.html</a>
                     </li>
                     <!-- /ko -->
                     <!-- //End Website URL -->
                  </ul>
               </div>
               <!-- //End Left Column -->
               <!-- Right Column -->
               <div class="col-md-5">
                  <ul class="list-group">
                     <!-- Map -->
                     <li class="list-group-item">
                        <h4 class="list-group-item-heading">
                           <span class="fa-stack">
                           <i class="fa fa-square fa-stack-2x"></i>
                           <i class="fa fa-map-marker fa-inverse fa-stack-1x"></i>
                           </span>
                           <span>Map</span>
                        </h4>
                        <p>
                           <img class="img-thumbnail img-responsive" alt="" src="//maps.googleapis.com/maps/api/staticmap?markers=470 Second St London Ontario Canada N5V 2B3&amp;size=500x300&amp;key=AIzaSyAVfwDlFYNa5W-_QZYz5NpsKWtpEbwGk6I" data-bind="src: location.staticMapUrl()">
                        </p>
                     </li>
                     <!-- //End Map -->
                     <!-- Contact Info -->
                     <li class="list-group-item">
                        <h4 class="list-group-item-heading">
                           <span class="fa-stack">
                           <i class="fa fa-square fa-stack-2x"></i>
                           <i class="fa fa-phone fa-inverse fa-stack-1x"></i>
                           </span>
                           <span>Landlord Contact</span>
                        </h4>
                        <!-- Full Name -->
                        <p>
                           <strong>Name:</strong>
                           <span data-bind="text: landlord.fullName">William Ralph</span>
                        </p>
                        <!-- Phone Numbers -->
                        <table class="table">
                           <thead>
                              <tr>
                                 <th>Phone Number</th>
                                 <th>Call After</th>
                                 <th>Call Before</th>
                              </tr>
                           </thead>
                           <tbody data-bind="foreach: landlord.contactInformation"></tbody>
                        </table>
                        <!-- ko if: $parent.showEmailLandlordFields -->
                        <div class="form-group clearfix" data-bind="visible: !$parent.isEmailSent()">
                           <div class="input-group has-feedback">
                              <span class="input-group-addon">
                              <i class="fa fa-envelope"></i>
                              </span>
                              <div class="validation-tooltip-container"><input type="text" class="form-control" placeholder="Enter your email address" data-bind="value: $parent.viewerEmailAddress"><span class="glyphicon glyphicon-exclamation-sign form-control-feedback" style="display: none;" data-original-title="" title=""></span></div>
                           </div>
                           <br>
                           <div class="validation-tooltip-container has-feedback">
                              <textarea class="form-control" rows="5" maxlength="500" placeholder="Enter your message"></textarea>
                           </div>
                           <br>
                           <div id="landlordMailRecaptcha" class="pull-right buffer-bottom" data-bind="sendMailRecaptcha: $parent.validCaptchaResponse, apiKeyFetcher: $parent.getReCaptchaApiKey">
                              <div style="width: 304px; height: 78px;">
                                 <div><iframe src="https://www.google.com/recaptcha/api2/anchor?k=6LfzjCYTAAAAAOYgGD2iMFTsXWpHT7UHkj-l5NPj&amp;co=aHR0cHM6Ly9vZmZjYW1wdXNob3VzaW5nLmZhbnNoYXdlYy5jYTo0NDM.&amp;hl=en&amp;v=r20170307150823&amp;theme=light&amp;size=normal&amp;cb=s6lvsd8zz3e5" title="recaptcha widget" width="304" height="78" frameborder="0" scrolling="no" name="undefined"></iframe></div>
                                 <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea>
                              </div>
                           </div>
                           <br>
                           <button type="button" class="btn btn-primary pull-right" data-bind="click: $parent.sendLandlordEmail, enable: $parent.isEmailLandlordActionEnabled" disabled="">
                           <i class="fa fa-envelope fw-fw"></i>
                           <span>Email Landlord</span>
                           </button>
                        </div>
                        <!-- /.form-group -->
                        <div class="alert alert-success" data-bind="fadeVisible: $parent.isEmailSent(), fadeOut: false" style="display: none;">
                           <p>
                              <i class="fa fa-check-circle"></i>&nbsp;Your email has been sent:
                           </p>
                           <div class="well" style="color: #444; margin-top: 1em;">
                              <i class="fa fa-quote-left text-muted"></i>
                              <span data-bind="text: $parent.viewerEmailMessage"></span>
                              <i class="fa fa-quote-right text-muted"></i>
                           </div>
                           <p class="text-right">
                              <a href="javascript:;" data-bind="click: $parent.sendNewLandlordEmail">Send another message</a>
                           </p>
                        </div>
                        
                     </li>
                     <!-- //End Contact Info -->
                  </ul>
               </div>
               <!-- //End Right Column -->
            </div>
         </div>
         <!-- //End Listing Details -->
      </div>
   </div>
</div>

@endsection
