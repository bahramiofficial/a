@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>

        <payment :values="{{ json_encode($values) }}" :labels="{{ json_encode($labels) }}"></payment>

        <h2 class="sub-header">آمار خرید</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>قیمت</th>
                    <th>دوره خریداری شده</th>
                    <th>وضعیت خرید</th>
                    <th>تنضیمات</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1,001</td>
                    <td>Lorem</td>
                    <td>ipsum</td>
                    <td>dolor</td>
                    <td>sit</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection