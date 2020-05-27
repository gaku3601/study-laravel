<?php

namespace App\Http\Controllers;

use App\Example;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Eloquent ORM(Objet[Example]を元に操作)
        // $data = Example::all(); 全件取得
        // $data = Example::find(25); 単票取得
        // $data = Example::orderBy('id','desc')->get(); // orderby
        // Example::insert(['name' => $object]); // insert処理

        // QueryBuilder(DB Facadesを利用し操作)
        // $data = DB::selectOne("SELECT * FROM examples WHERE id = ? ORDER BY id DESC",[2]); // 単票取得
        // $data = DB::select("SELECT * FROM examples WHERE id = ? ORDER BY id DESC",[2]); // Collection取得
        abort(404, '無効なURLです。');
        $data = DB::select("SELECT * FROM examples ORDER BY id DESC"); // Collection取得
        return view('examples.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('examples.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $object = $request->input('test');
        Example::insert([
            'name' => $object
        ]);
        logger(print_r($object, true));
        return response()->json([
            'name' => $object
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $data = DB::selectOne("SELECT * FROM examples WHERE id = ? ORDER BY id DESC",[$id]); // 単票取得
        return view('examples.show', ['id' => $id, 'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = DB::selectOne("SELECT * FROM examples WHERE id = ? ORDER BY id DESC",[$id]); // 単票取得
        return view('examples.edit', [
            'id' => $id,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $object = $request->input('test');
        logger(print_r($object, true));
        logger(print_r($id, true));
        Example::where('id', $id)->update([
            'name' => $object
        ]);
        return response()->json([
            'name' => $object
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Example::where('id', $id)->delete();
        return response()->json([
            'success' => $id
        ]);
    }
}
