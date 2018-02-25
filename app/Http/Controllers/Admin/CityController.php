<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CityController extends Controller
{
    private $sortFields = [
        'id',
        'name',
        'country',
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
        $query = City::select('*')
            ->orderby($request->order_by ?? 'id', $request->order ?? 'asc');
        if (!empty($keyword)) {
            $query->where('name',  $keyword)
                ->orWhere('country',  $keyword);
        }
        $cities = $query->paginate(20);

        return view('admin.city.index', ['cities' => $cities, 'sort' => $this->prepareSort($request, $this->sortFields)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.city.create');
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
            'country' => 'required|max:255',
        ]);

        if(count($request->file) > 0) {
            $imageNames = [];
            $count = 0;
            foreach ($request->file as  $imageFile) {

                // upload file
                $imageName = uniqid() .  $imageFile->getClientOriginalName();
                $imageFile->move(public_path('uploads'), $imageName);
                $imagePath = public_path('uploads') . '/' . $imageName;
                $imageNames[$count] =  $imageName;

                // create Image from file
                $img = Image::make($imagePath);

                // resize image
                [$width, $height] = getimagesize($imagePath);
                if ($width <= $height) {
                    $img->resize(null, 200, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                } else {
                    $img->resize(200, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                $img->save();
                $count++;
            }
        }
        //save city to db
        $city = new City();
        $city->name = $request->get('name');
        $city->country = $request->get('country');
        $links = $imageNames ?? null;
        $city->links  = $links;
        $city->created_at = Carbon::now();
        $city->save();

        return redirect('admin/city');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::where('id', $id)->first();
        $links =  $city->links;
        return view('admin.city.show', compact('city', 'links'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::where('id', $id)->first();
        $links =  $city->links;
        return view('admin.city.edit', compact('city' , 'links'));
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
            'country' => 'required|max:255',
        ]);

        $city = City::where('id', $id)->first();
        $city->name = $request->get('name');
        $city->country = $request->get('country');

        if(count($request->file) > 0) {
            $imageNames = $city->links;
            $count = count($imageNames);
                foreach ($request->file as $imageFile) {

                    // upload file
                    $imageName = uniqid() . $imageFile->getClientOriginalName();
                    $imageFile->move(public_path('uploads'), $imageName);
                    $imagePath = public_path('uploads') . '/' . $imageName;
                    $imageNames[$count] = $imageName;

                    // create Image from file
                    $img = Image::make($imagePath);

                    // resize image
                    [$width, $height] = getimagesize($imagePath);
                    if ($width <= $height) {
                        $img->resize(null, 200, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    } else {
                        $img->resize(200, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    }
                    $img->save();
                    $count++;
                }
            }
        $links = $imageNames ?? null;
        if(!empty($links)) {
            $city->links = $links;
        }
        $city->created_at = Carbon::now();
        $city->save();
        return redirect('admin/city');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $city = City::where('id', $id)->first();
        $city->delete();
        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function citiesList()
    {
        $cities = City::get();
        foreach ($cities as $city) {
            $city->tourists = '';
            $coma = false;

            //form string of all tourist visited the city
            foreach ($city->tourist as $tourists) {
                $city->tourists .= ($coma ? ', ' : '') . $tourists->first_name . ' ' . $tourists->last_name;
                $coma = true;
            }
        }
        return view('admin.city.list', compact('cities'));
    }

    public function imageDelete(Request $request)
    {
        $id = $request->get('id');
        $getKey = $request->get('key');
        $getLink = $request->get('link');
        $city = City::where('id', $id)->first();

        // delete file
        if(is_file(public_path("/uploads/" . $getLink))) {
            unlink(public_path("/uploads/" .  $getLink));
        }

        // delete info about the file from db
        $cityLinks = $city->links;
        unset($cityLinks[$getKey]);
        $city->links = $cityLinks;
        $city->save();
        return redirect()->back();
    }
}
