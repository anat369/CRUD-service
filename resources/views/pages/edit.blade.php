@extends('layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
        {{Form::open([
            'route'	=>	['item.update', $item->id],
            'method'	=>	'put'
        ])}}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Обновить товар</h3>
                    @include('pages.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName">Название</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="" value="{{$item->name}}" name="name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputKey">Ключ</label>
                            <input type="text" class="form-control" id="exampleInputKey" placeholder="" value="{{$item->key}}" name="key">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {{Form::close()}}
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">История изменений товара</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-8">
                        @foreach($item->getHistoryText() as $text)
                            {!! $text !!}
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection