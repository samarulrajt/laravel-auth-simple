{{ Form::open(array('url'=>'users/create', 'class'=>'form-signup')) }}
    <h2 class="form-signup-heading">Please Register</h2>
 
    <!--<ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>-->
	@foreach($errors->all() as $error)
           
			<div class="alert alert-danger">
				 {{ $error }}
			</div>
     @endforeach
 
    {{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'First Name')) }}
    {{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Last Name')) }}
    {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
    {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}
	 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    {{ Form::submit('Register', array('class'=>'btn btn-lg btn-primary btn-block'))}}
{{ Form::close() }}


