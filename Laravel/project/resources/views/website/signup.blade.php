@extends('website.layout.layout')


@section('container')

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="top-text header-text">
            <h6>Keep in touch with us</h6>
            <h2>Singup Here</h2>
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
                
				
				<form id="contact" action="{{ url('/submit-customer') }}" enctype="multipart/form-data" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-lg-12">
                      <fieldset>
                        <input type="name" name="name" value="{{old('name')}}" id="name" placeholder="Name" autocomplete="on">
						@error('name')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					  </fieldset>
                    </div>

                    <div class="col-lg-12">
                      <fieldset>
                        <input type="text" name="email" value="{{old('email')}}" id="email" placeholder="Your Email">
						@error('email')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror
                      </fieldset>
                    </div>
					<div class="col-lg-12">
                      <fieldset>
                        <input type="password" name="password" id="name" placeholder="Password" autocomplete="on">
                      </fieldset>
                    </div>
					<div class="col-lg-12">
                      <fieldset>
                        <input type="number" name="mobile" id="name" placeholder="Mobile" autocomplete="on">
                      </fieldset>
                    </div>
					<div class="col-lg-12">
                      <fieldset>
                        Gender: 
						Male : <input type="radio" name="gender" value="Male">
						Famale : <input type="radio" name="gender" value="Famale">
                      </fieldset>
                    </div>
					<div class="col-lg-12">
                      <fieldset>
                        Hobby: 
						Singing : <input type="checkbox" name="hobby[]" value="Singing">
						Dancing : <input type="checkbox" name="hobby[]" value="Dancing">
						Sports : <input type="checkbox" name="hobby[]" value="Sports">
                      </fieldset>
                    </div>
					
					<div class="col-lg-12">
                      <fieldset>
                        <input type="file" name="image" placeholder="Image" autocomplete="on">
                      </fieldset>
                    </div>
                    
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-button " value="Signup">Signup</button>
                      
						<a class="float-end" href="/login">Login Here</a>
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