@extends('layouts.template')

@section('content')

    <div class="card-header bg-primary row  mt-5 mb-5">
        <div class="col-sm-6 col-md-6">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="pe-7s-cash"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text">$ <span class="count">218845</span></div>
                                <div class="stat-heading">Penghasilan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-6 col-md-6">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                            <i class="pe-7s-cart"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">29</span></div>
                                <div class="stat-heading">Penjualan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
