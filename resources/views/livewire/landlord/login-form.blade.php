<div>
    <div class="bg-gradient-primary py-32pt">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <img src="{{ asset('themes/tutorio/assets/images/illustration/achievement/128/white.svg') }}" class="mr-md-32pt mb-32pt mb-md-0" alt="student">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-0">{{ env('APP_NAME') }}</h1>
                <p class="lead measure-lead text-white-50">Administración de cuentas</p>
            </div>
            {{-- <a href="signup.html" class="btn btn-outline-white flex-column">
                Don't have an account?
                <span class="btn__secondary-text">Sign up Today!</span>
            </a> --}}
        </div>
    </div>
    <div class=" pt-32pt pt-sm-64pt pb-32pt">
        <div class="container page__container">
            <form action="student-dashboard.html" class="col-md-5 p-0 mx-auto">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input id="email" type="text" class="form-control" placeholder="Your email address ...">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input id="password" type="password" class="form-control" placeholder="Your first and last name ...">
                    {{-- <p class="text-right"><a href="reset-password.html" class="small">Forgot your password?</a></p> --}}
                </div>
                <div class="text-center">
                    <button class="btn btn-lg btn-accent">Login</button>
                </div>
            </form>
        </div>
    </div>

</div>


</div>
