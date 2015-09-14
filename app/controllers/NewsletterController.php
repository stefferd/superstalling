<?php

class NewsletterController extends BaseController {

    public function index() {
        $newsletter = Newsletter::all();
        return View::make('admin.pages.newsletter.index')->with(['newsletter' => $newsletter]);
    }

    public function add($catalog_id) {
        $catalog = Catalog::find($catalog_id);
        return View::make('admin.pages.newsletter.create')->with(['catalog' => $catalog]);
    }

    public function create($catalog_id) {
        $rules = array(
            'images' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::route(array('admin.newsletter.create', $catalog_id))->withErrors($validator)->With(Input::all());
        } else {
            $catalog = Catalog::find($catalog_id);
            $pictures = $catalog->pictures;
            $car = $catalog->car;
            $images = Input::get('images');
            $newsletter = new Newsletter;
            $newsletter->title = $catalog->title;
            $newsletter->images = $images;
            $newsletter->send_to = 0;
            $newsletter->user_id = Auth::user()->id;
            $newsletter->catalog_id = $catalog_id;
            $newsletter->save();

            $settingsEmail = Settings::where('key', '=', 'contact_email')->first();
            $settingsEmailName = Settings::where('key', '=', 'contact_name')->first();

            // Subscribers::find(8001) for testing
            $subscribers = Subscribers::all();
            foreach($subscribers as $subscriber) {
                $data = array(
                    'subject' => $catalog->title,
                    'to' => $subscriber->email,
                    'to_name' => $subscriber->name,
                    'from_name' => $settingsEmailName->value,
                    'from' => $settingsEmail->value,
                    'catalog' => $catalog,
                    'images' => $images,
                    'car' => $car,
                    'pictures' => $pictures,
                    'user' => $subscriber
                );
                Mail::queue('emails.newsletter.html', $data, function($message) use ($data)
                {
                    $message->to($data['to'], $data['to_name'])->from($data['from'], $data['from_name'])->subject($data['subject']);
                });
            }

            return Redirect::route('admin.newsletter.index')->with('success', Lang::get('messages.newsletter_created'));
        }
        return Redirect::route('admin.newsletter.index')->with('success', Lang::get('messages.newsletter_created'));
    }

    public function delete($id) {
        Newsletter::destroy($id);

        return Redirect::route('admin.newsletter.index')->with('success', Lang::get('messages.newsletter_delete'));
    }
}
