@extends('layouts.soft')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">مبيعات اليوم</p>
                    <h5 class="font-weight-bolder mb-0">
                    {{$today_sales}} جنيه
                    </h5>
                </div>
                </div>
                <div class="col-4 text-start">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold"> المبيعات الكلية</p>
                    <h5 class="font-weight-bolder mb-0">
                        {{$sales}} جنيه
                    </h5>
                </div>
                </div>
                <div class="col-4 text-start">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">عملاء جدد</p>
                    <h5 class="font-weight-bolder mb-0">
                        {{$new_clients}} عميل
                    </h5>
                </div>
                </div>
                <div class="col-4 text-start">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">مبيعات</p>
                    <h5 class="font-weight-bolder mb-0">
                    $103,430
                    <span class="text-success text-sm font-weight-bolder">+5%</span>
                    </h5>
                </div>
                </div>
                <div class="col-4 text-start">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection
@section('scripts')
@parent

@endsection