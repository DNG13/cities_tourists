<?php

namespace App\Http\Controllers\Admin;

use App\Tourist;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TouristController extends Controller
{
    private $sortFields = [
        'id',
        'first_name',
        'last_name',
        'birthday',
        'created_at',
        'updated_at'
    ];

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $query = Tourist::select('*')
            ->orderby($request->order_by ?? 'id', $request->order ?? 'asc');
        if (!empty($keyword)) {
            $query->where(function($q) use ($keyword) {
                $q->where('first_name',  $keyword)
                    ->orWhere('last_name',  $keyword);
            });
        }
        $tourists = $query->paginate(20);
        return view('admin.tourist.index', ['tourists' => $tourists, 'sort' => $this->prepareSort($request, $this->sortFields)]);

//        $tourists = Tourist::orderBy('id')->get();
//
//        return view('admin.tourist.index', compact('tourists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tourist.create');
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'birthday' => 'required',
        ]);

        // save tourist to db
        $tourist = new Tourist();
        $tourist->first_name = $request->get('first_name');
        $tourist->last_name = $request->get('last_name');
        $tourist->birthday = $request->get('birthday');
        $tourist->created_at = Carbon::now();
        $tourist->save();
        return redirect('admin/tourist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tourist = Tourist::where('id', $id)->first();

        return view('admin.tourist.show', compact('tourist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tourist = Tourist ::where('id', $id)->first();

        return view('admin.tourist.edit', compact('tourist'));
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'birthday' => 'required',
        ]);

        // update tourist in db
        $tourist  = Tourist::where('id', $id)->first();
        $tourist->first_name = $request->get('first_name');
        $tourist->last_name = $request->get('last_name');
        $tourist->birthday = $request->get('birthday');
        $tourist->updated_at = Carbon::now();
        $tourist->save();

        return redirect('admin/tourist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tourist::where('id', $id)->delete();

        return redirect()->back();
    }

    public function touristsList()
    {
        $tourists = Tourist::get();
        foreach ($tourists as $tourist) {
            $tourist ->number = $tourist->city->count();
        }
        return view('admin.tourist.list', compact('tourists'));
    }
}
