@extends('auth.template')
@section('content')
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
            <div class="col mx-auto">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="p-4">
                            <div class="mb-3 text-center">
                                <img src="assets/images/logo-icon.png" width="60" alt="" />
                            </div>
                            <div class="text-center mb-4">
                                <h5 class="">Register</h5>
                            </div>
                            <div class="form-body">
                                <form method="POST" action="/auth/register" class="row g-3">
                                    @csrf
                                    <div class="col-12">
                                        <label for="inputUsername" class="form-label">Username</label>
                                        <input type="text" name="name" class="form-control" id="inputUsername" placeholder="Jhon">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputEmailAddress" class="form-label">Email Address</label>
                                        <input type="email" name="email" class="form-control" id="inputEmailAddress"
                                            placeholder="example@user.com">
                                    </div>
                                    <div class="col-12">
                                        <label for="wa_number" class="form-label">Wa Number</label>
                                        <input type="text" name="wa_number" class="form-control" id="wa_number">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputChoosePassword" class="form-label">Password</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" name="password" class="form-control border-end-0"
                                                id="inputChoosePassword" placeholder="Enter Password"> <a
                                                href="javascript:;" class="input-group-text bg-transparent"><i
                                                    class='bx bx-hide'></i></a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Sign up</button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-center ">
                                            <p class="mb-0">Already have an account? <a
                                                    href="/auth/login">Sign in here</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
