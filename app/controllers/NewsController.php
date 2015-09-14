<?php

class NewsController extends BaseController {

    public function index() {
        $news = News::all();
        return View::make('admin.pages.news.index')->with(['news' => $news]);
    }

    public function edit($id) {
        $news = News::find($id);
        return View::make('admin.pages.news.edit')->with(['page' => $news]);
    }

    public function add() {
        return View::make('admin.pages.news.create');
    }

    public function create() {
        $rules = array(
            'title' => 'required|min:3',
            'content' => 'required|min:3',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::route('admin.news.create')->withErrors($validator)->With(Input::all());
        } else {
            $news = new News;
            $news->title = Input::get('title');
            $news->content = Input::get('content');
            $news->active = Input::get('active');
            $news->user_id = Auth::user()->id;

            if ($news->save()) {
                return Redirect::route('admin.news.index')->with('success', Lang::get('messages.news_created'));
            }
        }
        return Redirect::route('admin.news.index')->with('success', Lang::get('messages.news_created'));
    }

    public function update($id) {
        $rules = array(
            'title' => 'required|min:3',
            'content' => 'required|min:3',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::route('admin.news.edit', array('id' => $id))->withErrors($validator)->With(Input::all());
        } else {
            $news = News::find($id);
            $news->title = Input::get('title');
            $news->content = Input::get('content');
            $news->active = Input::get('active');
            $news->user_id = Auth::user()->id;

            if ($news->save()) {
                return Redirect::route('admin.news.index')->with('success', Lang::get('messages.news_update'));
            }
        }
        return Redirect::route('admin.news.index')->with('success', Lang::get('messages.news_update'));
    }

    public function delete($id) {
        $news = News::find($id);
        $news->delete();

        return Redirect::route('admin.news.index')->with('success', Lang::get('messages.news_delete'));
    }
}
