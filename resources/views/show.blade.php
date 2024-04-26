<div class="row">
    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
            <h4>{{ $pet->name }}</h4>
        </div>
    </div>
    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
            <p>価格: {{ $pet->kakaku }}円</p>
        </div>
    </div>

    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
            <p>在庫数: {{ $pet->stock }}</p>
        </div>
    </div>

    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
            <p>分類: 
            @foreach ($shuruis as $shurui)
                @if($shurui->id == $pet->shurui) {{ $shurui->str }} @endif
            @endforeach
            </p>
        </div>
    </div>

    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
            <p>メーカー: 
            @foreach ($manufacturers as $manufacturer)
                @if($manufacturer->id == $pet->manufacturer) {{ $manufacturer->str }} @endif
            @endforeach
            </p>
        </div>
    </div>

    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
            <p>詳細: {{ $pet->shosai }}</p>
        </div>
    </div>

    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
            @if($pet->image)
                <img src="{{ asset('storage/' . $pet->image) }}" alt="Product Image" style="max-width: 300px;">
            @else
                画像なし
            @endif
            
        </div>
    </div>

    <div class="col-12 mb-2 mt-2">
        <a class="btn btn-secondary" href="{{ route('pets.index') }}">一覧に戻る</a>
        <a class="btn btn-primary" href="{{ route('pet.edit', $pet->id) }}">変更</a>
    </div>
</div>
