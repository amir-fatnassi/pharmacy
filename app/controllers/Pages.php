<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      /* if(isLoggedIn()){
        redirect('ranges');
      } */

      $data = [
        'title' => 'Pharmacy',
        'description' => 'Simple social network built on the TraversyMVC PHP framework'
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'App to share posts with other users'
      ];

      $this->view('pages/about', $data);
    }
    
    public function faq(){
      $data = [
        'title' => 'FAQ',
        'description' => 'App to share posts with other users'
      ];

      $this->view('pages/faq', $data);
    }

    public function deals(){
      $data = [
        'title' => 'Deals',
        'description' => 'App to share posts with other users'
      ];

      $this->view('pages/deals', $data);
    }

    public function contactus(){
      $data = [
        'title' => 'Contact Us',
        'description' => 'App to share posts with other users'
      ];

      $this->view('pages/contactus', $data);
    }
  }