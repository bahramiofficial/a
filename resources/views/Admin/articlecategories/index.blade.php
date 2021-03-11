@extends('admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>دسته بندی وبلاگ</h2>
            <a href="{{route('categories.create')}}" class="btn btn-sm btn-primary">ایجاد دسته بندی</a>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(Session::has('error_category'))
                    <div class="alert alert-danger">
                        <div>{{session('error_category')}}</div>
                    </div>
                @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th >#</th>
                            <th>عنوان</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td >{{$category->id}}</td>
                                <td>{{$category->name}}</td>


                                <td>
                                    <form action="{{ route('categories.destroy'  ,  $category->id) }}" method="post">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="btn-group btn-group-xs">
                                            <a href="{{ route('categories.edit' , $category->id) }}"  class="btn btn-primary">ویرایش</a>
                                            <button type="submit" class="btn btn-danger">حذف</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @if(count($category->childrenRecursive) > 0)
                                @include('admin.partials.category_list', ['categories'=>$category->childrenRecursive, 'level'=>1])
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection
