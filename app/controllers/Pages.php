<?php

class Pages extends Controller {
    public function __construct() {
        $this->postModel = $this->model('Post');
    }

    public function index() {

        $data = [
            'title' => 'Shareposts',
            'description' => 'A solid MVC framework'
        ];

        $this->view('pages/index', $data);


    }

    public function about() {

        $data = [
            'title' => 'About Us',
            'description' => 'An app'
        ];

        $this->view('pages/about', $data);


    }

}