<?php

class FrontController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
        $page = Page::find(1);
        $news = News::with('user')->orderBy('created_at', 'desc')->first();
		return View::make('front.pages.index')->with(['page' => $page, 'news' => $news]);
	}

    public function page($pageName) {
        $page = Page::where('slug', 'LIKE', $pageName)->first();
        return View::make('front.pages.page')->with(['page' => $page]);
    }

    public function subscribe() {
        $rules = array(
            'email' => 'required|email|min:3'
        );

        $alreadyTaken = Subscribers::where('email', Input::get('email'))->count();
        $validator = Validator::make(Input::all(), $rules);
        if (!$validator->fails() && $alreadyTaken !== 1) {
            $subscriber = new Subscribers;
            $subscriber->name = Input::get('name');
            $subscriber->email = Input::get('email');
            $subscriber->save();
        }
        return Redirect::route('front.inventory')->with('success','You have been subscribed to our newsletter.');
    }

    public function contact() {
        $rules = array(
            'name' => 'required|min:3',
            'email' => 'required|email|min:3',
            'message' => 'required|min:10'
        );

        $slug = 'contact';
        $page = Page::where('slug', 'LIKE', $slug)->first();

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return View::make('front.pages.page')->withErrors($validator)->With(Input::all())->with(['page' => $page]);
        } else {
            $settingsEmail = Settings::where('key', '=', 'contact_email')->first();
            $settingsEmailName = Settings::where('key', '=', 'contact_name')->first();
            $data = array(
                'subject' => 'Contact form superstalling.nl',
                'to' => $settingsEmail->value,
                'to_name' => $settingsEmailName->value,
                'from_message' => Input::get('message'),
                'from_name' => Input::get('name'),
                'from' => Input::get('email')
            );
            Mail::send('emails.front.contact', $data, function($message) use ($data)
            {
                $message->to($data['to'], $data['to_name'])
                    ->from($data['from'], $data['from_name'])
                    ->subject($data['subject']);
            });
            return View::make('front.pages.page')->with(['page' => $page, 'message' => 'Mail send successfully']);
        }
    }

    public function offer() {
        $slug = 'offerte-aanvragen';
        $page = Page::where('slug', 'LIKE', $slug)->first();
        return View::make('front.pages.offer')->with(['page' => $page]);
    }

    public function sendOffer() {
        $slug = 'offerte-aanvragen';
        $page = Page::where('slug', 'LIKE', $slug)->first();

        $rules = array(
            'name' => 'required|min:3',
            'street' => 'required|min:3',
            'zipcode' => 'required|min:3',
            'city' => 'required|min:3',
            'email' => 'required|min:3',
            'phone' => 'required|min:3',
            'boat_length' => 'required|min:1',
            'boat_width' => 'required|min:1',
            'storage' => 'required|min:3',
            'total' => 'required|min:1'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::route('front.offer')->withErrors($validator)->With(Input::all());
        } else {
            $offer = new Offers;
            $offer->name = Input::get('name');
            $offer->street = Input::get('street');
            $offer->zipcode = Input::get('zipcode');
            $offer->city = Input::get('city');
            $offer->phone = Input::get('phone');
            $offer->email = Input::get('email');
            $offer->boat = Input::get('boat');
            $offer->storage = Input::get('storage');
            $offer->boat_length = Input::get('boat_length');
            $offer->boat_width = Input::get('boat_width');
            $offer->home_service = Input::get('home_service');
            $offer->home_service_km = Input::get('home_service_km');
            $offer->battery_service = Input::get('battery_service');
            $offer->outside_motor = Input::get('outside_motor');
            $offer->winter_ready = Input::get('winter_ready');
            $offer->repair_silo = Input::get('repair_silo');
            $offer->storage_period = Input::get('storage_period');
            $offer->storage_start = Input::get('storage_start');
            $offer->remarks = Input::get('remarks');
            $offer->total = Input::get('total');

//            dd($offer);
            if ($offer->save()) {
                return View::make('front.pages.offer')->with(['page' => $page, 'message' => 'Offerte is aangevraagt, bedankt voor uw interesse wij nemen zo snel mogelijk contact met u op.']);
            }
        }
    }

    public function inventory() {
        Session::flush();
        $entries = Catalog::with('car')->join('cars', 'catalog.id', '=', 'cars.id')->orderBy('catalog.created_at', 'desc')->where('cars.status', '<>', 'Sold')->get();
        $page = Page::where('type', '=', 3)->where('title', '=', 'Inventory')->firstOrFail();
        $brandsForFilter = DB::table('cars')->distinct('brand')->where('status', '<>', 'Sold')->lists('brand');
        return View::make('front.pages.inventory', compact('entries', 'page', 'brandsForFilter'));
    }

    public function sold() {
        Session::flush();
        $entries = Catalog::with('car')->join('cars', 'catalog.id', '=', 'cars.id')->orderBy('catalog.created_at', 'desc')->where('cars.status','=', 'Sold')->get();
        $page = Page::where('type', '=', 3)->where('title', '=', 'Sold')->firstOrFail();
        $brandsForFilter = DB::table('cars')->distinct('brand')->where('status', '=', 'Sold')->lists('brand');
        return View::make('front.pages.inventory', compact('entries', 'page', 'brandsForFilter'));
    }

    public function filter($filter = null, $value = null) {
        if ($filter != null) {
            $value = str_replace('-', ' ', $value);
            if ($filter === 'brand') {
                Session::forget('filter.brand');
                Session::push('filter.brand', $value);
            } else if ($filter === 'transmission') {
                Session::forget('filter.transmission');
                Session::push('filter.transmission', $value);
            }
        } else {
            if (Input::get('brand')) {
                Session::forget('filter.brand');
                Session::push('filter.brand', Input::get('brand'));
            }
            if (Input::get('transmission')) {
                Session::forget('filter.transmission');
                Session::push('filter.transmission', Input::get('transmission'));
            }
        }

        if (Session::has('filter')) {
            if (Session::has('filter.brand') && Session::has('filter.transmission')) {
                $entries = Catalog::whereHas('car', function($query) {
                    $query->where('transmission', 'like', Session::get('filter.transmission'))
                        ->where('brand', 'like', Session::get('filter.brand'));
                })->orderBy('created_at', 'desc')->get();
            } else {
                if (Session::has('filter.brand')) {
                    $entries = Catalog::whereHas('car', function($query) {
                        $query->where('brand', 'like', Session::get('filter.brand'));
                    })->orderBy('created_at', 'desc')->get();
                } else {
                    $entries = Catalog::whereHas('car', function($query) {
                        $query->where('transmission', 'like', Session::get('filter.transmission'));
                    })->orderBy('created_at', 'desc')->get();
                }
            }
        } else {
            $entries = Catalog::with('car')->orderBy('created_at', 'desc')->get();
        }

        $page = Page::where('type', '=', 3)->firstOrFail();
        if (Session::has('filter.transmission')) {
            $brandsForFilter = DB::table('cars')->distinct('brand')->where('transmission', Session::get('filter.transmission.0'))->lists('brand');
        } else {
            $brandsForFilter = DB::table('cars')->distinct('brand')->lists('brand');
        }

        return View::make('front.pages.inventory-filtered')->with(['entries' => $entries, 'page' => $page, 'filters' => Session::get('filter'), 'brandsForFilter' => $brandsForFilter]);
    }

    public function details($id) {
        $entry = Catalog::find($id);
        $page = Page::where('type', '=', 3)->firstOrFail();
        return View::make('front.pages.details')->with(['entry' => $entry, 'page' => $page]);
    }

    public function unsubscribe($user) {
        Subscribers::destroy($user);
        echo 'You have been unsubscribed to this newsletter. We\'ve removed your subcription from our database';
        return Redirect::route('front.index');
    }

    public function detailsContact($id) {
        $rules = array(
            'name' => 'required|min:3',
            'email' => 'required|email|min:3',
            'message' => 'required|min:10'
        );
        $page = Page::where('type', '=', 3)->first();
        $entry = Catalog::find($id);

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return View::make('front.pages.details')->withErrors($validator)->with(Input::all())->with(['entry' => $entry, 'page' => $page]);
        } else {
            $settingsEmail = Settings::where('key', '=', 'contact_email')->first();
            $settingsEmailName = Settings::where('key', '=', 'contact_name')->first();
            $data = array(
                'subject' => 'Inventory contact Classiccarseurope.eu',
                'to' => $settingsEmail->value,
                'to_name' => $settingsEmailName->value,
                'from_message' => Input::get('message'),
                'from_name' => Input::get('name'),
                'from' => Input::get('email'),
                'phone' => Input::get('phone')
            );
            Mail::send('emails.front.contact', $data, function($message) use ($data)
            {
                $message->to($data['to'], $data['to_name'])
                    ->from($data['from'], $data['from_name'])
                    ->subject($data['subject']);
            });
            return View::make('front.pages.details')->with(['entry' => $entry, 'page' => $page, 'message' => 'Mail send successfully']);
        }
    }


}
