<?php

namespace App\Http\Controllers;

use App\CheckList;
use App\CheckListItem;
use Illuminate\Http\Request;

class CheckListItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\CheckList  $checkList
     * @return \Illuminate\Http\Response
     */
    public function index(CheckList $checkList)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\CheckList  $checkList
     * @return \Illuminate\Http\Response
     */
    public function create(CheckList $checkList)
    {
        $item = new CheckListItem();
        $checkList->items()->save($item);
        $checkList->save();
        return redirect()->route('check_lists.show', $checkList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CheckList  $checkList
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CheckList $checkList)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CheckList  $checkList
     * @param  \App\CheckListItem  $checkListItem
     * @return \Illuminate\Http\Response
     */
    public function show(CheckList $checkList, CheckListItem $checkListItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CheckList  $checkList
     * @param  \App\CheckListItem  $checkListItem
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckList $checkList, CheckListItem $checkListItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CheckList  $checkList
     * @param  \App\CheckListItem  $checkListItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CheckList $checkList, CheckListItem $checkListItem)
    {
        #dd($request->all());
        $checkListItem->text = $request->text;
        $checkListItem->status = $request->status ?? false;
        $checkListItem->save();
        flash(__('Saved'))->success();
        return redirect()->route('check_lists.show', $checkList);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CheckList  $checkList
     * @param  \App\CheckListItem  $checkListItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckList $checkList, CheckListItem $checkListItem)
    {
        $checkListItem->delete();
        flash(__('Deleted'))->success();
        return redirect()->route('check_lists.show', $checkList);
    }
}
