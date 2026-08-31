@extends('website.layout.layout')


@section('container')

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="top-text header-text">
            <h6>Manage Profile</h6>
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
                <form id="contact" action="{{ url('/update-customer/'.$edit_user->id) }}" enctype="multipart/form-data" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-lg-12">
                      <fieldset>
                        <input type="name" name="name" value="{{$edit_user->name}}" id="name" placeholder="Name" autocomplete="on" required>
                      </fieldset>
                    </div>

                    <div class="col-lg-12">
                      <fieldset>
                        <input type="text" name="email" value="{{$edit_user->email}}"  id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email"
                          required="">
                      </fieldset>
                    </div>
					
					<div class="col-lg-12">
                      <fieldset>
                        <input type="number" name="mobile" value="{{$edit_user->mobile}}"  id="name" placeholder="Mobile" autocomplete="on" required>
                      </fieldset>
                    </div>
					<div class="col-lg-12">
                      <fieldset>
						<?php
							$gender=$edit_user->gender;
						?>	
						
                        Gender: <br>
						Male : <input type="radio" name="gender" value="Male" <?php if($gender=="Male") echo "checked" ;?>>
						Famale : <input type="radio" name="gender" value="Famale" <?php if($gender=="Famale") echo "checked" ;?>>
                      </fieldset>
                    </div>
					<div class="col-lg-12">
                      <fieldset>
						<?php
							$hobby=$edit_user->hobby;
							$arr_hobby=explode(",",$hobby);
						?>
                        Hobby: 
						Singing : <input type="checkbox" name="hobby[]" value="Singing" <?php if(in_array("Singing",$arr_hobby)){ echo "checked"; }?>>
						Dancing : <input type="checkbox" name="hobby[]" value="Dancing" <?php if(in_array("Dancing",$arr_hobby)){ echo "checked"; }?>>
						Sports : <input type="checkbox" name="hobby[]" value="Sports" <?php if(in_array("Sports",$arr_hobby)){ echo "checked"; }?>>
                      </fieldset>
                    </div>
					
					<div class="col-lg-12">
                      <fieldset>
                        <input type="file" name="image" placeholder="Image" autocomplete="on">
						<img src="{{url('admin/upload/customer/'.$edit_user->image)}}" style="width:100px">
					  </fieldset> 
                    </div>
                    
					<br><br>
					
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-button " value="Signup">Save Profile</button>
						<a class="float-end" href="/user_profile">Back Profile</a>
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