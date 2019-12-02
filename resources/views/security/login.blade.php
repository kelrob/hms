@extends('security.template')

@section('form')

    <section class="login-form">
        <form class="form-login" action="{{ url('/login') }}" method="post" autocomplete="off">
            {{ csrf_field() }}
            <h2 class="form-login-heading">sign in now</h2>
            @if ( !empty($response) && is_array($response))
                <div class="alert alert-danger" align="center">
                    <ul>
                        @foreach ($response['errors'] as $error)
                            <li> <b>{{ $error }}</b> </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="login-wrap">
                <div class="form-group">
                    <input type="text" class="form-control" name="login_id" placeholder="Login ID">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Login Pass">
                </div>
                <div class="form-group">
                    <button class="btn btn-theme btn-block" name="login_alien" type="submit">SIGN IN <i class="fa fa-lock"></i></button>
                </div>
                <hr>
                <h3 class="text-center">i-Med</h3>
            </div>
        </form>
    </section>

@endsection