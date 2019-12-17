@extends('security.template')

@section('form')

    <section class="login-form">
        <form class="form-login" action="{{ url('/authenticate') }}" method="post" autocomplete="off">
            {{ csrf_field() }}
            <h2 class="form-login-heading">Authentication</h2>

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
                    <label for="question"><b>Question</b></label>
                    <select name="question" class="form-control" id="question">
                        <option value="{{ $questionId }}">{{ $securityQuestion }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="answer"><b>Answer</b></label>
                    <input type="text" name="answer" class="form-control" id="answer">
                </div>
                <div class="form-group">
                    <button class="btn btn-theme btn-block" type="submit">Submit <i class="fa fa-lock"></i></button>
                </div>
                <hr>
                <h3 class="text-center">i-Med</h3>
            </div>
        </form>
    </section>

@endsection