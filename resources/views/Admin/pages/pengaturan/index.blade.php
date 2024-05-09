@extends('Admin.layouts.layout')
@section('title', 'Change Password')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    {{-- <div class="card-header pb-0">
                        <h6>User Account</h6>
                    </div> --}}
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="container-fluid py-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header pb-0">
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0">Change Password</p>
                                                {{-- <button class="btn btn-primary btn-sm ms-auto">Settings</button> --}}
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            {{-- <p class="text-uppercase text-sm">User Information</p> --}}
                                            <form action="{{ Route('changepassword') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="current_password" class="form-control-label">Current
                                                                Password</label>
                                                            <input type="password" name="current_password"
                                                                class="form-control" id="current_password">
                                                            @error('current_password')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password" class="form-control-label">
                                                                Password</label>
                                                            <input type="password" name="password" class="form-control"
                                                                id="password">
                                                            @error('password')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password_confirmation" class="form-control-label">
                                                                Password Confirmation</label>
                                                            <input type="password" name="password_confirmation"
                                                                class="form-control" id="password_confirmation">
                                                            @error('password_confirmation')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        {{-- <p class="mb-0">Edit Profile</p> --}}
                                                        <button type="submit"
                                                            class="btn btn-primary btn-sm ms-auto">Submit</button>
                                                    </div>
                                                </div>
                                                <hr class="horizontal dark">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative
                                    Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
