<?php

namespace App\Http\Controllers;
use App\Models\Shurui;

use App\Models\Manufacturer; // Manufacturerモデルを適切な場所からインポート

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $pets = Pet::select([
        'b.id',
        'b.name',
        'b.kakaku',
        'b.stock',
        'b.shosai',
        'm.str as manufacturer', // メーカー名を取得する
        'r.str as shurui', // 'str' カラムを 'shurui' として取得
    ])
    ->from('pets as b')
    ->join('shuruis as r', 'b.shurui', '=', 'r.id')
    ->join('manufacturers as m', 'b.manufacturer', '=', 'm.id') // メーカー名を結合する
    ->orderBy('b.id', 'DESC')
    ->paginate(5);

    return view('index', compact('pets'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
}



    /**
     * Show the form for creating a new resource.
     */
    
     public function create()
{
    $shuruis = Shurui::all();
    $manufacturers = Manufacturer::all();

    // stock フィールドをビューに渡す
    return view('create', compact('shuruis', 'manufacturers'));
}

/**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:20',
        'kakaku' => 'required|integer',
        'stock' => 'required|integer',
        'shurui' => 'required|integer',
        'manufacturer' => 'required|integer',
        'shosai' => 'required|max:140',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // 画像のバリデーションを追加
    ]);

    $pet = new Pet;

    // 画像のアップロード処理
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('public/images'); // ファイルを保存
        $pet->image = str_replace('public/', '', $imagePath); // 画像のパスをデータベースに保存
       
    }

    // その他のデータを保存
    $pet->name = $request->input("name");
    $pet->kakaku = $request->input("kakaku");
    $pet->stock = $request->input("stock");
    $pet->shurui = $request->input("shurui");
    $pet->manufacturer = $request->input("manufacturer");
    $pet->shosai = $request->input("shosai");

    $pet->save();

    return redirect()->route('pets.index')->with('success', '文房具を登録しました');
}



    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
{
    $shuruis = Shurui::all();
    $manufacturers = Manufacturer::all(); // メーカー名の一覧を取得

    return view('show', compact('pet', 'shuruis', 'manufacturers'))
        ->with('page_id', request()->page_id)
        ->with('manufacturers', $manufacturers);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
{
    $shuruis = Shurui::all();
    $manufacturers = Manufacturer::all(); // メーカー名の一覧を取得

    return view('edit', compact('pet', 'shuruis', 'manufacturers'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
{
    // $pet が存在しない場合はエラーを返す
    if (!$pet) {
        return redirect()->route('pets.index')->with('error', '指定された文房具が見つかりません');
    }

    // ログに出力して確認
    \Log::info('Pet ID: ' . $pet->id);

    $request->validate([
        'name' => 'required|max:20',
        'kakaku' => 'required|integer',
        'stock' => 'required|integer',
        'shurui' => 'required|integer',
        'manufacturer' => 'required|integer',
        'shosai' => 'required|max:140',
        
    ]);

    $pet->name = $request->input('name');
    $pet->kakaku = $request->input('kakaku');
    $pet->stock = $request->input('stock');
    $pet->shurui = $request->input('shurui');
    $pet->shosai = $request->input('shosai');

    // メーカー名を更新
    $pet->manufacturer = $request->input('manufacturer');

    // ユーザー ID を保存する前に存在確認
    if (\Auth::user()) {
        $pet->user_id = \Auth::user()->id;
    }

    $pet->save();

    return redirect()->route('pets.index')->with('success', '文房具を更新しました');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();
return redirect()->route('pets.index')->with('success', '文房具' . $pet->name . 'を削除しました');

    }
}
