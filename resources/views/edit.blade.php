<form action="{{ route('pet.update', $pet->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
     
     <div class="row">

     <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <label for="image">商品画像：</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="name" value="{{ $pet->name }}" class="form-control" placeholder="名前">
                @error('name')
                <span style="color:red;">名前を20文字以内で入力してください</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="kakaku" value="{{ $pet->kakaku }}" class="form-control" placeholder="価格">
                @error('kakaku')
                <span style="color:red;">価格を数字で入力してください</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="stock" value="{{ $pet->stock }}" class="form-control" placeholder="在庫">
                @error('stock')
                <span style="color:red;">在庫を数字で入力してください</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <select name="shurui" class="form-select">
                    <option>分類を選択してください</option>
                    @foreach ($shuruis as $shurui)
                        <option value="{{ $shurui->id }}" @if($shurui->id == $pet->shurui) selected @endif>{{ $shurui->str }}</option>
                    @endforeach
                </select>
                @error('shurui')
                <span style="color:red;">分類を選択してください</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
            <textarea class="form-control" style="height:100px" name="shosai" placeholder="詳細">{{ $pet->shosai }}</textarea>
                @error('shosai')
                <span style="color:red;">詳細を140文字以内で入力してください</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <select name="manufacturer" class="form-select">
                    <option>メーカーを選択してください</option>
                    @foreach ($manufacturers as $manufacturer)
                        <option value="{{ $manufacturer->id }}" @if($manufacturer->id == $pet->manufacturer) selected @endif>{{ $manufacturer->str }}</option>
                    @endforeach
                </select>
                @error('manufacturer')
                <span style="color:red;">メーカーを選択してください</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
                <button type="submit" class="btn btn-primary w-100">変更</button>
        </div>
    </div>      
</form>