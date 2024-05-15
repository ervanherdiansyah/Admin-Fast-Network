@extends('Admin.layouts.layout')
@section('title', 'Paket')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css" />
@endsection
@section('content')
    <div class="container-fluid py-4 ">
        <div class="row">
            <div class="col-12 ">
                <div class="card mb-4 ">
                    <div class="card-header pb-0">
                        <h6 class="d-lg-none">Paket</h6>
                        <div class="d-flex align-items-center">
                            <h6 class="d-none d-lg-block">Paket</h6>
                            <div class="d-flex flex-wrap align-items-center ms-auto gap-2">
                                {{-- <a href="{{ url('/dashboard/siswa/export') }}"
                                    class="btn btn-primary btn-sm ms-auto">Export</a> --}}
                                {{-- <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#import">
                                    Import
                                </button> --}}
                                <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Tambah Paket
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
                                            Nama Paket</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Max Quantity</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Price</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Weight</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Description</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Image</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Point</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Kode Paket</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            value</th>
                                        <th class="text-secondary opacity-7"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($package['data'] as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item['paket_nama'] }}</h6>
                                                        {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item['max_quantity'] }}</h6>
                                                        {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item['price'] }}</h6>
                                                        {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item['weight'] }}</h6>
                                                        {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item['description'] }}</h6>
                                                        {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="{{ env('FASTNETWORK_IMAGE_URL') . $item['image'] }}"
                                                    style="display:block; margin:auto; max-width: 50%" alt="paket_image"
                                                    class="w-100 border-radius-lg shadow-sm">
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item['point'] }}</h6>
                                                        {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item['paket_kode'] }}</h6>
                                                        {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item['value'] }}</h6>
                                                        {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                                    </div>
                                                </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Paket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createForm" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama Paket</label>
                                    <input name="paket_nama" class="form-control" type="text"
                                        value="{{ old('paket_name') }}">
                                    @error('paket_nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Max Quantity</label>
                                    <input name="max_quantity" class="form-control" type="number"
                                        value="{{ old('max_quantity') }}">
                                    @error('max_quantity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Price</label>
                                    <input name="price" class="form-control" type="number"
                                        value="{{ old('price') }}">
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Weight</label>
                                    <input name="weight" class="form-control" type="number"
                                        value="{{ old('weight') }}">
                                    @error('weight')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Description</label>
                                    <input name="description" class="form-control" type="text"
                                        value="{{ old('description') }}">
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Image</label>
                                    <input name="image" class="form-control" type="file">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Point</label>
                                    <input name="point" class="form-control" type="number"
                                        value="{{ old('point') }}">
                                    @error('point')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Kode Paket</label>
                                    <input name="paket_kode" class="form-control" type="text"
                                        value="{{ old('paket_kode') }}">
                                    @error('paket_kode')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Value</label>
                                    <input name="value" class="form-control" type="number"
                                        value="{{ old('value') }}">
                                    @error('value')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" onclick="createPackage()" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Create Data-->

    <!-- Modal Import Data-->
    <div class="modal fade" id="import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/dashboard/siswa/import') }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Import Data Siswa</label>
                                <input name="upload" class="form-control" type="file">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Import Data-->

    <!-- Modal Update Data-->
    @foreach ($package['data'] as $item)
        <div class="modal fade" id="update{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Paket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="updateForm{{ $item['id'] }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama Paket</label>
                                        <input name="paket_nama" class="form-control" type="text"
                                            value="{{ $item['paket_nama'] }}">
                                        @error('paket_nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Max Quantity</label>
                                        <input name="max_quantity" class="form-control" type="number"
                                            value="{{ $item['max_quantity'] }}">
                                        @error('max_quantity')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Price</label>
                                        <input name="price" class="form-control" type="number"
                                            value="{{ $item['price'] }}">
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Weight</label>
                                        <input name="weight" class="form-control" type="number"
                                            value="{{ $item['weight'] }}">
                                        @error('weight')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Description</label>
                                        <input name="description" class="form-control" type="text"
                                            value="{{ $item['description'] }}">
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Point</label>
                                        <input name="point" class="form-control" type="number"
                                            value="{{ $item['point'] }}">
                                        @error('point')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Kode Paket</label>
                                        <input name="paket_kode" class="form-control" type="text"
                                            value="{{ $item['paket_kode'] }}">
                                        @error('paket_kode')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Value</label>
                                        <input name="value" class="form-control" type="number"
                                            value="{{ $item['value'] }}">
                                        @error('value')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <img src="{{ env('FASTNETWORK_IMAGE_URL') . $item['image'] }}"
                                            style="display:block; margin:auto; max-width: 100%" alt="paket_image"
                                            class="w-100 border-radius-lg shadow-sm">
                                        <label for="example-text-input" class="form-control-label">Image</label>
                                        <input name="image" class="form-control" type="file">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" onclick="updatePackage({{ $item['id'] }})"
                                    class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- End Modal Update Data-->

    <!-- Modal Delete Data-->
    @foreach ($package['data'] as $item)
        <div class="modal fade" id="delete{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Paket </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            @csrf
                            @method('DELETE')
                            <p>apakah anda yakin ingin menghapus data ini?</p>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" onclick="deletePackage({{ $item['id'] }})"
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
        function createPackage() {
            // Dapatkan data formulir
            event.preventDefault();

            const form = document.getElementById('createForm');
            const formData = new FormData(form);

            // Kirim data ke API menggunakan Axios
            axios.post(`https://backend.fastnetwork.id/api/package/create`, formData)
                .then(response => {
                    // Tanggapan berhasil
                    console.log(response.data);
                    // Tampilkan pesan sukses dengan SweetAlert
                    $('#exampleModal').modal('hide');
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
    <!-- Delete data api menggunakan axios-->
    <script>
        function deletePackage(packageId) {
            // Kirim permintaan DELETE ke API menggunakan Axios
            event.preventDefault();

            axios.delete(`https://backend.fastnetwork.id/api/package/delete/${packageId}`)
                .then(response => {
                    // Tanggapan berhasil
                    console.log(response.data);
                    // Tampilkan pesan sukses dengan SweetAlert
                    $('#delete' + packageId).modal('hide');
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
        function updatePackage(packageId) {
            event.preventDefault();

            // Dapatkan data formulir
            const form = document.getElementById('updateForm' + packageId);
            const formData = new FormData(form);
            console.log(formData);

            //Kirim data ke API menggunakan Axios
            axios.post(`https://backend.fastnetwork.id/api/package/update/${packageId}`, formData)
                .then(response => {
                    // Tanggapan berhasil
                    console.log(response.data);
                    // Lakukan tindakan sesuai kebutuhan, misalnya menampilkan pesan sukses atau me-redirect ke halaman lain
                    $('#update' + packageId).modal('hide');
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
