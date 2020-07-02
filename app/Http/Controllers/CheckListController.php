<?php

namespace App\Http\Controllers;

use App\CheckList;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Validation\Rule;

class CheckListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkLists = \Auth::user()->checkLists()->paginate(10);
        return view('check_list.index', compact('checkLists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('check_list.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('check_lists')->where(function ($query) {
                return $query->where('id', \Auth::user()->id);
        ]); */

        
        if (\Auth::user()->check_lists_limit <= \Auth::user()->checkLists()->count()) {
            flash(__('exceeded the checklists limit'))->error();
            return redirect()->route('check_lists.index');
        }
        $checkList = new \App\CheckList();
        $checkList->fill($request->all());
        $checkList->creator()->associate(\Auth::user());
        $checkList->save();
        flash(__('Added'))->success();
        return redirect()->route('check_lists.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CheckList  $checkList
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CheckList $checkList)
    {
        $this->authorize('update', $checkList);
        if (!$request->filter) {
            $checkListItems = $checkList->items()->paginate(10);
            return view('check_list.show', compact('checkListItems', 'checkList'));
        }
        $checkListItems = QueryBuilder::for(\App\CheckListItem::class)
                ->allowedFilters([AllowedFilter::exact('status')])
                ->where('check_list_id', $checkList->id)
                ->paginate(10);
        return view('check_list.show', compact('checkListItems', 'checkList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CheckList  $checkList
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CheckList $checkList)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CheckList  $checkList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CheckList $checkList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CheckList  $checkList
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckList $checkList)
    {
        $this->authorize('delete', $checkList);
        $checkList->delete();
        flash(__('Deleted'))->success();
        return redirect()->route('check_lists.index');
    }
}
