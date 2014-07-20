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
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<ul class="nav navbar-nav navbar-left">  
						@if(!Auth::check())
							<li>{{ HTML::link('users/register', 'Register') }}</li>   
							<li>{{ HTML::link('users/login', 'Login') }}</li>   
						@else
							<li class="active"><a href='#'><?php echo ucwords(Auth::user()->firstname); ?></a></li>	
							<li>{{ HTML::link('users/logout', 'logout') }}</li>
						@endif
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