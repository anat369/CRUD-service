@extends('layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
        {{Form::open([
            'route'	=> 'item.store',
        ])}}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем новый товар</h3>
                    @include('pages.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName">Название</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="" name="name" value="{{old('name')}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputKey">Ключ</label>
                            <input type="text" class="form-control" id="exampleInputKey" placeholder="" name="key" value="{{old('key')}}">
                        </div>

                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-success pull-right" value="add">Добавить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {{Form::close()}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection