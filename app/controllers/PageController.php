<?php

class PageController extends BaseController {

    public function index() {
        $pages = Page::all();
        return View::make('admin.pages.pages.index')->with(['pages' => $pages]);
    }

    public function edit($id) {
        $page = Page::find($id);
        return View::make('admin.pages.pages.edit')->with(['page' => $page]);
    }

    public function add() {
        return View::make('admin.pages.pages.create');
    }

    public function create() {
        $rules = array(
            'title' => 'required|min:3',
            'content' => 'required|min:3',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::route('admin.pages.new')->withErrors($validator)->With(Input::all());
        } else {
            $page = new Page;
            $page->title = Input::get('title');
            $page->content = Input::get('content');
            $page->active = Input::get('active') ? 1 : 0;
            $page->keywords = Input::get('keywords');
            $page->type = Input::get('type');
            $page->description = Input::get('description');
            $page->user_id = Auth::user()->id;

            if ($page->save()) {
                return Redirect::route('admin.pages.index')->with('success', Lang::get('messages.page_created'));
            }
        }
        return Redirect::route('admin.pages.index')->with('success', Lang::get('messages.page_created'));
    }

    public function update($id) {
        $rules = array(
            'title' => 'required|min:3',
            'content' => 'required|min:3',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::route('admin.pages.edit', array('id' => $id))->withErrors($validator)->With(Input::all());
        } else {
            $page = Page::find($id);
            $page->title = Input::get('title');
            $page->content = Input::get('content');
            $page->active = Input::get('active');
            $page->keywords = Input::get('keywords');
            $page->type = Input::get('type');
            $page->description = Input::get('description');
            $page->user_id = Auth::user()->id;

            if ($page->save()) {
                return Redirect::route('admin.pages.index')->with('success', Lang::get('messages.page_update'));
            }
        }
        return Redirect::route('admin.pages.index')->with('success', Lang::get('messages.page_update'));
    }

    public function delete($id) {
        $page = Page::find($id);
        $page->delete();

        return Redirect::route('admin.pages.index')->with('success', Lang::get('messages.page_delete'));
    }
}
