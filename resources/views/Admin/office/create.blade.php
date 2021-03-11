@extends('Admin.master')


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ایجاد دفتر</h2>
        </div>
        <form class="form-horizontal" action="{{ route('office.store') }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Admin.section.errors')

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="country" class="control-label">کشور :</label>
                    <input type="text" class="form-control" name="country" id="country" placeholder="کشور را وارد کنید">

                </div>

                <div class="col-sm-6">
                    <label for="address" class="control-label">ادرس :</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="ادرس را وارد کنید">

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="Phone" class="control-label">تلفن :</label>
                    <input type="Phone" class="form-control" name="Phone" id="Phone" placeholder="تلفن را وارد کنید">

                </div>

                <div class="col-sm-6">
                    <label for="email" class="control-label">ایمیل :</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="ایمیل را وارد کنید">

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="lat" class="control-label">lat :</label>
                    <input type="text" class="form-control" name="lat" id="Phone" placeholder="تلفن را وارد کنید">

                </div>

                <div class="col-sm-6">
                    <label for="lng" class="control-label">lng :</label>
                    <input type="text" class="form-control" name="lng" id="lng" placeholder="ایمیل را وارد کنید">

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="meta_keywords" class="control-label">meta_keywords :</label>
                    <input type="lat" class="form-control" name="meta_keywords" id="meta_keywords" placeholder="تلفن را وارد کنید">

                </div>

                <div class="col-sm-6">
                    <label for="meta_title" class="control-label">meta_title :</label>
                    <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="ایمیل را وارد کنید">

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="meta_desc" class="control-label">meta_desc :</label>
                    <input type="lat" class="form-control" name="meta_desc" id="meta_desc" placeholder="تلفن را وارد کنید">

                </div>

                <div class="col-sm-6">
                    <label for="lang" class="control-label"> زبان :</label>
                    <select name="lang" id="lang" class="form-control">
                        <option value="fa" selected>فارسی</option>
                        <option value="en">انگلیسی</option>
                    </select>
                </div>
            </div>



            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger">ارسال</button>
                </div>
            </div>
        </form>
    </div>
@endsection
