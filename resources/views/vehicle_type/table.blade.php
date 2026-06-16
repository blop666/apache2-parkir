<div class="row">

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Vehicle Types Table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Vehicle Type</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Fist Hour Charges</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Next Hourly Charges</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Max Cost Per Day</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vehicle_types as $veh)
                                        <tr>

                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $veh->jenis }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                
                                                <span class="text-xs font-weight-bold">Rp
                                                    {{ number_format($veh->perjam_pertama, 0, ',', '.') }}</span>

                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-xs font-weight-bold">Rp
                                                    {{ number_format($veh->perjam_berikutnya, 0, ',', '.') }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-xs font-weight-bold">Rp
                                                    {{ number_format($veh->max_perhari, 0, ',', '.') }}</span>
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


    </div>
