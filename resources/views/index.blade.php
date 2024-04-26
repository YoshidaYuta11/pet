@extends('app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-left">
                <h2 style="font-size:1rem;">文房具マスター</h2>
            </div>
            <div class="text-right">
                <a class="btn btn-success" href="{{ route('pet.create') }}">新規登録</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>画像</th> <!-- 画像の列を追加 -->
            <th>name</th>
            <th>kakaku</th>
            <th>stock</th>
            <th>shurui</th>
            <th>manufacturer</th>
            <th>詳細</th>
            <th>削除</th> <!-- 削除ボタンを追加 -->
        </tr>
        @foreach ($pets as $pet)
        
        <tr>
            <td style="text-align:right">{{ $pet->id }}</td>
            
            <!-- 画像の表示 -->
            <td>
           
    <!-- 画像の表示 -->
    @if($pet->image)
    <img src="{{ asset('storage/' . $pet->image) }}" alt="Product Image" style="max-width: 300px;">
@else
    画像なし
@endif


</td>


            
            <td>
                <a href="{{ route('pet.show', ['pet' => $pet->id, 'page_id' => $pets->currentPage()]) }}">{{ $pet->name }}</a>
            </td>
            
            <td style="text-align:right">{{ $pet->kakaku }}円</td>
            <td style="text-align:right">{{ $pet->stock }}</td>
            <td style="text-align:right">{{ $pet->shurui }}</td>
            <td style="text-align:right">{{ $pet->manufacturer }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('pet.show', ['pet' => $pet->id, 'page_id' => $pets->currentPage()]) }}">詳細</a>
            </td>
            <td style="text-align:center">
                <form action="{{ route('pet.destroy', $pet->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick='return confirm("削除しますか？");'>削除</button>
                </form>
            </td>
        </tr>
        
        @endforeach
    </table>

    {!! $pets->links('pagination::bootstrap-5') !!}
@endsection
