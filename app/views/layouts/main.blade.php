<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 	
    <title>Authentication App With Laravel 4</title>
   	{{ HTML::style('css/main.css')}}
 
  	<!-- Latest compiled and minified CSS -->
	{{ HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css') }}

<!-- Optional theme -->
{{ HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css') }}

{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }} 


    

  </head>
 
  <body>
  		<!-- Navigation start -->
 		
 <!-- Fixed navbar -->
    <!--<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<ul class="nav navbar-nav navbar-left">  
						@if(!Auth::check())
							<li>{{ HTML::link('users/register', 'Register') }}</li>   
							<li>{{ HTML::link('users/login', 'Login') }}</li>   
						@else
							<li class="active"><a href='#'><?php echo ucwords(Auth::user()->first_name); ?></a></li>	
							<li>{{ HTML::link('users/logout', 'logout') }}</li>
						@endif
			</ul>  
		</div>
	</div>-->
	       	<div class="navbar main-bar navbar-default">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/ " target="_new"> Tech Aramada
				<div class="visible-sm"><img class="ajax-loader ajax-loader-sm" src="http://localhost/samlara/public/packages/mrjuliuss/syntara/assets/img/ajax-load.gif" style="float: right;"/>
				</div> </a>
			</div>

			<div class="navbar-collapse collapse navbar-responsive-collapse">
				<ul class="nav navbar-nav">
					<li class="">
						<!--<a href="http://localhost/samlara/public/dashboard"><i class="glyphicon glyphicon-home"></i> <span>Dashboard</span></a>-->
						@if(!Auth::check())
							<li class=""><a href="{{ URL::to('users/register') }}"><i class="glyphicon glyphicon-registration-mark"></i> <span>Register</span></a></li>
							<li class=""><a href="{{ URL::to('users/login') }}"><i class="glyphicon glyphicon-log-in"></i> <span>Login</span></a></li>
							
						@else
							<li class=""><a href="{{ URL::to('users/profile') }}"><i class="glyphicon glyphicon-user"></i> <span><?php echo ucwords(Auth::user()->first_name); ?></span></a></li>
							<li class=""><a href="{{ URL::to('users/logout') }}"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>
						@endif
					</li>
				</ul>

			</div>
		</div>

<!-- Navigation ends -->
<!--content view starts -->
	 <div class="jumbotron">		
	 
				@if(Session::has('message') && Session::has('success') && Session::get('success') == '1')
					
					<div id="message" class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						{{ Session::get('message') }}
					</div>
				@elseif(Session::get('success') == '0')
					<div id="message" class="alert alert-warning">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						{{ Session::get('message') }}
					</div>	
				@endif
			<div class="container">
				
				{{ $content }}
			</div>
	    </div>
	  <!-- Latest compiled and minified JavaScript -->
	  {{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }} 
	  {{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}
	  <script>
	  $(function(){
		$('#message').delay(4000).fadeTo(1000,0.01).slideUp(500);
	  });	
	  </script>	
	   
  </body>
   		
    	

</html>