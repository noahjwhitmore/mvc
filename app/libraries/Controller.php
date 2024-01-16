<?php

// Base controller
// Loads the models and views
class Controller {

    protected $postModel;

    // Load model
    public function model($model) {
        // Require the model file
        require_once '../app/models/' . $model . '.php';

        // Instantiate the model
        return new $model;
    }

    // Load view
    public function view($view, $data = []) {
        // If view file exists
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            // View doesn't exist
            die('View does not exist');
        }
    }
}