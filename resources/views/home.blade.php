@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form action="/foo/bar">
                        <input type="text" name="email" value="asd">
                    </form>
                    <example></example>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
