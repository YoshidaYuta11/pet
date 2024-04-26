@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">文房具登録画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('pets.index') }}">戻る</a>
        </div>
    </div>
</div>

<div style="text-align:right;">
<form action="{{ route('pets.store') }}" method="post" enctype="multipart/form-data">



    @csrf
     
     <div class="row">

     <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <label for="image">商品画像：</label>
                <input type="file" class="form-control" id="image" name="image" >
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="名前">
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
    <div class="form-group">
        <input type="text" name="stock" class="form-control" placeholder="在庫数">
    </div>
</div>

<div class="col-12 mb-2 mt-2">
    <div class="form-group">
        <input type="text" name="kakaku" class="form-control" placeholder="価格">
    </div>
</div>


        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
            <textarea class="form-control" style="height:100px" name="shosai" placeholder="詳細"></textarea>
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
                <button type="submit" class="btn btn-primary w-100">登録</button>
        </div>

        <div class="col-12 mb-2 mt-2">
    <div class="form-group">
        <select name="shurui" class="form-select">
            <option>分類を選択してください</option>
            @foreach ($shuruis as $shurui)
                <option value="{{ $shurui->id }}">{{ $shurui->str }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <select name="manufacturer" class="form-select">
                    <option>メーカーを選択してください</option>
                    @foreach ($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer->id }}">{{ $manufacturer->str }}</option>

                    @endforeach
                </select>
                @error('manufacturer')
                <span style="color:red;">メーカーを選択してください</span>
                @enderror
            </div>
        </div>

</div>



        
    </div>      
</form>

@error('name')
<span style=”color:red;”>名前を20文字以内で入力してください</span>
@enderror

</div>
@endsection