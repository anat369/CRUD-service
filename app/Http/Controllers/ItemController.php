<?php

namespace App\Http\Controllers;

use App\History;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.index', [
            'items' => Item::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|max:255',
           'key' => 'required|max:25',
        ]);

        $item = Item::add($request->all());
        History::add([
            'item_id' => $item->id,
            'text' => History::setText($item),
        ]);

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.show',[
            'item' => Item::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.edit', [
           'item' => Item::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'key' => 'required|max:25',
        ]);
        $item = Item::find($id);
        $item->edit($request->all());

        History::edit($item);

        return redirect()->route('index');
    }

    /**
     * При удалении удаляем историю изменений товара и сам товар
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $history = History::where('item_id', '=', $id)->first();
        $history->remove();
        Item::find($id)->remove();

        return redirect()->route('index');
    }
}
