@extends('template.master')
@section('content')
    <section id="container" class="container">
        <div class="form-area">
            <div class="form-title">
                <h2>Login</h2>
            </div>
            <form action="" class="login-form " >
                <div class="form-item">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" placeholder="User email">
                </div>
                <div class="form-item">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="User password">
                </div>
                <button class="form-button" type="submit">Login</button>
            </form>
        </div>
    </section>
@endsection
