<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{asset("images/logo.png")}}">
	<title>OpenDigital - Profile Page</title>
	<link rel="stylesheet" href="profile.scss">
	
    @viteReactRefresh
    @vite(["resources/js/app.js", "resources/sass/app.scss", "resources/sass/register.scss"])
	
</head>

@include('inc.navbar')



<body>
  
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="images/profile_pictures/default.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>

            <div class="card-body pt-0 pt-md-4">
            
              <div class="text-center">
                <h3>
                  {{ Auth::user()->username }}
                </h3>
                <!-- <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Manchester, United Kingdom
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Computer Science Student
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University of Manchester
                </div> -->
                <hr class="my-4">
                <p>{{ Auth::user()->profile_description }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My Account</h3>
                </div>

              </div>
            </div>


			<!-- card -->

            <div class="card-body"> 
              <form method="POST">
                @csrf
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control form-control-alternative" value="{{ Auth::user()->username }}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Email address</label>
                        <input type="email" id="email" name="email" class="form-control form-control-alternative" value="{{ Auth::user()->email }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <!-- <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="random">
                      </div>
                    </div> -->
                    <!-- <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="123">
                      </div>
                    </div> -->
                  </div>
                </div>
                <hr class="my-4">


                <!-- Address -->
                <!-- <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Oxford Road, Manchester" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="Manchester">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United Kingdon">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4"> -->
                <!-- Description -->


                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>About Me</label>
                    <textarea id="profile_description" name="profile_description" rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">{{ Auth::user()->profile_description }}</textarea>
                  </div>
                </div>
                <div>
                  <button class="btn btn-sm btn-primary" type="submit">Update Profile</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</body>





