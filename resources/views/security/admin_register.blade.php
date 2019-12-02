@extends('security.template')

@section('form')

    <section class="admin-register-form">
        <form class="form-login" action="{{ url('/admin-register') }}" method="POST" autocomplete="off">
            {{ csrf_field() }}
            <h2 class="form-login-heading">Create Admin</h2>
            @if ( !empty($response) && is_array($response))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($response['errors'] as $error)
                            <li> <b>* {{ $error }}</b> </li>
                        @endforeach
                    </ul>
                </div>
            @elseif (!empty($response) && (is_array($response) == ''))
                <div class="alert alert-success">
                    <b>{{ $response }} <a href="{{ url('/login') }}">Login</a> </b>
                </div>
            @endif


            <div class="login-wrap">
                <div class="form-group">
                    <label for="identity"><b>Select Role</b></label>
                    <select name="identity" class="form-control" id="identity">
                        @foreach($data as $roles)
                            <option value="{{ $roles->id }}">{{ $roles->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label><b>Login Id</b></label>
                    <input type="text" class="form-control" name="login_id" placeholder="Login ID">
                </div>
                <div class="form-group">
                    <label><b>Login Pass</b></label>
                    <input type="password" class="form-control" name="password" placeholder="Login PASS">
                </div>
                <div class="form-group">
                    <label><b>Fullname</b></label>
                    <input type="text" class="form-control" name="fullname" placeholder="Fullname">
                </div>
                <div class="form-group">
                    <label><b>Email</b></label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <button class="btn btn-theme btn-block"  type="submit">CREATE ADMIN <i class="fa fa-lock"></i></button>
                </div>
            </div>
        </form>
    </section>

@endsection