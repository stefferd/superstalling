<?php

class OfferController extends BaseController {

    public function index() {
        $settings = Settings::all();
        return View::make('admin.pages.offer.index')->with(['settings' => $settings]);
    }

    public function edit($id) {
        $setting = Settings::find($id);
        return View::make('admin.pages.offer.edit')->with(['setting' => $setting]);
    }

    public function update($id) {
        $rules = array(
            'value' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::route('admin.offer.edit', array('id' => $id))->withErrors($validator)->With(Input::all());
        } else {
            $setting = Settings::find($id);
            $setting->value = Input::get('value');


            if ($setting->save()) {
                return Redirect::route('admin.offer.index')->with('success', Lang::get('messages.settings_update'));
            }
        }
        return Redirect::route('admin.offer.index')->with('success', Lang::get('messages.settings_update'));
    }
}
