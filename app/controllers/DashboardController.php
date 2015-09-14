<?php

class DashboardController extends BaseController {

    public function index() {
        return View::make('admin.pages.dashboard', array('username' => Auth::user()->name));
    }
}
