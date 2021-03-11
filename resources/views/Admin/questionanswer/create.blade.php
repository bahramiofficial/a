@extends('Admin.master')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ایجاد پرسش و پاسخ دوره</h2>
        </div>
        <form class="form-horizontal" action="{{ route('questionanswer.store') }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Admin.section.errors')

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="course_id" class="control-label">دوره زبان انگلیسی :</label>
                    <select name="course_id" id="course_id" class="form-control">

                        @foreach($course as $en)
                            <option value="{{$en->id}}">{{$en->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
<hr>

            <div class="form-group">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="why" class="control-label">سوال :</label>
                        <input type="text" class="form-control" name="why" id="why"
                               placeholder="سوال را وارد کنید"
                               value="{{ old('why') }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="cwhy" class="control-label">پاسخ :</label>
                            <textarea rows="5" class="form-control" name="cwhy" id="cwhy"
                                      placeholder="پاسخ  را وارد کنید">{{ old('cwhy') }}</textarea>
                        </div>
                    </div>

                </div>
            </div><hr>
            <div class="form-group">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="benefit" class="control-label">سوال :</label>
                        <input type="text" class="form-control" name="benefit" id="benefit"
                               placeholder="سوال را وارد کنید"
                               value="{{ old('benefit') }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="cbenefit" class="control-label">پاسخ :</label>
                            <textarea rows="5" class="form-control" name="cbenefit" id="cbenefit"
                                      placeholder="پاسخ  را وارد کنید">{{ old('cbenefit') }}</textarea>
                        </div>
                    </div>

                </div>
            </div><hr>
            <div class="form-group">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="hours" class="control-label">سوال :</label>
                        <input type="text" class="form-control" name="hours" id="hours"
                               placeholder="سوال را وارد کنید"
                               value="{{ old('hours') }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="chours" class="control-label">پاسخ :</label>
                            <textarea rows="5" class="form-control" name="chours" id="chours"
                                      placeholder="پاسخ  را وارد کنید">{{ old('chours') }}</textarea>
                        </div>
                    </div>

                </div>
            </div><hr>
            <div class="form-group">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="lessonG" class="control-label">سوال :</label>
                        <input type="text" class="form-control" name="lessonG" id="lessonG"
                               placeholder="سوال را وارد کنید"
                               value="{{ old('lessonG') }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="clessonG" class="control-label">پاسخ :</label>
                            <textarea rows="5" class="form-control" name="clessonG" id="clessonG"
                                      placeholder="پاسخ  را وارد کنید">{{ old('clessonG') }}</textarea>
                        </div>
                    </div>

                </div>
            </div><hr>
            <div class="form-group">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="lessonInfo" class="control-label">سوال :</label>
                        <input type="text" class="form-control" name="lessonInfo" id="lessonInfo"
                               placeholder="سوال را وارد کنید"
                               value="{{ old('lessonInfo') }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="clessonInfo" class="control-label">پاسخ :</label>
                            <textarea rows="5" class="form-control" name="clessonInfo" id="clessonInfo"
                                      placeholder="پاسخ  را وارد کنید">{{ old('clessonInfo') }}</textarea>
                        </div>
                    </div>

                </div>
            </div><hr>


            <div class="form-group">

                <div class="col-sm-6">
                    <label for="meta_desc" class="control-label"> توضیحات سئو :</label>
                    <input type="text" class="form-control" name="meta_desc" id="meta_desc"
                           placeholder="توضیحات سئو را وارد کنید">
                </div>
                <div class="col-sm-6">
                    <label for="meta_title" class="control-label"> عنوان سیو :</label>
                    <input type="text" class="form-control" name="meta_title" id="meta_title"
                           placeholder="عنوان سئو  را وارد کنید"
                           value="{{ old('meta_title') }}">
                </div>
            </div>

            <div class="form-group">

                <div class="col-sm-6">
                    <label for="meta_keywords" class="control-label">کلمه کلیدی :</label>
                    <input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                           placeholder="کلمه کلیدی  را وارد کنید"
                           value="{{ old('meta_keywords') }}">
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
