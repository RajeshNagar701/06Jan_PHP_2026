@extends('website.layout.layout')


@section('container')

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="top-text header-text">
            <h6>Keep in touch with us</h6>
            <h2>Feel free to send us a message about your business needs</h2>
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
              <div class="col-lg-6">
                <div id="map">
                  <iframe
                    src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    width="100%" height="650px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
              </div>
              <div class="col-lg-6 align-self-center">
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

			  
                <form id="contact" action="{{ url('/submit-contact') }}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-lg-12">
                      <fieldset>
                        <input type="name" name="name" value="{{old('name')}}" id="name" placeholder="Name" autocomplete="on">
                      </fieldset>
                    </div>

                    <div class="col-lg-12">
                      <fieldset>
                        <input type="text" name="email" id="email" value="{{old('email')}}"  placeholder="Your Email">
                      </fieldset>
                    </div>

                    <div class="col-lg-12">
                      <fieldset>
                        <textarea name="coment" type="text" value="{{old('coment')}}" class="form-control" id="message" placeholder="Message"></textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <input type="submit" id="form-submit" class="main-button " value="Message" />
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