<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('argon') }}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('argon') }}/assets/img/favicon.png">
    <title>
        @yield('title')
    </title>
    @yield('chartjs')
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('argon') }}/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('argon') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('argon') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('argon') }}/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <!-- Tautkan file CSS DataTables -->
    @yield('css')

</head>

<body class="g-sidenav-show bg-gray-100">
    @if (Request::is('dashboard/profile*'))
        <div class="position-absolute w-100 min-height-300 top-0"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
            <span class="mask bg-primary opacity-6"></span>
        </div>
    @else
        <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @endif
    @include('Admin.component.sidebar.sidebar')
    @if (Request::is('dashboard/profile*'))
        <div class="main-content position-relative max-height-vh-100 h-100">
            {{-- @include('dashboard.component.navbar.navbar') --}}

            @yield('content')
            @include('sweetalert::alert')

        </div>
    @else
        <main class="main-content position-relative border-radius-lg ">
            <!-- Navbar -->
            @include('Admin.component.navbar.navbar')
            <!-- End Navbar -->
            <!-- Content -->
            @yield('content')
            <!-- User ID -->
            <div id="user-id" data-user-id="{{ Auth::user()->id }}"></div>

            <!-- End Content -->
            @include('sweetalert::alert')
        </main>
    @endif


    @include('Admin.component.plugins.plugin')
    <!--   Core JS Files   -->
    <script src="{{ asset('argon') }}/assets/js/core/popper.min.js"></script>
    <script src="{{ asset('argon') }}/assets/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('argon') }}/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('argon') }}/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="{{ asset('argon') }}/assets/js/plugins/chartjs.min.js"></script>
    @stack('chart')
    @stack('chartjs')
    @stack('chartLine')
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('argon') }}/assets/js/argon-dashboard.min.js?v=2.0.4"></script>

    @stack('script')
    <!-- Tambahkan link ke Websocket -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.3.2/socket.io.js"></script>
    <!-- Tambahkan link ke Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Tambahkan link ke SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const socket = io("http://localhost:8080");
        console.log(socket);
        const user_id = document.getElementById('user-id').getAttribute('data-user-id');

        // Memasang event handler untuk menerima notifikasi dari server WebSocket
        // Mengambil ID pengguna dari atribut data di tag HTML
        // Event listener for connection
        getIsReadNotifikasi(user_id);

        socket.on('connect', () => {
            console.log('Connected to server');

            // Emit event notifikasiCreated untuk mengambil data notifikasi dari server
            socket.emit("notifikasiCreated", user_id);

            socket.on("notifikasi", function(notifikasi) {
                // Parse notifikasi dari JSON
                // notifikasi = JSON.parse(notifikasi);
                console.log("Notifikasi baru diterima:", notifikasi.data);
                notifikasi.data.forEach(function(notif) {
                    // Buat elemen untuk menampilkan notifikasi baru
                    const newItem = document.createElement('li');
                    newItem.classList.add('mb-2');
                    newItem.innerHTML = `
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">${notif.content}</span>
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-check "></i>
                                            ${notif.is_read ? '<span>Sudah Dibaca</span>' : '<span>Belum Dibaca</span>'}
                                        </p>
                                    </div>
                                </div>
                            </a>
                            
                        `;
                    // Tambahkan elemen baru ke dalam dropdown menu
                    const dropdownMenu = document.getElementById(
                        'dropdown-notifikasi');
                    dropdownMenu.prepend(newItem);
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const dropdownNotifikasi = document.getElementById('dropdownMenuButton');

            dropdownNotifikasi.addEventListener('hidden.bs.dropdown', function() {
                const dropdownMenu = document.getElementById('dropdown-notifikasi');
                // Bersihkan daftar notifikasi sebelum menambahkan yang baru
                dropdownMenu.innerHTML = '';
                updateNotifikasiStatus();
                getIsReadNotifikasi(user_id)

            });
        });

        // Fungsi untuk memperbarui status notifikasi
        function updateNotifikasiStatus() {
            // Kirim permintaan ke server untuk memperbarui status notifikasi
            axios.put(`http://127.0.0.1:8000/api/notifikasi/updateisread`)
                .then(response => {
                    console.log("Status notifikasi diperbarui:", response.data);
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        }

        // document.addEventListener('DOMContentLoaded', function() {
        //     const dropdownNotifikasi = document.getElementById('dropdownMenuButton');

        //     dropdownNotifikasi.addEventListener('show.bs.dropdown', function() {
        //         const dropdownMenu = document.getElementById('dropdown-notifikasi');
        //         // Bersihkan daftar notifikasi sebelum menambahkan yang baru
        //         // dropdownMenu.innerHTML = '';


        //         getIsReadNotifikasi(user_id)


        //     });
        // });

        function getIsReadNotifikasi(user_id) {
            axios.get(`http://127.0.0.1:8000/api/notifikasi/isread/${user_id}`)
                .then(response => {
                    const notifikasiIsRead = response.data.data
                    console.log("data notifikasi isread:", notifikasiIsRead);

                    notifikasiIsRead.forEach(function(notif) {
                        // Buat elemen untuk menampilkan notifikasi baru
                        const newItem = document.createElement('li');
                        newItem.classList.add('mb-2');
                        newItem.innerHTML = `
                        <a class="dropdown-item border-radius-md" href="javascript:;">
                            <div class="d-flex py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <p class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold">${notif.content}</span>
                                    </p>
                                    <p class="text-xs text-secondary mb-0">
                                        <i class="fa fa-check "></i>
                                        ${notif.is_read ? '<span>Sudah Dibaca</span>' : '<span>Belum Dibaca</span>'}
                                    </p>
                                </div>
                            </div>
                        </a>
                    `;
                        // Tambahkan elemen baru ke dalam dropdown menu
                        const dropdownMenu = document.getElementById('dropdown-notifikasi');
                        dropdownMenu.prepend(newItem);
                    });
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        }
    </script>


</body>

</html>
