@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Создаем пост</div>
                    <div>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                    <div class="panel-body">
                        <form action="/posts/store" method="post">
                            {{csrf_field()}}
                            <label for="" class="input-group">
                                title:
                                <input type="text" name="title" value="{{old('title')}}">
                            </label>
                            <label for="" class="input-group">
                                content
                            <textarea name="content" id="" cols="30" rows="10">{{old('content')}}</textarea>
                            </label>
                            <input type="submit" class="btn" value="Отправить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
