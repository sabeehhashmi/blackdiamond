<html dir="ltr"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, admin pro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, ">
    <meta name="description" content="Admin Pro is powerful and clean admin dashboard template">
    <meta name="robots" content="noindex,nofollow">
    <title>Admin Pro Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ampleadmin/">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="{{url('loginassets/style.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="main-wrapper">
      <!-- -------------------------------------------------------------- -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- -------------------------------------------------------------- -->
      <div class="preloader" style="display: none;">
        <svg class="tea lds-ripple" width="37" height="48" viewBox="0 0 37 48" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z" stroke="#2962FF" stroke-width="2"></path>
          <path d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34" stroke="#2962FF" stroke-width="2"></path>
          <path id="teabag" fill="#2962FF" fill-rule="evenodd" clip-rule="evenodd" d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z"></path>
          <path id="steamL" d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="#2962FF"></path>
          <path id="steamR" d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13" stroke="#2962FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </div>
      <!-- -------------------------------------------------------------- -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- -------------------------------------------------------------- -->
      <!-- -------------------------------------------------------------- -->
      <!-- Login box.scss -->
      <!-- -------------------------------------------------------------- -->
      <div class="row auth-wrapper gx-0">
        
        <div class="
            col-lg-12 col-xl-12
            d-flex
            align-items-center
            justify-content-center
          ">
          <div class="row justify-content-center w-100 mt-4 mt-lg-0">
            <div class="col-lg-6 col-xl-3 col-md-7">
              <div class="card" id="registerform">
                <div class="card-body">
                  <h2>Sign Up Form</h2>
                  <p class="text-muted fs-4">
                    Enter given details for new account
                  </p>
                  <form class="form-horizontal mt-4 pt-4 needs-validation" novalidate="" action="index.html">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control form-input-bg" id="tb-rfname" placeholder="john deo" required="">
                      <label for="tb-rfname">Full Name</label>
                      <div class="invalid-feedback">Full name is required</div>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control form-input-bg" id="tb-remail" placeholder="john@gmail.com" required="">
                      <label for="tb-remail">Email</label>
                      <div class="invalid-feedback">Email is required</div>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="password" class="form-control form-input-bg" id="text-rpassword" placeholder="*****" required="">
                      <label for="text-rpassword">Password</label>
                      <div class="invalid-feedback">Password is required</div>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="password" class="form-control form-input-bg" id="text-rcpassword" placeholder="*****" required="">
                      <label for="text-rcpassword">Confirm Password</label>
                      <div class="invalid-feedback">Password is required</div>
                    </div>
                    <div class="form-check mb-4 pb-2">
                      <input class="form-check-input" type="checkbox" value="" id="r-me" required="">
                      <label class="form-check-label" for="r-me">
                        Remember me
                      </label>
                      <div class="invalid-feedback">
                        You must agree before submitting.
                      </div>
                    </div>
                    <div class="d-flex align-items-stretch button-group">
                      <button type="submit" class="btn btn-info btn-lg px-4">
                        Submit
                      </button>
                      <a href="javascript:void(0)" id="to-login2" class="
                          btn btn-lg btn-light-secondary
                          text-secondary
                          font-weight-medium
                        ">Cancel</a>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card" id="loginform">
                <div class="card-body">
                  <h2>Welcome To Black Diamond</h2>
                 
                  <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="form-floating mb-3">
                      
                      <label for="tb-email">Email</label>
                      <div class="invalid-feedback">Email is required</div>
                       <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-floating mb-3">
                      
                      <label for="text-password">Password</label>
                      <div class="invalid-feedback">Password is required</div>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="d-flex align-items-center mb-3">
                      <div class="form-check">
                       <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="r-me1">
                          Remember me
                        </label>
                        <div class="invalid-feedback">
                          You must agree before submitting.
                        </div>
                      </div>
                      
                    </div>
                    <div class="d-flex align-items-stretch button-group mt-4 pt-2">
                      <button type="submit" class="btn btn-info btn-lg px-4">
                        Sign in
                      </button>
                   
                     
                    </div>
                  </form>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <!-- -------------------------------------------------------------- -->
      <!-- Login box.scss -->
      <!-- -------------------------------------------------------------- -->
    </div>
    <!-- -------------------------------------------------------------- -->
    <!-- All Required js -->
    <!-- -------------------------------------------------------------- -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      $(".preloader").fadeOut();
      // ---------------------------
      // Login and Recover Password
      // ---------------------------
      $("#to-recover").on("click", function () {
        $("#loginform").hide();
        $("#recoverform").fadeIn();
      });

      $("#to-login").on("click", function () {
        $("#loginform").fadeIn();
        $("#recoverform").hide();
      });

      $("#to-register").on("click", function () {
        $("#loginform").hide();
        $("#registerform").fadeIn();
      });

      $("#to-login2").on("click", function () {
        $("#loginform").fadeIn();
        $("#registerform").hide();
      });

      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function () {
        "use strict";

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll(".needs-validation");

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms).forEach(function (form) {
          form.addEventListener(
            "submit",
            function (event) {
              if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
              }

              form.classList.add("was-validated");
            },
            false
          );
        });
      })();
    </script>
  

</body></html>


