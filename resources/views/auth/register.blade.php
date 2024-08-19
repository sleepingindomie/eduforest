<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('assets/') }}" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Register - EduForest</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>
<body>
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="{{ url('/') }}" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <img src="{{ asset('img/uin.png') }}" alt="Logo UIN" style="width: 50px; height: auto; display: block; margin: 0 auto;">
                  </span>                                                              
                  <span class="app-brand-text demo text-body fw-bolder">EduForest</span>
                </a>
              </div>
              <!-- /Logo -->

              <h4 class="mb-2">Get Started with EduForest</h4>
              <p class="mb-4">Join us in evaluating the OBE curriculum at UIN Malang's Informatics Program</p>

              <!-- Validation Errors -->
              <x-validation-errors class="mb-4" />

              <!-- Register Form -->
              <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('register') }}">
                  @csrf

                  <div class="mb-3">
                      <x-label for="name" value="{{ __('Name') }}" />
                      <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                  </div>

                  <div class="mb-3">
                      <x-label for="email" value="{{ __('Email') }}" />
                      <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                  </div>

                  <div class="mb-3 form-password-toggle">
                      <x-label for="password" value="{{ __('Password') }}" />
                      <div class="input-group input-group-merge">
                          <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                          <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                      </div>
                  </div>

                  <div class="mb-3">
                      <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                      <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                  </div>

                  @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                      <div class="mb-3 form-check">
                          <x-checkbox id="terms" name="terms" />
                          <label class="form-check-label" for="terms">
                              {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                  'terms_of_service' => '<a href="'.route('terms.show').'" target="_blank">'.__('Terms of Service').'</a>',
                                  'privacy_policy' => '<a href="'.route('policy.show').'" target="_blank">'.__('Privacy Policy').'</a>',
                              ]) !!}
                          </label>
                      </div>
                  @endif

                  <div class="mb-3">
                      <button class="btn btn-primary d-grid w-100">{{ __('Register') }}</button>
                  </div>
              </form>

              <p class="text-center">
                  <span>{{ __('Already have an account?') }}</span>
                  <a href="{{ route('login') }}">
                      <span>{{ __('Sign in instead') }}</span>
                  </a>
              </p>
            </div>
          </div>
          <!-- /Register Card -->
        </div>
      </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
