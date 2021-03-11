@extends('Admin.master')
@section('script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('answer', {
            filebrowserUploadUrl: '/admin/panel/upload-image',
            filebrowserImageUploadUrl: '/admin/panel/upload-image'
        });
    </script>
@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ویرایش پرسش و پاسخ دوره</h2>
        </div>
        <form class="form-horizontal" action="{{ route('questionanswer.update',$questionanswer->id) }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('put')}}
            @include('Admin.section.errors')


            <div class="form-group">
                <div class="col-sm-6">
                    <label for="parenten" class="control-label">دوره زبان انگلیسی :</label>
                    <select name="parentfa" id="parentfa" class="form-control">
                        @foreach($courseen as $en)
                            <select name="lang" id="lang" class="form-control">
                                <option
                                    value="fa" {{ $questionanswer->en == $questionanswer->en ? 'selected' : '' }}>{{$en->title}}</option>
                            </select>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-6">
                    <label for="parentfa" class="control-label"> دوره زبان فارسی :</label>
                    <select name="parentfa" id="parentfa" class="form-control">
                        @foreach( $coursefa as $fa)
                            <option
                                value="fa" {{ $questionanswer->fa == $questionanswer->fa ? 'selected' : '' }}>{{$fa->title}}</option>                        @endforeach
                    </select>
                </div>
            </div>
            <hr>

            <div class="form-group">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="why" class="control-label">سوال :</label>
                        <input type="text" class="form-control" name="why" id="why"

                               value="{{ $questionanswer->why }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="cwhy" class="control-label">پاسخ :</label>
                            <textarea rows="5" class="form-control" name="cwhy" id="cwhy"
                            >{{ $questionanswer->cwhy }}</textarea>
                        </div>
                    </div>

                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="benefit" class="control-label">سوال :</label>
                        <input type="text" class="form-control" name="benefit" id="benefit"
                               placeholder="سوال را وارد کنید"
                               value="{{ $questionanswer->benefit }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="cbenefit" class="control-label">پاسخ :</label>
                            <textarea rows="5" class="form-control" name="cbenefit" id="cbenefit"
                                      placeholder="پاسخ  را وارد کنید">{{ $questionanswer->cbenefit }}</textarea>
                        </div>
                    </div>

                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="hours" class="control-label">سوال :</label>
                        <input type="text" class="form-control" name="hours" id="hours"
                               placeholder="سوال را وارد کنید"
                               value="{{ $questionanswer->hours }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="chours" class="control-label">پاسخ :</label>
                            <textarea rows="5" class="form-control" name="chours" id="chours"
                                      placeholder="پاسخ  را وارد کنید">{{ $questionanswer->chours }}</textarea>
                        </div>
                    </div>

                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="lessonG" class="control-label">سوال :</label>
                        <input type="text" class="form-control" name="lessonG" id="lessonG"
                               placeholder="سوال را وارد کنید"
                               value="{{ $questionanswer->lessonG }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="clessonG" class="control-label">پاسخ :</label>
                            <textarea rows="5" class="form-control" name="clessonG" id="clessonG"
                                      placeholder="پاسخ  را وارد کنید">{{ $questionanswer->clessonG }}</textarea>
                        </div>
                    </div>

                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="lessonInfo" class="control-label">سوال :</label>
                        <input type="text" class="form-control" name="lessonInfo" id="lessonInfo"
                               placeholder="سوال را وارد کنید"
                               value="{{ $questionanswer->lessonInfo }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="clessonInfo" class="control-label">پاسخ :</label>
                            <textarea rows="5" class="form-control" name="clessonInfo" id="clessonInfo"
                                      placeholder="پاسخ  را وارد کنید">{{ $questionanswer->clessonInfo }}</textarea>
                        </div>
                    </div>

                </div>
            </div>
            <hr>


            <hr>


            <div class="form-group">

                <div class="col-sm-6">
                    <label for="meta_desc" class="control-label"> توضیحات سئو :</label>
                    <input type="text" class="form-control" name="meta_desc" id="meta_desc"
                           value="{{ $questionanswer->meta_desc }}"
                           placeholder="توضیحات سئو را وارد کنید">
                </div>
                <div class="col-sm-6">
                    <label for="meta_title" class="control-label"> عنوان سیو :</label>
                    <input type="text" class="form-control" name="meta_title" id="meta_title"
                           placeholder="عنوان سئو  را وارد کنید"
                           value="{{ $questionanswer->meta_title }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="meta_keywords" class="control-label">کلمه کلیدی :</label>
                    <input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                           placeholder="کلمه کلیدی  را وارد کنید"
                           value="{{$questionanswer->meta_keywords }}">
                </div>
                <div class="col-sm-6">
                    <label for="lang" class="control-label">زبان مقاله</label>
                    <select name="lang" id="lang" class="form-control">
                        <option value="fa" {{ $questionanswer->lang == 'fa' ? 'selected' : '' }}>فارسی</option>
                        <option value="en" {{ $questionanswer->lang == 'en' ? 'selected' : '' }}>انگلیسی</option>
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
