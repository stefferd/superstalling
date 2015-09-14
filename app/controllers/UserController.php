<?php

class UserController extends BaseController {

    public function index() {
        $users = User::all();
        return View::make('admin.pages.users.index')->with(['users' => $users]);
    }

    public function edit($id) {
        $user = User::find($id);
        return View::make('admin.pages.users.edit')->with(['user' => $user]);
    }

    public function add() {
        return View::make('admin.pages.users.create');
    }

    public function create() {
        $rules = array(
            'email' => 'required|email',
            'name' => 'required|min:3',
            'password' => 'required|alphaNum|min:3|confirmed',
            'level' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::route('admin.users.new')->withErrors($validator)->With(Input::all());
        } else {
            $user = new User;
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->level = Input::get('level');

            if ($user->save()) {
                return Redirect::route('admin.users.index')->with('success', Lang::get('messages.user_created'));
            }
        }
        return Redirect::route('admin.users.index')->with('success', Lang::get('messages.user_created'));
    }

    public function update($id) {
        $rules = array(
            'email' => 'required|email',
            'name' => 'required|min:3',
            'level' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::route('admin.user.edit', array('id' => $id))->withErrors($validator)->With(Input::all());
        } else {
            $user = User::find($id);
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->level = Input::get('level');

            if ($user->save()) {
                return Redirect::route('admin.users.index')->with('success', Lang::get('messages.user_update'));
            }
        }
        return Redirect::route('admin.users.index')->with('success', Lang::get('messages.user_update'));
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();

        return Redirect::route('admin.users.index')->with('success', Lang::get('messages.user_delete'));
    }
}
