@extends('Admin.layouts.layout')
@section('title', 'Profile')
@section('content')
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        @if (isset($profile) && $profile->foto != null)
                            <img src="{{ asset('storage/' . $profile->foto) }}"
                                style="display:block; margin:auto; max-width: 100%" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        @else
                            <img src="{{ asset('argon') }}/assets/img/team-1.jpg" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        @endif
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            @if (isset($profile) && $profile->nama_lengkap != null)
                                {{ $profile->nama_lengkap }}
                            @else
                                blabla
                            @endif
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            @if (isset($profile) && $profile->email != null)
                                {{ $profile->nama_lengkap }}
                            @else
                                blabla
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                    <i class="ni ni-app"></i>
                                    <span class="ms-2">App</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                    <i class="ni ni-email-83"></i>
                                    <span class="ms-2">Messages</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span class="ms-2">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Edit Profile</p>
                            @if ($profile != null)
                                <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#update">
                                    Edit Biodata
                                </button>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">User Information</p>
                        <form action="{{ url('/dashboard/profile/create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama Lengkap</label>
                                        <input name="nama_lengkap" class="form-control" type="text"
                                            value="{{ $profile->nama_lengkap ?? '' }} "
                                            @if (isset($profile) && $profile->nama_lengkap) readonly @endif>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Jenis Kelamin</label>
                                        <input name="jenis_kelamin" class="form-control" type="text"
                                            value="{{ $profile->jenis_kelamin ?? '' }}"
                                            @if (isset($profile) && $profile->jenis_kelamin) readonly @endif>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Tempat Lahir</label>
                                        <input name="tempat_lahir" class="form-control" type="text"
                                            value="{{ $profile->tempat_lahir ?? '' }}"
                                            @if (isset($profile) && $profile->tempat_lahir) readonly @endif>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Tanggal Lahir</label>
                                        <input name="tanggal_lahir" class="form-control" type="date"
                                            value="{{ $profile->tanggal_lahir ?? '' }}"
                                            @if (isset($profile) && $profile->tanggal_lahir) readonly @endif>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Contact Information</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Alamat</label>
                                        <input name="alamat" class="form-control" type="text"
                                            value="{{ $profile->alamat ?? '' }}"
                                            @if (isset($profile) && $profile->alamat) readonly @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nomor Whatsapp</label>
                                        <input name="no_wa" class="form-control" type="text"
                                            value="{{ $profile->no_wa ?? '' }}"
                                            @if (isset($profile) && $profile->no_wa) readonly @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">No Orang Tua</label>
                                        <input name="no_alter" class="form-control" type="text"
                                            value="{{ $profile->no_alter ?? '' }}"
                                            @if (isset($profile) && $profile->no_alter) readonly @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input name="email" class="form-control" type="email"
                                            value="{{ $profile->email ?? '' }}"
                                            @if (isset($profile) && $profile->email) readonly @endif>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Foto Profile</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @isset($profile->foto)
                                            <img src="{{ asset('storage/' . $profile->foto) }}"
                                                style="display:block; margin:auto; max-width: 100%">
                                        @endisset
                                        @empty($profile->foto)
                                            <label for="example-text-input" class="form-control-label">Foto Profile</label>
                                            <input name="foto" class="form-control" type="file">
                                        @endempty
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                {{-- <p class="mb-0">Edit Profile</p> --}}
                                @if ($profile == null)
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">
                                        Submit
                                    </button>
                                @endif

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <img src="{{ asset('argon') }}/assets/img/bg-profile.jpg" alt="Image placeholder"
                        class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="javascript:;">
                                    <img src="{{ asset('argon') }}/assets/img/team-2.jpg"
                                        class="rounded-circle img-fluid border border-2 border-white">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                        <div class="d-flex justify-content-between">
                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i
                                    class="ni ni-collection"></i></a>
                            <a href="javascript:;"
                                class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
                            <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i
                                    class="ni ni-email-83"></i></a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-center">
                                    <div class="d-grid text-center">
                                        <span class="text-lg font-weight-bolder">22</span>
                                        <span class="text-sm opacity-8">Friends</span>
                                    </div>
                                    <div class="d-grid text-center mx-4">
                                        <span class="text-lg font-weight-bolder">10</span>
                                        <span class="text-sm opacity-8">Photos</span>
                                    </div>
                                    <div class="d-grid text-center">
                                        <span class="text-lg font-weight-bolder">89</span>
                                        <span class="text-sm opacity-8">Comments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <h5>
                                Mark Davis<span class="font-weight-light">, 35</span>
                            </h5>
                            <div class="h6 font-weight-300">
                                <i class="ni location_pin mr-2"></i>Bucharest, Romania
                            </div>
                            <div class="h6 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>University of Computer Science
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
                                <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                    target="_blank">Creative Tim</a>
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

        @if (isset($profile))
            <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/dashboard/profile/update/' . $profile->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama
                                                Lengkap</label>
                                            <input name="nama_lengkap" class="form-control" type="text"
                                                value="{{ $profile->nama_lengkap }} ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Jenis
                                                Kelamin</label>
                                            <input name="jenis_kelamin" class="form-control" type="text"
                                                value="{{ $profile->jenis_kelamin }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Tempat
                                                Lahir</label>
                                            <input name="tempat_lahir" class="form-control" type="text"
                                                value="{{ $profile->tempat_lahir }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Tanggal
                                                Lahir</label>
                                            <input name="tanggal_lahir" class="form-control" type="date"
                                                value="{{ $profile->tanggal_lahir }}">
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Contact Information</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Alamat</label>
                                            <input name="alamat" class="form-control" type="text"
                                                value="{{ $profile->alamat }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nomor
                                                Whatsapp</label>
                                            <input name="no_wa" class="form-control" type="text"
                                                value="{{ $profile->no_wa }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">No Orang
                                                Tua</label>
                                            <input name="no_alter" class="form-control" type="text"
                                                value="{{ $profile->no_alter }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Email
                                                address</label>
                                            <input name="email" class="form-control" type="email"
                                                value="{{ $profile->email }}">
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Foto Profile</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Foto
                                                Profile</label>
                                            <input name="foto" class="form-control" type="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
