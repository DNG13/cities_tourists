<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private $sortFields = [
        'name',
        'country'
    ];

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $query = City::select('*')
            ->orderby($request->order_by ?? 'id', $request->order ?? 'asc');
        if (!empty($keyword)) {
            $query->where(function($q) use ($keyword) {
                $q->where('name',  $keyword)
                    ->orWhere('country',  $keyword);
            });
        }
        $cities = $query->paginate(20);

        return view('public.citiesList', ['cities' => $cities, 'sort' => $this->prepareSort($request, $this->sortFields)]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $city = City::where('id', $id)->first();
        $links =  $city->links;
        return view('public.cityShow', compact('city', 'links'));
    }
}
