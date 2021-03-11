@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>درخواست های پذیرفته شده</h2>

        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>زمینه فعالیت</th>

                </tr>
                </thead>
                <tbody>

                @foreach($recruitment as $recruitments)
                    <tr>

                        <td>{{ $recruitments->category }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
