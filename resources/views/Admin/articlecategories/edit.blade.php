@extends('admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h3>ویرایش دسته بندی : {{$category->name}}</h3>
        </div>
            <!-- /.box-header -->
                        <form class="form-horizontal" method="post" action="{{route('categories.update',$category->id)}}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group">
                                <label for="name">نام</label>
                                <input type="text" name="name" class="form-control" value="{{$category->name}}"
                                       placeholder="عنوان دسته بندی را وارد کنید...">
                            </div>

                            <div class="form-group">
                                <label for="meta_title">عنوان سئو</label>
                                <input type="text" name="meta_title" class="form-control"
                                       value="{{$category->meta_title}}" placeholder="عنوان سئو را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="meta_desc">توضیحات سئو</label>
                                <textarea type="text" name="meta_desc" class="form-control"
                                          placeholder="توضیحات سئو را وارد کنید...">{{$category->meta_desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">کلمات کلیدی سئو</label>
                                <input type="text" name="meta_keywords" class="form-control"
                                       value="{{$category->meta_keywords}}"
                                       placeholder="کلمات کلیدی سئو را وارد کنید...">
                            </div>
                            <button type="submit" class="btn btn-danger">ذخیره</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
