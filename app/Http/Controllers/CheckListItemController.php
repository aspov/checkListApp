<?php

namespace App\Http\Controllers;

use App\CheckList;
use App\CheckListItem;
use Illuminate\Http\Request;

class CheckListItemController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\CheckList  $checkList
     * @return \Illuminate\Http\Response
     */
    public function store(CheckList $checkList)
    {
        $this->authorize('update', $checkList);
        $item = new CheckListItem();
        $checkList->items()->save($item);
        return redirect()->route('check_lists.show', $checkList);
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
        $this->authorize('update', $checkListItem);
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
        $this->authorize('delete', $checkListItem);
        $checkListItem->delete();
        flash(__('Deleted'))->success();
        return redirect()->route('check_lists.show', $checkList);
    }
}
