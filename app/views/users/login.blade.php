{{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
	<h2 class="form-signin-heading">Please Login</h2>
	@foreach($errors->all() as $error)
           
			<div class="alert alert-warning">
				 {{ $error }}
			</div>
     @endforeach
	{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
	{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
		<label class="checkbox">
          <input type="checkbox" name='remember_me' value="remember_me"> Remember me
        </label>
	{{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}