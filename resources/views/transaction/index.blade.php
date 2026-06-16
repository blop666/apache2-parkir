@extends('master.master');

@section('menu')
    @include('master.menu')
@endsection

@section('main')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ $title }}</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">{{ $title }}</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                </div>


                @csrf

                <ul class="navbar-nav  justify-content-end">

                    <div class="d-flex align-items-center gap-3">
                        @foreach ($vehicle_types as $veh)
                            @php
                                $isActive = $selectVeh == $veh->id;
                                $bgColor = $isActive ? '#6c757d' : '#ffffff';
                                $textColor = $isActive ? '#ffffff' : '#1e2a45';
                                $border = $isActive ? 'none' : '1px solid #e5e7eb';
                            @endphp
                            <button class="btn mb-0"
                                style="background-color: {{ $bgColor }}; color: {{ $textColor }}; font-weight: 700; font-size: 0.78rem; padding: 8px 16px; border-radius: 8px; border: {{ $border }}; letter-spacing: 0.5px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); transition: all 0.2s;"
                                onmouseover="this.style.backgroundColor='{{ $isActive ? '#5a6268' : '#f3f4f6' }}'; this.style.transform='translateY(-1px)';"
                                onmouseout="this.style.backgroundColor='{{ $bgColor }}'; this.style.transform='translateY(0)';"
                                onclick="window.location.href='?vehicle_id={{ $veh->id }}'">
                                <i
                                    class="fa-solid @if (Str::contains(strtolower($veh->jenis), 'motorcycle')) fa-motorcycle @elseif(Str::contains(strtolower($veh->jenis), 'car')) fa-car @else fa-truck @endif me-1"></i>
                                {{ strtoupper($veh->jenis) }}
                            </button>
                        @endforeach

                        <button type="button" class="btn mb-0"
                            style="background-color: #cb0c9f; color: #ffffff; font-weight: 700; font-size: 0.78rem; padding: 8px 18px; border-radius: 8px; border: none; letter-spacing: 0.5px; box-shadow: 0 4px 14px rgba(203, 12, 159, 0.4); transition: all 0.2s;"
                            onmouseover="this.style.backgroundColor='#b30a8c'; this.style.boxShadow='0 6px 18px rgba(203, 12, 159, 0.55)'; this.style.transform='translateY(-1px)';"
                            onmouseout="this.style.backgroundColor='#cb0c9f'; this.style.boxShadow='0 4px 14px rgba(203, 12, 159, 0.4)'; this.style.transform='translateY(0)';"
                            onclick="submitEnterForm()">
                            <i class="fa-solid fa-plus me-1"></i> ENTER VEHICLE
                        </button>

                        <a href="#"
                            class="nav-link text-body font-weight-bold px-0 text-nowrap d-flex align-items-center mb-0"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            style="font-size: 0.82rem;">
                            <i class="fa-solid fa-sign-out-alt me-2"></i>
                            <span class="d-sm-inline d-none">Sign Out</span>
                        </a>
                    </div>


                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell cursor-pointer"></i>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                            aria-labelledby="dropdownMenuButton">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New message</span> from Laur
                                            </h6>
                                            <p class="text-xs text-secondary mb-0 ">
                                                <i class="fa fa-clock me-1"></i>
                                                13 minutes ago
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="../assets/img/small-logos/logo-spotify.svg"
                                                class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New album</span> by Travis Scott
                                            </h6>
                                            <p class="text-xs text-secondary mb-0 ">
                                                <i class="fa fa-clock me-1"></i>
                                                1 day
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                        fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background"
                                                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                    opacity="0.593633743"></path>
                                                                <path class="color-background"
                                                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                Payment successfully completed
                                            </h6>
                                            <p class="text-xs text-secondary mb-0 ">
                                                <i class="fa fa-clock me-1"></i>
                                                2 days
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->


    {{-- Main Section --}}

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        #exit-ticket-no::placeholder,
        #exit-police-no::placeholder {
            font-size: 1rem !important;
            font-weight: 500 !important;
            color: #adb5bd !important;
            text-transform: none !important;
            letter-spacing: 0px !important;
        }
    </style>

    <script>
        function showSwal({
            title,
            text = null,
            html = null,
            icon,
            confirmText = 'OK',
            confirmColor = '#cb0c9f',
            redirectUrl = null
        }) {
            Swal.fire({
                title,
                text: html ? undefined : text,
                html,
                icon,
                confirmButtonText: confirmText,
                confirmButtonColor: confirmColor,
                backdrop: 'rgba(0,0,0,0.45)'
            }).then((result) => {
                if (redirectUrl && result.isConfirmed) window.open(redirectUrl, '_blank');
            });
        }

        @if (session('success'))
            showSwal({
                title: 'Success!',
                text: 'Kendaraan berhasil masuk.',
                icon: 'success'
            });
        @endif

        @if (session('error'))
            showSwal({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error'
            });
        @endif

        @if (session('exit_success'))
            showSwal({
                title: 'Transaction Success',
                html: '<div style="font-size:14px;text-align:center;">Total Bayar : <b>Rp {{ number_format(session('exit_success')->total_bayar, 0, ',', '.') }}</b><br>Durasi: {{ session('exit_success')->total_jam }} Jam</div>',
                icon: 'success',
                confirmText: 'Selesai'
            });
        @endif
    </script>

    <form id="hidden-enter-form" action="{{ route('transaction.submitEnter') }}" method="POST" style="display:none;">
        @csrf
        <input type="hidden" name="id_jenis" value="{{ $selectVeh }}">
        <input type="hidden" name="id_lokasi" id="hidden-id-lokasi">
    </form>

    <div class="row g-4"
        style="font-family: 'Plus Jakarta Sans', sans-serif; background-color: #fbfbfb; margin: 0; width: 100%; overflow-x: hidden;">
        <div class="col-md-8">
            <div style="display: flex; gap: 16px; align-items: stretch; margin-bottom: 20px;">
                <div style="flex: 0 0 200px;">
                    <div
                        style="position: relative; border-radius: 16px; color: #fff; padding: 24px 20px; text-align: center; height: 100%; box-shadow: 0 8px 24px rgba(30, 60, 114, 0.35); display: flex; flex-direction: column; align-items: center; justify-content: center; background: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)), url('{{ asset('assets/img/curved-images/curved-11.jpg') }}'); background-size: cover; background-position: center; overflow: hidden;">
                        <img src="{{ asset('parkir.png') }}" alt="Logo Parkir"
                            style="max-height: 45px; margin-bottom: 10px; position: relative; z-index: 1;" />
                        <div id="dayName"
                            style="font-size: 1.15rem; font-weight: 600; margin-bottom: 2px; position: relative; z-index: 1;">
                            Loading...</div>
                        <div id="dateFull" style="font-size: 0.78rem; opacity: 0.9; position: relative; z-index: 1;">
                            Loading...</div>
                        <div id="clock"
                            style="font-size: 2.1rem; font-weight: 800; margin-top: 14px; letter-spacing: 2px; position: relative; z-index: 1;">
                            00:00:00</div>
                    </div>
                </div>

                <div style="flex: 1; overflow: hidden;">
                    <div style="display: flex; gap: 14px; overflow-x: auto; padding-bottom: 4px;"
                        class="h-100 align-items-stretch">
                        @foreach ($locations as $loc)
                            @php
                                $sisaMotor = $loc->getSlot(1);
                                $sisaCar = $loc->getSlot(2);
                                $sisaOther = $loc->getSlot(3);
                            @endphp
                            <div id="card-loc-{{ $loc->id }}" class="location-card"
                                onclick="selectCard({{ $loc->id }}, this)"
                                style="border: 2px solid #cb0c9f; border-radius: 16px; padding: 16px 14px; text-align: center; min-width: 148px; background: #fff; box-shadow: 0 4px 16px rgba(192, 38, 211, 0.1); transition: all 0.2s; flex-shrink: 0; cursor: pointer;">

                                <div id="circle-loc-{{ $loc->id }}" class="location-circle"
                                    style="width: 50px; height: 50px; border-radius: 50%; background-color: #cb0c9f; display: flex; align-items: center; justify-content: center; margin: 0 auto 10px; box-shadow: 0 4px 12px rgba(192, 38, 211, 0.35); transition: all 0.2s;">
                                    <i class="fa-solid fa-building" style="color: #fff; font-size: 1.2rem;"></i>
                                </div>

                                <div style="font-size: 0.9rem; font-weight: 700; color: #1e2a45; margin-bottom: 10px;">
                                    {{ $loc->location_name }}</div>

                                <div class="border-bottom pb-1 mb-1 text-muted"
                                    style="display: flex; justify-content: space-around; font-size: 0.68rem; opacity:0.7; font-weight: 600;">
                                    <span><i class="fa-solid fa-car"></i> {{ $loc->max_car }}</span>
                                    <span><i class="fa-solid fa-motorcycle"></i> {{ $loc->max_motorcycle }}</span>
                                    <span><i class="fa-solid fa-truck"></i> {{ $loc->max_other }}</span>
                                </div>
                                <div
                                    style="display: flex; justify-content: space-around; font-size: 0.8rem; font-weight: 600;">
                                    <span style="color: {{ $sisaMotor <= 0 ? '#dc2626' : '#2dce89' }};"><i
                                            class="fa-solid fa-car"></i> {{ $sisaMotor }}</span>
                                    <span style="color: {{ $sisaCar <= 0 ? '#dc2626' : '#2dce89' }};"><i
                                            class="fa-solid fa-motorcycle"></i> {{ $sisaCar }}</span>
                                    <span style="color: {{ $sisaOther <= 0 ? '#dc2626' : '#2dce89' }};"><i
                                            class="fa-solid fa-truck"></i> {{ $sisaOther }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div
                style="background: #ffffff; border-radius: 16px; padding: 45px 28px; box-shadow: 0 4px 20px rgba(0,0,0,0.07); border: none; width: 100%;">
                <form action="{{ route('transaction.exit') }}" method="POST">
                    @csrf
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 style="font-size: 1.15rem; font-weight: 800; color: #cb0c9f;">Transaction <span
                                class="text-dark font-weight-normal">Input Form</span></h5>
                        <button type="submit"
                            style="background-color: #1e2a45; color: #fff; font-weight: 700; font-size: 0.82rem; padding: 10px 20px; border-radius: 10px; border: none; display: flex; align-items: center; gap: 8px;"
                            class="btn" onmouseover="this.style.backgroundColor='#0f1620';"
                            onmouseout="this.style.backgroundColor='#1e2a45';"><i
                                class="fa-solid fa-arrow-right-from-bracket"></i> EXIT VEHICLE</button>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div
                                style="border: 1.5px solid #e5e7eb; border-radius: 12px; padding: 10px 18px; background: #ffffff;">
                                <label class="form-label text-uppercase text-muted font-weight-bolder d-block"
                                    style="font-size: 0.68rem; letter-spacing: 0.5px; margin-bottom: 2px;">Ticket
                                    Number</label>
                                <input type="text" class="form-control text-uppercase" name="no_ticket"
                                    id="exit-ticket-no" placeholder="Ticket Number"
                                    style="background: transparent; border: none; font-size: 1.25rem; font-weight: 700; color: #1e2a45; padding: 0; height: auto; letter-spacing: 0.5px; box-shadow: none; width: 100%; margin-top: 4px;"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div
                                style="border: 1.5px solid #e5e7eb; border-radius: 12px; padding: 10px 18px; background: #ffffff;">
                                <label class="form-label text-uppercase text-muted font-weight-bolder d-block"
                                    style="font-size: 0.68rem; letter-spacing: 0.5px; margin-bottom: 2px;">Police
                                    Number</label>
                                <input type="text" class="form-control text-uppercase" name="no_polisi"
                                    id="exit-police-no" placeholder="Police Number"
                                    style="background: transparent; border: none; font-size: 1.25rem; font-weight: 700; color: #1e2a45; padding: 0; height: auto; letter-spacing: 0.5px; box-shadow: none; width: 100%; margin-top: 4px;"
                                    required>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-md-4">
            <div
                style="background: #ffffff; border-radius: 16px; padding: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.07); display: flex; flex-direction: column; height: 100%; max-height: 495px; overflow: hidden;">
                <div
                    style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 12px; border-bottom: 1.5px solid #f3f4f6; margin-bottom: 16px; flex-shrink: 0;">
                    <span style="font-size: 1.1rem; font-weight: 700; color: #1e2a45;">Tickets</span>
                    <button type="button"
                        style="font-size: 0.75rem; font-weight: 700; color: #cb0c9f; border: 1.5px solid #cb0c9f; border-radius: 8px; padding: 4px 14px; background: transparent;"
                        class="btn" onmouseover="this.style.backgroundColor='rgba(192, 38, 211, 0.1)';"
                        onmouseout="this.style.backgroundColor='transparent';" data-bs-toggle="modal"
                        data-bs-target="#viewAllModal">VIEW ALL</button>
                </div>

                <div style="flex-grow: 1; overflow-y: auto; padding-right: 4px; display: flex; flex-direction: column;">
                    @forelse($tickets as $tick)
                        <div class="d-flex align-items-center p-2 mb-2 bg-white border border-light shadow-sm"
                            style="border-radius: 12px; border-left: 4px solid {{ $tick->keluar ? '#94a3b8' : '#cb0c9f' }} !important; cursor: pointer; transition: 0.2s;"
                            @if (!$tick->keluar) onclick="exit_column('{{ $tick->no_ticket }}')" @endif
                            onmouseover="this.style.backgroundColor='#f8f9fe';"
                            onmouseout="this.style.backgroundColor='#ffffff';">

                            <div class="flex-grow-1" style="min-width: 0; padding-right: 8px;">
                                <span class="text-muted d-block"
                                    style="font-size: 0.68rem; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ date('Y-m-d H:i:s', strtotime($tick->masuk)) }}
                                </span>
                                <span
                                    style="font-weight: 800; color: #1e2a45; font-size: 0.76rem; block-size: auto; word-wrap: break-word;">
                                    #{{ $tick->no_ticket }}
                                </span>
                            </div>

                            <div class="d-flex align-items-center gap-2 flex-shrink-0">
                                @if ($tick->keluar)
                                    <div class="text-end">
                                        <span
                                            style="font-size: 0.78rem; font-weight: 800; color: #4a5568; white-space: nowrap;">
                                            Rp {{ number_format($tick->total_bayar, 0, ',', '.') }}
                                        </span>
                                    </div>
                                @else
                                    <div class="d-flex align-items-center gap-2">
                                        <span
                                            style="font-size: 0.65rem; font-weight: 700; background: #e0f2fe; color: #0369a1; border-radius: 4px; padding: 2px 6px; white-space: nowrap;">
                                            ACTIVE
                                        </span>
                                        @if ($tick->no_polisi && $tick->no_polisi != '-')
                                            <span
                                                style="font-size: 0.7rem; font-weight: 700; background: #f0f1f3; color: #4a5568; border-radius: 4px; padding: 2px 6px; max-width: 75px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"
                                                class="text-uppercase">
                                                {{ $tick->no_polisi }}
                                            </span>
                                        @endif
                                    </div>
                                @endif

                                <a href="/transactions/ticket/{{ $tick->id }}" target="_blank"
                                    style="color: #ef4444; font-size: 1.1rem; transition: 0.2s;"
                                    onmouseover="this.style.transform='scale(1.1)';"
                                    onmouseout="this.style.transform='scale(1)';">
                                    <i class="fa-solid fa-file-pdf"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted m-auto py-4">
                            <i class="fa-solid fa-ticket fa-2x mb-2 d-block" style="color:#e0d0e8;"></i>
                            <small style="font-size: 0.75rem;">No tickets available</small>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewAllModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-3">
                    <h5 class="modal-title text-black font-weight-bolder"><i class="fa-solid fa-list-check me-2"></i>All
                        Transactions Log Table</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center">No</th>

                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 ps-2">Ticket Number
                                    </th>

                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 ps-2">Police Number
                                    </th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center">Location
                                        Name</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center">Vehicle
                                        Type</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center">Time In
                                    </th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center">Time Out
                                    </th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center">First
                                        Hours Charges</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center">Next
                                        Hourly Charges</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center">Max Cost
                                        Per Day</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center">Total
                                        Hours</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center">Total Days
                                    </th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center">Total Pays
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $key => $t)
                                    <tr class="text-sm font-weight-bold text-dark">
                                        <td class="text-center">{{ $key + 1 }}</td>

                                        <td>#{{ $t->no_ticket }}</td>
                                        <td class="text-uppercase">{{ $t->no_polisi }}</td>


                                        <td class="text-center">{{ $t->location->location_name ?? '-' }}</td>
                                        <td class="text-center text-uppercase">{{ $t->vehicle_type->jenis ?? '-' }}</td>
                                        <td class="text-center text-secondary">{{ $t->masuk }}</td>
                                        <td class="text-center text-secondary">{{ $t->keluar ?? '-' }}</td>
                                        <td class="text-center">Rp
                                            {{ number_format($t->perjam_pertama ?? ($t->vehicle_type->perjam_pertama ?? 0), 0, ',', '.') }}
                                        </td>
                                        <td class="text-center">Rp
                                            {{ number_format($t->perjam_berikutnya ?? ($t->vehicle_type->perjam_berikutnya ?? 0), 0, ',', '.') }}
                                        </td>
                                        <td class="text-center">Rp
                                            {{ number_format($t->max_perhari ?? ($t->vehicle_type->max_perhari ?? 0), 0, ',', '.') }}
                                        </td>
                                        <td class="text-center text-primary">{{ $t->total_jam ?? 0 }} Jam</td>
                                        <td class="text-center">{{ $t->keluar ? '1' : '0' }}</td>
                                        <td class="text-center text-success">Rp
                                            {{ number_format($t->total_bayar ?? 0, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        function selectCard(locId, element) {
            document.querySelectorAll('.location-card').forEach(card => {
                card.style.border = '2px solid #cb0c9f';
                card.style.boxShadow = '0 4px 8px rgba(132, 38, 211, 0.1)';
            });

            document.querySelectorAll('.location-circle').forEach(circle => {
                circle.style.backgroundColor = '#cb0c9f';
                circle.style.boxShadow = '0 4px 12px rgba(192, 38, 211, 0.35)';
            });


            element.style.border = '3px solid #1e2a45';
            element.style.boxShadow = '0 6px 20px rgba(30, 42, 69, 0.35)';

            const activeCircle = document.getElementById('circle-loc-' + locId);
            if (activeCircle) {
                activeCircle.style.backgroundColor = '#1e2a45';
                activeCircle.style.boxShadow = '0 4px 12px rgba(30, 42, 69, 0.2)';
            }

            document.getElementById('hidden-id-lokasi').value = locId;
        }

        function submitEnterForm() {
            const locId = document.getElementById('hidden-id-lokasi').value;
            if (!locId) {
                Swal.fire({
                    title: 'Peringatan!',
                    text: 'Pilih salah satu Gedung !',
                    icon: 'warning',
                    confirmButtonColor: '#cb0c9f'
                });
                return;
            }
            document.getElementById('hidden-enter-form').submit();
        }

        function exit_column(ticketNo) {
            document.getElementById('exit-ticket-no').value = ticketNo;
            document.getElementById('exit-police-no').value = '';
            document.getElementById('exit-police-no').focus();
        }

        function updateTime() {
            const now = new Date();
            const timeOptions = {
                timeZone: 'Asia/Jakarta',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            };
            document.getElementById('clock').textContent = new Intl.DateTimeFormat('en-US', timeOptions).format(now)
                .replace(/\./g, ':');
            document.getElementById('dayName').textContent = new Intl.DateTimeFormat('en-US', {
                timeZone: 'Asia/Jakarta',
                weekday: 'long'
            }).format(now);
            document.getElementById('dateFull').textContent = new Intl.DateTimeFormat('en-US', {
                timeZone: 'Asia/Jakarta',
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            }).format(now);
        }
        setInterval(updateTime, 1000);
        updateTime();
    </script>




@endsection
