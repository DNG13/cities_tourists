<?php

namespace App\Http\Controllers;

use App\Tourist;
use Illuminate\Http\Request;

class TouristController extends Controller
{
    private $sortFields = [
        'first_name',
        'last_name'
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

        //form string of all visited cities by every tourists
        foreach ($tourists as $tourist) {
            $tourist->cities = '';
            $coma = false;
            foreach ($tourist->city as $cities) {
                $tourist->cities .= ($coma ? ', ' : '') . $cities->name . '(' . $cities->country .')';
                $coma = true;
            }
        }
        return view('public.touristsList', ['tourists' => $tourists, 'sort' => $this->prepareSort($request, $this->sortFields)]);
    }
}
