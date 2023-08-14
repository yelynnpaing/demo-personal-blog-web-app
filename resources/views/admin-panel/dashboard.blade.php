@extends('admin-panel.master')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid bg-secondary py-5 px-4 body-content">
    <h3 class="text-white">Quick Stats <hr> </h3>
    {{-- VISITOR COUNT  --}}
    <div class="visitor-count mt-4">
        <div class="row g-2 flex-column flex-lg-row mb-5">
            <div class="col-12 col-lg-3">
                <div class="bg-light p-4 rounded-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h3 class="text-success">1,100</h3>
                        <i class="fa-solid fa-circle-user text-success fs-1"></i>
                    </div>
                    <i class="fas fa-chart-line text-primary"></i>
                    <small>Daily Visitors</small>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="bg-light p-4 rounded-2 mb-3">
                    <div class="d-flex justify-content-between mb-3">
                        <h3 class="text-success">7,100</h3>
                        <i class="fa-solid fa-circle-user text-success fs-1"></i>
                    </div>
                    <i class="fas fa-chart-line text-primary"></i>
                    <small>Weekly Visitors</small>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="bg-light p-4 rounded-2 mb-3">
                    <div class="d-flex justify-content-between mb-3">
                        <h3 class="text-success">123,100</h3>
                        <i class="fa-solid fa-circle-user text-success fs-1"></i>
                    </div>
                    <i class="fas fa-chart-line text-primary"></i>
                    <small>Monthly Visitors</small>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="bg-light p-4 rounded-2 mb-3">
                    <div class="d-flex justify-content-between mb-3">
                        <h3 class="text-success">453,100</h3>
                        <i class="fa-solid fa-circle-user text-success fs-1"></i>
                    </div>
                    <i class="fas fa-chart-line text-primary"></i>
                    <small>Yearly Visitors</small>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-2 flex-column flex-lg-row">
        {{-- LOCATION  --}}
        <div class="col-12 col-lg-6 mb-5">
            <div class="location">
                <h3 class="text-white">LOCATION <hr> </h3>
                <div class="bg-light rounded-2 p-4 mt-4">
                    <div class="mb-4">
                        <p>Regional</p>
                        <div class="progress" role="progressbar" arial-volumenow="60" arial-volumemin="0" arial-volumemax="100"   >
                            <div class="progress-bar bg-success" style="width:60%">60%</div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p>Global</p>
                        <div class="progress" role="progressbar" arial-volumenow="50" arial-volumemin="0" arial-volumemax="100"   >
                            <div class="progress-bar bg-warning" style="width:50%">50%</div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p>Internal</p>
                        <div class="progress" role="progressbar" arial-volumenow="40" arial-volumemin="0" arial-volumemax="100"   >
                            <div class="progress-bar bg-primary" style="width:40%">40%</div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p>Indutrial</p>
                        <div class="progress" role="progressbar" arial-volumenow="30" arial-volumemin="0" arial-volumemax="100"   >
                            <div class="progress-bar bg-danger" style="width:30%">30%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- DATA  --}}
        <div class="col-12 col-lg-6">
            <div class="data">
                <h3 class="text-white">DATA <hr> </h3>
                <div class="bg-light rounded-2 p-3 mt-4">
                    <div class="text-end mb-4">
                        <span class="bg-secondary rounded-2 p-2 me-2">
                            <i class="fas fa-search text-light"></i>
                        </span>
                        <span class="bg-secondary rounded-2 p-2 me-2">
                            <i class="fas fa-arrow-up-short-wide text-light"></i>
                        </span>
                        <span class="bg-secondary rounded-2 p-2 me-2">
                            <i class="fas fa-filter text-light"></i>
                        </span>
                    </div>
                    <table class="table table-bordered table-hover mb-5">
                        <tr class="bg-secondary">
                            <th scope="col" class="text-white">ID</th>
                            <th scope="col" class="text-white">Age Group</th>
                            <th scope="col" class="text-white">Data</th>
                            <th scope="col" class="text-white">Progress</th>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>20-30</td>
                            <td>19%</td>
                            <td>
                                <i class="fas fa-location-dot"></i>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>23-40</td>
                            <td>29%</td>
                            <td>
                                <i class="fas fa-usd"></i>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>40-45</td>
                            <td>59%</td>
                            <td>
                                <i class="fas fa-people-arrows"></i>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>45-50</td>
                            <td>50%</td>
                            <td>
                                <i class="fas fa-warning"></i>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>50-55</td>
                            <td>70%</td>
                            <td>
                                <i class="fas fa-diagram-next"></i>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



