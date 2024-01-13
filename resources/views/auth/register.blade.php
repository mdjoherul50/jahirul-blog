@extends('template.master')
@section('content')
    <section id="container" class="justify-content-center">
        <div class="form-area ">
            <div class="form-title">
                <h2>Registration</h2>
            </div>
            <form action="" class="register-form">
                <div class="form-item">
                    <label for="full_name">Name:</label>
                    <input type="text" name="full_name" id="full_name" placeholder="Full name">
                </div>
                <div class="form-item">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" placeholder="Email address">
                </div>
                <div class="form-item">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>
                <div class="form-item">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="confirm Password">
                </div>
                <button class="form-button" type="submit">Register</button>
            </form>
        </div>
    </section>
@endsection
