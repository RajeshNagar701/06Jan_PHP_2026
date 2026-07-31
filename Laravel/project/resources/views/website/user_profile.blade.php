@extends('website.layout.layout')


@section('container')

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="top-text header-text">
            <h6>User Profile</h6>
            <h2>Edit Here</h2>
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
                
				 
			  
				<div class="container">
					<div class="card shadow-sm" style="max-width: 80%; margin: 0 auto;">
						<div class="row g-0">
							<div class="col-md-4 p-3 text-center">
								<img src="{{url('admin/upload/customer/'.$customer->image)}}" class="rounded-circle img-thumbnail" alt="Profile Picture">
								<div class="mt-2">
									<span class="badge bg-success">Online</span>
								</div>
							</div>
							<div class="col-md-8">
								<div class="card-body">
									<h5 class="card-title d-flex justify-content-between align-items-center">
										{{$customer->name}}
										<a href="user_profile/{{$customer->id}}" class="btn btn-sm btn-outline-primary">
												<i class="fas fa-edit"></i> Edit
										</a>
									</h5>
									<p class="card-text text-muted">
										<i class="fas fa-briefcase"></i> 
										Id : {{$customer->id}}
									</p>
									<p class="card-text">
										<small class="text-muted">
											<i class="fas fa-map-marker-alt"></i> 
											Email : {{$customer->email}}
										</small>
									</p>
									<p class="card-text">
										<small class="text-muted">
											<i class="fas fa-map-marker-alt"></i> 
											Mobile : {{$customer->mobile}}
										</small>
									</p>
									<p class="card-text">
										<small class="text-muted">
											<i class="fas fa-map-marker-alt"></i> 
											Gender : {{$customer->gender}}
										</small>
									</p>
									<p class="card-text">
										<small class="text-muted">
											<i class="fas fa-map-marker-alt"></i> 
											Hobby : {{$customer->hobby}}
										</small>
									</p>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection