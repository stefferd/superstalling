<?php

class SubscriberController extends BaseController {

    public function index() {
        $subscribers = Subscribers::all();
        return View::make('admin.pages.subscriber.index')->with(['subscribers' => $subscribers]);
    }

    public function create() {
        $rules = array(
            'email' => 'required|email'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::route('admin.subscriber.index')->withErrors($validator)->With(Input::all());
        } else {
            $subscriber = new Subscribers;
            $subscriber->name = Input::get('name');
            $subscriber->email = Input::get('email');
            $subscriber->active = 1;

            if ($subscriber->save()) {
                return Redirect::route('admin.subscriber.index')->with('success', Lang::get('messages.subscriber_created'));
            } else {
                return Redirect::route('admin.subscriber.index')->with('success', Lang::get('messages.subscriber_created'));
            }
        }
        return Redirect::route('admin.newsletter.index')->with('success', Lang::get('messages.newsletter_created'));
    }

    public function delete($id) {
        Subscribers::destroy($id);

        return Redirect::route('admin.subscriber.index')->with('success', Lang::get('messages.subscriber_delete'));
    }
}
