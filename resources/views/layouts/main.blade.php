<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<title>
		Housing project
	</title>

    <!-- Ensures the page displays properly for the device being used -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    <!--link rel="shortcut icon" type="image/x-icon" href="/favicon.ico?v=2" /-->

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/css/main.css" />
	<link rel="stylesheet" type="text/css" href="/css/button.css" />
	<link rel="stylesheet" type="text/css" href="/css/tooltip.css" />
	<link rel="stylesheet" type="text/css" href="/css/form-control-feedback.css" />
	<link rel="stylesheet" type="text/css" href="/css/tile.css" />
	<link rel="stylesheet" type="text/css" href="/css/grid-view.css" />
	<link rel="stylesheet" type="text/css" href="/css/modal-dialog.css" />
	<link rel="stylesheet" type="text/css" href="/css/text-responsive.css" />
	<link rel="stylesheet" type="text/css" href="/css/margin-responsive.css" />

    <!-- Google Fonts -->    
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet" type="text/css" />
	<link href="//fonts.googleapis.com/css?family=Bitter:400,700" rel="stylesheet" type="text/css" />
	<link href="//fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css" />     

    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="Bootstrap/Twitter/js/response.min.js"></script>
    <![endif]-->

    

    <link rel="stylesheet" type="text/css" href="/css/spotlight.css" />
    <link rel="stylesheet" type="text/css" href="/css/pricing-plan.css" />

    <link rel="stylesheet" type="text/css" href="/css/listing-repeater.css" />
    <link rel="stylesheet" type="text/css" href="/css/listing-summary-view.css" />
    <link rel="stylesheet" type="text/css" href="/css/listing-list-view.css" />
    <link rel="stylesheet" type="text/css" href="/css/listing-grid-view.css" />
    <link rel="stylesheet" type="text/css" href="/css/pager.css" />

	@yield('extra=styles')

	<!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>

<body>

    <div id="wrapper">

		<nav class="navbar header-navbar">                            

            <a href="/" target="_blank">
                <img src="/images/logo.png" class="fanshawe-brand" />
            </a>                 

            <div class="container">

                <ul class="nav login-status">

                    

                </ul>                

            </div>                        
        </nav>

        <!-- Navigation -->
        <nav id="Navbar" class="navbar navbar-inverse main-navbar" role="navigation">                                                                                                                                                                                                                

            <a id="NavbarHousingLogo" href="/">
                <img src="/images/navbar-logo.png" class="pull-left" style="height: 80px; margin-top: -30px; margin-left: 10px;" />
            </a>    
                        
            <img src="/images/cityscape.png" class="cityscape hidden-xs" />

            <div id="NavbarContainer" class="container">                                                                

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-links">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>                           
                </div>

                <!-- Top Menu Items -->
                <div class="collapse navbar-collapse" id="navbar-links">                                                            

                    <ul class="nav navbar-right navbar-nav nav-main">

                        <li>
                            <a href="#">Search Listings</a>
                        </li>

                        
                        <li class="dropdown">                            
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Landlords
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
							@if (\Auth::user())
								<li>
									<a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
								</li>
							@else
                                <li><a href="/login">Sign in</a></li>
                                <li><a href="/register">Create an account</a></li>
							@endif
                            </ul>
                        </li>
                        <li>
                            <a href="/login">Admin&nbsp;<i class="fa fa-cogs text-muted"></i></a>
                        </li>
                                               
                        
                    </ul>                                      

                </div>                    

            </div>                                    

        </nav>
        <!-- //End Navigation -->                      

        <div id="page-wrapper">

			@yield('content')

        </div>

    </div>         
    
    <footer id="footer">

        <div id="footer-nav">

            <div class="container">

                <div class="row">
                    
                    <div class="col-xs-12 col-sm-4">
                        <h4>Landlords</h4>
                        <ul class="nav">
						@if (\Auth::user())
							<li>
								<a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
							</li>
						@else
                            <li><a href="/login">Sign in</a></li>
                            <li><a href="/register">Create an account</a></li>
						@endif
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <h4>Contact Us</h4>
                        <p class="small">
                            <b>Housing Project</b><br />
                            Room F1002<br />
                            <a href="mailto: abc@xyz.com">abc@xyz.com</a><br />
                            123-456-7890
                        </p>
                    </div>
                </div>

            </div>

        </div>

        <div id="footer-disclaimer">

            <div class="container">

                <p class="small">
                    <b>Disclaimer (to landlords):</b>
                    <br />
                    This website is the property of Fanshawe College. The listing service exists for the sole benefit of the students of Fanshawe College who may be 
                    searching for rental premises. Fanshawe College therefore reserves the right to list any property, or to delete listings of properties, on whatever 
                    grounds it deems appropriate. Such grounds may include, but are not limited to Fanshawe College having reason to conclude that listing such 
                    property has been or may be detrimental or harmful to the College or its students.
                </p>             

                <p class="small">
                    <b>Disclaimer (to students):</b>
                    <br />
                    The listings on this website have not been inspected by Fanshawe College nor have any steps been taken to confirm the accuracy of the 
                    information provided. Listings provided on this site are solely for the use by Fanshawe students/staff/faculty and the fact that they 
                    appear on this website, should not be considered as a recommendation or endorsement by Fanshawe College. Fanshawe assumes no responsibility 
                    in respect to the condition of any premise listed or any other matter related to the leasing of the listing. Furthermore, Fanshawe College 
                    disclaims responsibility for any harm resulting from accessing or downloading information on this website. 
                    It is the responsibility of the student/staff/faculty to contact the landlord directly and Fanshawe highly recommends an on-site inspection 
                    of the property. I.e. DO NOT rent a place sight unseen.  Tenants are encouraged to investigate all aspects of the property including fire safety, 
                    roommate agreements, lease requirements, City rental license requirements, insurance, etc.
                </p>

            </div>

        </div>

        <div id="footer-copyright">

            <div class="container">
                <b class="small">&copy; Housing project 2017</b></p>                
            </div>         

        </div>

    </footer>        
    
    <!-- Error Modal -->     
    <div id="global-error-modal" class="modal modal-danger">        
        <div class="modal-dialog modal-lg">
            <div class="modal-content"> 
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <i class="fa fa-times-circle"></i>&nbsp;Error
                </div>               
                <div class="modal-body"> 
                    <p class="lead">An error occurred while processing your request.</p>                                                          
                    <p>Please retry your last action. If the problem persists, please contact a system administrator.</p>  
                    <div class="debug-info"></div>                                        
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                    
                </div>               
            </div>
        </div>
    </div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	@yield('extra-scripts')

</body>

</html>
