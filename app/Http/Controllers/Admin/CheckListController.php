<?php

namespace App\Http\Controllers\Admin;

use App\CheckList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkLists = CheckList::orderby('name')->paginate(10);
        return view('admin.check_list.index', compact('checkLists'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CheckList  $checkList
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CheckList $checkList)
    {
        $checkListItems = $checkList->items()->paginate(10);
        return view('admin.check_list.show', compact('checkListItems', 'checkList'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CheckList  $checkList
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckList $checkList)
    {
        $checkList->delete();
        flash(__('Deleted'))->success();
        return redirect()->route('check_lists.index');
    }
}
