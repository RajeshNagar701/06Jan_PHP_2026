@extends('website.layout.layout')


@section('container')

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="top-text header-text">
            <h6>Keep in touch with us</h6>
            <h2>Login Here</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-content">
            <div class="row">
              
			 
              <div class="col-lg-12 align-self-center">
                
				 @if(session('message'))
				  <div class="alert alert-danger">
					  <strong>Failed!</strong> {{ session('message')}}
				  </div>
				 @endif
			  
				<form id="contact" action="{{ url('/submit-auth') }}" enctype="multipart/form-data" method="post">
                  @csrf
                  <div class="row">
                   
                    <div class="col-lg-12">
                      <fieldset>
                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email"
                          required="">
                      </fieldset>
                    </div>
					<div class="col-lg-12">
                      <fieldset>
                        <input type="password" name="password" id="name" placeholder="Password" autocomplete="on" required>
                      </fieldset>
                    </div>
					
                    
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-button " value="Login">Login</button>
						<a class="float-end" href="/signup">Signup Here</a>
					  </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection