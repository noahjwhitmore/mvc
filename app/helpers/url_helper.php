<?php

// Simple page redirect
function redirect($page) {
    // User registration was successful, redirect to login page
    header('location: ' . URL_ROOT . '/' . $page);
}