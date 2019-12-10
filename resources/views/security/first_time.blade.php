@extends('security.template')

@section('form')

    <section class="login-form">
        <form class="form-login" action="{{ url('/change-password') }}" method="post" autocomplete="off">
            {{ csrf_field() }}
            <h2 class="form-login-heading">Change Password</h2>

            @if ( !empty($response) && is_array($response))
                <div class="alert alert-danger" align="center">
                    <ul>
                        @foreach ($response['errors'] as $error)
                            <li> <b>{{ $error }}</b> </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ( !empty($success) && is_array($success))
                <div class="alert alert-success" align="center">
                    <ul>
                        @foreach ($success['messages'] as $message)
                            <li> <b>{{ $message }}</b> </li>
                        @endforeach
                    </ul>
                    <p><a href="{{ url('login') }}">Login</a></p>
                </div>
                <style>
                    .login-wrap { display: none; }
                </style>
            @endif

            <div class="login-wrap">
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" name="current_password" id="current_password" required>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" name="new_password" id="new_password" required>
                </div>
                <div class="form-group">
                    <label for="new_password_again">New Password Again</label>
                    <input type="password" class="form-control" name="new_password_again" id="new_password_again" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-theme btn-block" name="login_alien" type="submit">Change Password <i class="fa fa-lock"></i></button>
                </div>
                <hr>
                <h3 class="text-center">i-Med</h3>
            </div>
        </form>
    </section>

@endsection