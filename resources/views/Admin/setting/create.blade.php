@extends('Admin.master')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>تنظیمات</h2>
        </div>
        <form class="form-horizontal" action="{{ route('setting.store') }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Admin.section.errors')

            <div class="form-group">
                <div class="col-sm-3">
                    <label for="educationalpack" class="control-label">بسته های آموزشی :</label>
                    <input type="text" class="form-control" name="educationalpack" id="educationalpack" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('educationalpack') }}">
                </div>
                <div class="col-sm-3">
                    <label for="educationalarticles" class="control-label">مقالات اموزشی :</label>
                    <input type="text" class="form-control" name="educationalarticles" id="educationalarticles" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('educationalarticles') }}">
                </div>
                <div class="col-sm-3">
                    <label for="ebook" class="control-label">کتاب الکترونیک :</label>
                    <input type="text" class="form-control" name="ebook" id="ebook" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('ebook') }}">
                </div>
                <div class="col-sm-3">
                    <label for="podcast" class="control-label"> پادکست :</label>
                    <input type="text" class="form-control" name="podcast" id="podcast" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('podcast') }}">
                </div>
            </div>

            <hr>


            <div class="form-group">
                <div class="col-sm-3">
                    <label for="newsarticles" class="control-label">اخبار و مقالات :</label>
                    <input type="text" class="form-control" name="newsarticles" id="newsarticles" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('newsarticles') }}">
                </div>
                <div class="col-sm-3">
                    <label for="khabarname" class="control-label">خبر نامه:</label>
                    <input type="text" class="form-control" name="khabarname" id="khabarname" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('khabarname') }}">
                </div>
                <div class="col-sm-3">
                    <label for="img" class="control-label">تصاویر :</label>
                    <input type="text" class="form-control" name="img" id="img" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('img') }}">
                </div>
                <div class="col-sm-3">
                    <label for="cooperation" class="control-label">همکاری با ما :</label>
                    <input type="text" class="form-control" name="cooperation" id="cooperation" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('cooperation') }}">
                </div>
            </div>

            <hr>


            <div class="form-group">
                <div class="col-sm-3">
                    <label for="voicebook" class="control-label">کتاب صوتی :</label>
                    <input type="text" class="form-control" name="voicebook" id="voicebook" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('voicebook') }}">
                </div>
                <div class="col-sm-3">
                    <label for="latest" class="control-label">تازه ترین ها :</label>
                    <input type="text" class="form-control" name="latest" id="latest" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('latest') }}">
                </div>
                <div class="col-sm-3">
                    <label for="usualquestions" class="control-label">سوالات متدوال :</label>
                    <input type="text" class="form-control" name="usualquestions" id="usualquestions" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('usualquestions') }}">
                </div>
                <div class="col-sm-3">
                    <label for="acceptidea" class="control-label">پذیرش ایده :</label>
                    <input type="text" class="form-control" name="acceptidea" id="acceptidea" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('acceptidea') }}">
                </div>
            </div>

            <hr>


            <div class="form-group">
                <div class="col-sm-3">
                    <label for="title" class="control-label">عنوان سایت :</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('title') }}">
                </div>
                <div class="col-sm-3">
                    <label for="homedesctop" class="control-label">توضیحات صفحه اصلی بالا :</label>
                    <input type="text" class="form-control" name="homedesctop" id="homedesctop" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('homedesctop') }}">
                </div>
                <div class="col-sm-3">
                    <label for="worksection" class="control-label">بخش های کاری :</label>
                    <input type="text" class="form-control" name="worksection" id="worksection" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('worksection') }}">
                </div>
                <div class="col-sm-3">
                    <label for="dep" class="control-label">دپارتمان :</label>
                    <input type="text" class="form-control" name="dep" id="dep" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('dep') }}">
                </div>
            </div>

            <hr>


            <div class="form-group">
                <div class="col-sm-3">
                    <label for="article" class="control-label">مبنا و رویداد :</label>
                    <input type="text" class="form-control" name="article" id="article" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('article') }}">
                </div>
                <div class="col-sm-3">
                    <label for="homedescdown" class="control-label">توضیحات صفحه اصلی پایین :</label>
                    <input type="text" class="form-control" name="homedescdown" id="homedescdown" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('homedescdown') }}">
                </div>
                <div class="col-sm-3">
                    <label for="ourresources" class="control-label">سرمایه های ما</label>
                    <input type="text" class="form-control" name="ourresources" id="ourresources" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('ourresources') }}">
                </div>
                <div class="col-sm-3">
                    <label for="instagram" class="control-label">پست اینستا گرام :</label>
                    <input type="text" class="form-control" name="instagram" id="instagram" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('instagram') }}">
                </div>
            </div>

            <hr>

            <div class="form-group">
                <div class="col-sm-3">
                    <label for="coleagesuggecstions" class="control-label">نظرات همکاران :</label>
                    <input type="text" class="form-control" name="coleagesuggecstions" id="coleagesuggecstions" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('coleagesuggecstions') }}">
                </div>
                <div class="col-sm-3">
                    <label for="contactus" class="control-label">ارتباط با ما :</label>
                    <input type="text" class="form-control" name="contactus" id="contactus" placeholder="مقدار فیلد را وارد کنید"
                           value="{{ old('contactus') }}">
                </div>

                <div class="col-sm-6">
                    <label for="images" class="control-label">لوگو :</label>
                    <input type="file" class="form-control" name="images" id="images"
                           placeholder="لوگو را وارد کنید">
                </div>

            </div>

            <hr>

            <div class="form-group">
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





