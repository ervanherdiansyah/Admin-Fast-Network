@extends('Admin.layouts.layout')
@section('title', 'Gambar Informasi Banner')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css" />
@endsection
@section('content')
    <div class="container-fluid py-4 ">
        <div class="row">
            <div class="col-12 ">
                <div class="card mb-4 ">
                    <div class="card-header pb-0">
                        <h6 class="d-lg-none">Gambar Informasi Banner</h6>
                        <div class="d-flex align-items-center">
                            <h6 class="d-none d-lg-block">Gambar Informasi Banner</h6>
                            <div class="d-flex flex-wrap align-items-center ms-auto gap-2">
                                {{-- <a href="{{ url('/dashboard/siswa/export') }}"
                                    class="btn btn-primary btn-sm ms-auto">Export</a> --}}
                                {{-- <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#import">
                                    Import
                                </button> --}}
                                <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Tambah Gambar Informasi Banner
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="myTable" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Nama Gambar</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Image</th>
                                        <th class="text-secondary opacity-7"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banner['data'] as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                            {{ $item['nama_gambar'] }}</h6>
                                                        {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="{{ env('FASTNETWORK_IMAGE_URL') . $item['file_path'] }}"
                                                    style="display:block; margin:auto; max-width: 20%" alt="paket_image"
                                                    class="w-100 border-radius-lg shadow-sm">
                                            </td>
                                            <td class="align-middle">
                                                <a type="button" class="" data-bs-toggle="modal"
                                                    data-bs-target="#update{{ $item['id'] }}">
                                                    <i class="fas fa-edit text-success text-sm opacity-10"></i>
                                                </a>
                                                <a type="button" class="" data-bs-toggle="modal"
                                                    data-bs-target="#delete{{ $item['id'] }}">
                                                    <i class="fas fa-trash fa-xs text-danger text-sm opacity-10"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

    <!-- Modal Create Data-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Gambar Informasi Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createForm" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama Gambar</label>
                                    <input name="nama_gambar" class="form-control" type="text"
                                        value="{{ old('nama_gambar') }}">
                                    @error('nama_gambar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Image</label>
                                    <input name="file_path" class="form-control" type="file"
                                        value="{{ old('file_path') }}">
                                    @error('file_path')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" onclick="createProduct()" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Create Data-->

    <!-- Modal Update Data-->
    @foreach ($banner['data'] as $item)
        <div class="modal fade" id="update{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Gambar Informasi Banner</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulir untuk memperbarui produk -->
                        <form id="updateForm{{ $item['id'] }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_gambar" class="form-control-label">Nama Gambar</label>
                                        <input id="nama_gambar" name="nama_gambar" class="form-control" type="text"
                                            value="{{ $item['nama_gambar'] }}">
                                        <div class="invalid-feedback" id="productNameError"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="file_path" class="form-control-label">Image</label>
                                        <input id="file_path" name="file_path" class="form-control" type="file">
                                        <img src="{{ env('FASTNETWORK_IMAGE_URL') . $item['file_path'] }}"
                                            style="display:block; margin:auto; max-width: 100%" alt="file_path"
                                            class="w-100 border-radius-lg shadow-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary"
                                    onclick="updateProduct({{ $item['id'] }})">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- End Modal Update Data-->

    <!-- Modal Delete Data-->
    @foreach ($banner['data'] as $item)
        <div class="modal fade" id="delete{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Gambar Informasi Banner </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            @csrf
                            @method('DELETE')
                            <p>apakah anda yakin ingin menghapus data ini?</p>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" onclick="deleteProduct({{ $item['id'] }})"
                                    class="btn btn-primary">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- End Modal Delete Data-->

    <!-- Create data api menggunakan axios-->
    <script>
        function createProduct() {
            // Dapatkan data formulir
            event.preventDefault();

            const form = document.getElementById('createForm');

            const formData = new FormData(form);

            const baseURL = "{{ env('FASTNETWORK_BASE_URL_API') }}";
            // Kirim data ke API menggunakan Axios
            axios.post(`${baseURL}gambar-informasi-banner/create`, formData)
                .then(response => {
                    // Tanggapan berhasil
                    console.log(response.data);
                    // Tampilkan pesan sukses dengan SweetAlert
                    $('#exampleModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Produk berhasil ditambahkan!',
                        timer: 5000, // waktu dalam milidetik (misalnya, 3000ms = 3 detik)
                    }).then((result) => {
                        // Jika pengguna menekan tombol "OK", refresh halaman
                        if (result.isConfirmed) {
                            // Tunggu 2 detik sebelum memuat ulang halaman
                            window.location.reload();
                        } else {
                            window.location.reload();

                        }
                    });
                })
                .catch(error => {
                    // Tanggapan gagal
                    console.error(error.response.data);

                    // Tampilkan pesan kesalahan pada formulir
                    if (error.response.data.errors) {
                        const errors = error.response.data.errors;
                        Object.keys(errors).forEach(field => {
                            const errorMessage = errors[field][0];
                            document.getElementById(field + 'Error').innerText = errorMessage;
                        });
                    }
                });
        }
    </script>
    <!-- Delete data api menggunakan axios-->
    <script>
        function deleteProduct(carouselId) {
            // Kirim permintaan DELETE ke API menggunakan Axios
            event.preventDefault();

            const baseURL = "{{ env('FASTNETWORK_BASE_URL_API') }}";

            axios.delete(`${baseURL}gambar-informasi-banner/delete/${carouselId}`)
                .then(response => {
                    // Tanggapan berhasil
                    console.log(response.data);
                    // Tampilkan pesan sukses dengan SweetAlert
                    $('#delete' + carouselId).modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Produk berhasil dihapus!',
                        timer: 5000, // waktu dalam milidetik (misalnya, 3000ms = 3 detik)
                    }).then((result) => {
                        // Jika pengguna menekan tombol "OK", refresh halaman
                        if (result.isConfirmed) {
                            // Tunggu 2 detik sebelum memuat ulang halaman
                            window.location.reload();
                        } else {
                            window.location.reload();

                        }
                    });
                })
                .catch(error => {
                    // Tanggapan gagal
                    console.error(error.response.data);
                    // Tampilkan pesan kesalahan dengan SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan saat menghapus produk.',
                    });
                });

        }
    </script>

    <!-- Update data api menggunakan axios-->
    <script>
        function updateProduct(carouselId) {
            event.preventDefault();

            // Dapatkan data formulir
            const form = document.getElementById('updateForm' + carouselId);
            const formData = new FormData(form);
            // console.log(formData);
            const baseURL = "{{ env('FASTNETWORK_BASE_URL_API') }}";

            //Kirim data ke API menggunakan Axios
            axios.post(`${baseURL}gambar-informasi-banner/update/${carouselId}`, formData)
                .then(response => {
                    // Tanggapan berhasil
                    console.log(response.data);
                    $('#update' + carouselId).modal('hide');
                    // Lakukan tindakan sesuai kebutuhan, misalnya menampilkan pesan sukses atau me-redirect ke halaman lain
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Produk berhasil diperbarui!',
                        timer: 5000, // waktu dalam milidetik (misalnya, 3000ms = 3 detik)
                    }).then((result) => {
                        // Jika pengguna menekan tombol "OK", refresh halaman
                        if (result.isConfirmed) {
                            // Tunggu 2 detik sebelum memuat ulang halaman
                            window.location.reload();
                        } else {
                            window.location.reload();

                        }
                    });
                })
                .catch(error => {
                    // Tanggapan gagal
                    console.error(error.response.data);

                    // Tampilkan pesan kesalahan pada formulir
                    if (error.response.data.errors) {
                        const errors = error.response.data.errors;
                        Object.keys(errors).forEach(field => {
                            const errorMessage = errors[field][0];
                            document.getElementById(field + 'Error').innerText = errorMessage;
                        });
                    }
                });
        }
    </script>
@endsection
@push('script')
    <!-- Tautkan file JavaScript jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTablee');
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endpush
