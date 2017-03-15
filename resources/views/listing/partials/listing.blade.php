@foreach([1, 2, 3, 4, 5 , 6 ,7, 8] as $i)
<div class="panel panel-default listing-summary-item listing-grid-item posted" data-bind="css: statusIndicator">
    <!-- Cover Photo -->
    <div class="panel-heading">
       <div class="ribbon ribbon-left red" data-bind="visible: $parent.repeater.showMyListingRibbon($data)" style="display: none;">
          <a>My Listing</a>
       </div>
       <!-- ko template: { name: 'listing-cover-photo-template' } -->
       <a href="/listing/ViewListing.aspx?id=913" class="cover-photo-container" data-bind="href: '/listing/ViewListing.aspx?id=' + listingId">
          <!-- ko if: coverPhoto() -->
          <div class="cover-photo" data-bind="style: { 'background-image': 'url(' + coverPhoto().thumbnailUrl() + ')' }" style="background-image: url(&quot;/listing/photos/16868_thumb.jpg&quot;);"></div>
          <!-- /ko -->
          <!-- ko if: !coverPhoto() --><!-- /ko -->
       </a>
       <!-- /ko -->
    </div>
    <!-- Details -->
    <div class="panel-body">
       <ul class="list-group">
          <!-- Price -->
          <li class="list-group-item price-row">
             <div class="row">
                <!-- Rent -->
                <div class="col-xs-6">
                   <h1 class="price">
                      <i class="note fa fa-dollar"></i>
                      <span data-bind="text: parseInt(rent()) + '/mo'">425/mo</span>
                      <i class="fa fa-plus-circle text-muted" title="" data-bind="visible: !areUtilitiesIncluded(), tooltip: {}" style="display: none;" data-original-title="Utilities are not included"></i>
                   </h1>
                </div>
                <div class="col-xs-6 text-right detail-item">
                   <!-- Number of Bedrooms -->
                   <span class="value" data-bind="text: numberOfBedrooms()">5</span>
                   <i class="fa fa-bed" data-bind="tooltip: {}" title="" data-original-title="Number of bedrooms"></i>
                   <span>&nbsp;&nbsp;</span>
                   <!-- Number of Bathrooms -->
                   <span class="value" data-bind="text: numberOfBathrooms()">2</span>
                   <i class="fa fa-male" data-bind="tooltip: {}" title="" data-original-title="Number of bathrooms"></i>
                </div>
             </div>
             <!-- /.row -->
          </li>
          <!-- Address and Distance -->
          <li class="list-group-item address-row clearfix">
             <!-- Address -->
             <div class="pull-left">                    
                <span data-bind="text: location.address()">1695 Hansuld St</span>
                <br>                    
                <span data-bind="text: location.city() + ' ' + location.province() + ', ' + location.postalCode()">London Ontario, N5V 1Y6</span>
             </div>
             <!-- Distance from Campus -->
             <div class="pull-right">
                <span class="text-muted" data-bind="text: distanceFromCampusRounded() + ' km'">0.9 km</span>
             </div>
          </li>
          <!-- Accommodation Type and Campus -->
          <li class="list-group-item clearfix">
             <!-- Accommodation Type -->
             <div class="pull-left">
                <strong data-bind="text: accommodationType().name">House</strong>
             </div>
             <!-- Campus -->
             <div class="pull-right">
                <strong data-bind="text: campus().name() + ' Campus '">London Campus </strong>
             </div>
             <br>
             <br>
             <div class="row">
                <div class="col-xs-3 detail-item">
                   <span class="value" data-bind="text: maximumNumberOfTenants()">5</span>
                   <i class="fa fa-users" data-bind="tooltip: {}" title="" data-original-title="Max number of tenants"></i>
                </div>
                <div class="col-xs-3 detail-item">
                   <span class="value" data-bind="text: numberOfParkingSpots()">5</span>
                   <i class="fa fa-car" data-bind="tooltip: {}" title="" data-original-title="Number of parking spots"></i>
                </div>
                <div class="col-xs-6 text-right">
                   <b>Listing ID: </b><span data-bind="text: listingId">913</span>
                </div>
             </div>
          </li>
       </ul>
    </div>
    <!-- /.panel-body -->
    <div class="panel-footer clearfix">
       <!-- ko if: $parent.repeater.showStatus() --><!-- /ko -->
       <div class="btn-group-separated pull-right">
          <!-- ko if: $parent.repeater.showEditControls($data) --><!-- /ko -->
          <!-- View Details Button -->
          <a href="/Listing/ViewListing.aspx?id=913" class="btn btn-xs btn-primary" data-bind="href: '/Listing/ViewListing.aspx?id=' + listingId">
          <span>View Details</span>
          <i class="fa fa-arrow-circle-right"></i>
          </a>
       </div>
       <!-- /.button-group-separated -->
    </div>
    <!-- /.panel-footer -->
 </div>
@endforeach
