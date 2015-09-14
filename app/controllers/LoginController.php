<?php
/**
 * Created by PhpStorm.
 * User: stefvandenberg
 * Date: 06/11/14
 * Time: 16:58
 */

class LoginController extends BaseController {

    public function login() {
        return View::make('admin.pages.login');
    }

    public function authenticate() {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::route('admin.login')->withErrors($validator)->With(Input::except('password'));
        } else {
            $userData = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            if (Auth::attempt($userData)) {
                return Redirect::route('admin.dashboard.index');
            } else {
                return Redirect::route('admin.login');
            }
        }
    }

    public function logout() {
        Auth::logout();
        return Redirect::route('admin.login');
    }

} 