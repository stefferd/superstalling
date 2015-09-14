<?php

class CatalogController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $items = Catalog::join('cars', 'catalog.id', '=', 'cars.id')->orderBy('cars.status', 'ASC')->orderBy('catalog.created_at', 'desc')->get();
        return View::make('admin.pages.catalog.index')->with(['items' => $items]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.pages.catalog.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = Input::all();

        $catalog = new Catalog;
        $catalog->title = $inputs['title'];
        $catalog->description = $inputs['description'];
        $catalog->user_id = Auth::user()->id;
        $catalog->save();

        $car = new Car;
        $car->brand = $inputs['brand'];
        $car->engine = $inputs['engine'];
        $car->make = $inputs['make'];
        $car->milage = $inputs['milage'];
        $car->type = $inputs['type'];
        $car->transmission = $inputs['transmission'];
        $car->status = $inputs['status'];
        $car->location = $inputs['location'];
        $car->price = $inputs['price'];
        $car->youtube = $inputs['youtube'];
        $car->main_pic = 0;
        $car->user_id = Auth::user()->id;
        $car->catalog_id = $catalog->id;
        $car->save();

        $pictures = $inputs['pictures'];
        Log::info(user_photo_path() . $catalog->id . '/');
        if (!File::isDirectory(user_photo_path() . $catalog->id . '/')) {
            File::makeDirectory(user_photo_path() . $catalog->id . '/', 0777, true, true);
        }
        if (Input::hasFile('pictures[]')) {
            foreach($pictures as $picture) {
                if ($picture != null) {
                    $image = Image::make($picture->getRealPath());
                    $fileName = str_replace(' ', '_', strrolower($picture->getClientOriginalName()));
                    $image->resize(1024, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                        ->save(user_photo_path() . $catalog->id . '/' . $fileName)
                        ->resize(750, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(user_photo_path() . $catalog->id . '/' . '750-' . $fileName)
                        ->resize(500, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(user_photo_path() . $catalog->id . '/' . '500-' . $fileName)
                        ->resize(250, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(user_photo_path() . $catalog->id . '/' . '250-' . $fileName);

                    $pic = new Pictures;
                    $pic->url = $fileName;
                    $pic->user_id = Auth::user()->id;
                    $pic->catalog_id = $catalog->id;
                    $pic->type = 'catalog';
                    $pic->save();
                }
            }
        }
        return Redirect::route('admin.catalog.index')->with('success', Lang::get('messages.catalog_created'));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$item = Catalog::find($id);

        return View::make('admin.pages.catalog.edit')->with(array('item' => $item));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $inputs = Input::all();

        $catalog = Catalog::find($id);
        $catalog->title = $inputs['title'];
        $catalog->description = $inputs['description'];
        $catalog->user_id = Auth::user()->id;
        $catalog->save();

        $car = $catalog->car;
        if (empty($car)) {
            $car = new Car;
        } else {
            $car = Car::find($catalog->car->id);
        }
        $car->brand = $inputs['brand'];
        $car->engine = $inputs['engine'];
        $car->make = $inputs['make'];
        $car->milage = $inputs['milage'];
        $car->type = $inputs['type'];
        $car->transmission = $inputs['transmission'];
        $car->status = $inputs['status'];
        $car->location = $inputs['location'];
        $car->price = $inputs['price'];
        $car->youtube = $inputs['youtube'];
        $car->main_pic = $inputs['main_pic'];

        $car->user_id = Auth::user()->id;
        $car->catalog_id = $catalog->id;
        $car->save();

        $pictures = $inputs['pictures'];
        if (!File::isDirectory(user_photo_path() . $catalog->id . '/')) {
            File::makeDirectory(user_photo_path() . $catalog->id . '/', 0777, true, true);
        }
        if (isset($pictures) && count($pictures) > 0) {
            foreach($pictures as $picture) {
                if ($picture != null) {
                    $fileName = str_replace(' ', '_', strtolower($picture->getClientOriginalName()));
                    $image = Image::make($picture->getRealPath());
                    $image->resize(1024, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                        ->save(user_photo_path() . $catalog->id . '/' . $fileName)
                        ->resize(750, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(user_photo_path() . $catalog->id . '/' . '750-' . $fileName)
                        ->resize(500, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(user_photo_path() . $catalog->id . '/' . '500-' . $fileName)
                        ->resize(250, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(user_photo_path() . $catalog->id . '/' . '250-' . $fileName);
                    $pic = new Pictures;
                    $pic->url = $fileName;
                    $pic->user_id = Auth::user()->id;
                    $pic->catalog_id = $catalog->id;
                    $pic->type = 'catalog';
                    $pic->save();
                }
            }
        }
        return Redirect::route('admin.catalog.index')->with('success', Lang::get('messages.catalog_updated'));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$catalog = Catalog::find($id);
        $car = Car::find($catalog->car->id);

        $catalog->delete();
        $car->delete();

        return Redirect::route('admin.catalog.index')->with('success', Lang::get('messages.catalog_delete'));
	}

    public function deleteImage($id) {
        $picture = Pictures::find($id);
        $picture->delete();

        return Redirect::route('admin.catalog.index')->with('success', Lang::get('messages.catalog_picture_delete'));
    }

}
