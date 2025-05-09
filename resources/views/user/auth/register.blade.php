@extends('user.index')
@section('content')
<div class="sign-up-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="user-all-form">
                    <div class="contact-form">
                        <div class="section-title text-center">
                            <span class="sp-color">Sign Up</span>
                            <h2>Register to book your service!</h2>
                        </div>
                        @include('includes.validation-errors')
<form method="POST" action="{{ route('user.register') }}">
    @csrf
    <div class="row">
        <div class="col-lg-12 ">
            <div class="form-group">
                <input type="text" name="name" class="form-control"  placeholder="Username">
            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group">
                <input type="email" name="email" class="form-control"  placeholder="Email">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <input class="form-control" type="password" name="password"  placeholder="Password">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <input class="form-control" type="password" name="password_confirmation"  placeholder="Confirm Password">
            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group">
                <input type="text" name="phone" class="form-control"  placeholder="Phone">
            </div>
        </div>

        <div class="col-lg-12 col-md-12 text-center">
            <button type="submit" class="default-btn btn-bg-three border-radius-5">
                Sign Up
            </button>
        </div>

        <div class="col-12">
            <p class="account-desc">
                Already have an account? 
                <a href="{{ route('user.login.show') }}">Sign In</a>
            </p>
        </div>
    </div>
</form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection