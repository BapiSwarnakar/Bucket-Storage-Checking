@extends('Layout.Login.layout')
@section('title','Super Admin')
@section('content')
  <section class="row flexbox-container">
  <div class="col-12 d-flex align-items-center justify-content-center">
    <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
      <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
        <div class="card-header border-0">
          <div class="card-title text-center">
            <img src="{{url('app-assets/images/logo/logo-dark.png')}}" alt="branding logo">
          </div>
          <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Super Login</span></h6>
        </div>
        <div class="card-content">
          <div class="text-center">
            <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook"><span
                class="la la-facebook"></span></a>
            <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter"><span
                class="la la-twitter"></span></a>
            <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-linkedin"><span
                class="la la-linkedin font-medium-4"></span></a>
            <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-github"><span
                class="la la-github font-medium-4"></span></a>
          </div>
          <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>OR Using Account
              Details</span></p>
          <div class="card-body">
            <form class="form-horizontal" method="POST" id="Value_Store_Form">
              @csrf
              <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control" name="username" id="username" placeholder="Your Username" required value="">
                <div class="form-control-position">
                  <i class="la la-user"></i>
                </div>
              </fieldset>
              <fieldset class="form-group position-relative has-icon-left">
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
                <div class="form-control-position">
                  <i class="la la-key"></i>
                </div>
              </fieldset>
              <div class="form-group row">
                <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                  <fieldset>
                    <input type="checkbox" id="remember-me" class="chk-remember">
                    <label for="remember-me"> Remember Me</label>
                  </fieldset>
                </div>
                {{-- <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a href="recover-password.html"
                    class="card-link">Forgot Password?</a></div> --}}
              </div>
              <input type="hidden" id="url" value="{{url('Super/Login_Request')}}">
              <button type="submit" id="submit" name="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
            </form>
          </div>
         
        </div>
      </div>
    </div>
  </div>
  </section>

@endsection()
@section('script')
@endsection()

    <!-- END: Content-->
