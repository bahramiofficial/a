@extends('Admin.master')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ویرایش سرمایه های ما</h2>
        </div>
        <form class="form-horizontal" action="{{ route('ourresource.update' ,$ourresource->id ) }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Admin.section.errors')
            {{method_field('put')}}
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="company" class="control-label"> اسم شرکت : </label>
                    <input type="text" class="form-control" name="company" id="company"
                           placeholder="اسم شرکت را وارد کنید"
                           value="{{ $ourresource->company }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="link" class="control-label">لینک شرکت :</label>
                    <input type="text" class="form-control" name="link" id="link" placeholder="لینک را وارد کنید"
                           value="{{ $ourresource->link  }}">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="row">
                    <label for="images" class="control-label">تصویر :</label>
                    <input type="file" class="form-control" name="images" id="images" placeholder="تصویر رادیو را وارد کنید">
                    @foreach( $ourresource->images['images'] as $key => $image)
                        <div class="col-sm-2">

                            <label class="control-label">
                                {{ $key }}

                                <input type="radio" name="imagesThumb" value="{{ $image }}" {{ $ourresource->images['thumb'] == $image ? 'checked' : '' }} />
                                <a href="{{ $image }}" target="_blank"><img src="{{ $image }}" width="100%"></a>

                            </label>
                        </div>
                    @endforeach
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
