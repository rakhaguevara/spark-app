<?php

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SPARK | Home'
        ];
        
        $this->view('home', $data);
    }
}
