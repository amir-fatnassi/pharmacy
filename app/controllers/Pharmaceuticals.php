<?php
  class Pharmaceuticals extends Controller {
    public function __construct(){
      /* if(!isLoggedIn()){
        redirect('users/login');
      } */

      $this->pharmaceuticalModel = $this->model('Pharmaceutical');
      $this->userModel = $this->model('User');
    }

    public function index(){
      // Get pharmaceuticals
      $pharmaceuticals = $this->pharmaceuticalModel->getPharmaceuticals();

      $data = [
        'pharmaceuticals' => $pharmaceuticals
      ];

      $this->view('pharmaceuticals/index', $data);
    }

    public function add($range_id){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
        $data = [
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'img' => '',
          'user_id' => $_SESSION['user_id'],
          'range_id' => $range_id,
          'title_err' => '',
          'body_err' => '',
          'img_err' => '',
        ];
  
        $imgFile = $_FILES['img']['name'];
        $tmp_dir = $_FILES['img']['tmp_name'];
        $imgSize = $_FILES['img']['size'];    
  
        // Validate data
        if (empty($data['title'])) {
          $data['title_err'] = 'Please enter title';
        }
        if (empty($data['body'])) {
          $data['body_err'] = 'Please enter body text';
        }
        if (empty($imgFile)) {
          $data['img_err'] = 'Please select image file';
        } else {
  
          $upload_dir = UPLOADROOT . '/pharmaceuticals/'; // upload directory
  
          $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
  
          // valid image extensions
          $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
          // rename uploading image
          $data['img'] = rand(1000, 1000000) . "." . $imgExt;
  
          // allow valid image file formats
          if (in_array($imgExt, $valid_extensions)) {
            // Check file size '5MB'
            if ($imgSize < 50000000000) {
              move_uploaded_file($tmp_dir, $upload_dir . $data['img']);
            } else {
              $data['img_err'] = "Sorry, your file is too large.";
            }
          } else {
            $data['img_err'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          }
        }
  
        // Make sure no errors
        if (empty($data['title_err']) && empty($data['body_err']) && empty($data['img_err'])) {
          // Validated
          if ($this->pharmaceuticalModel->addPharmaceutical($data)) {
            flash('pharmaceutical_message', 'Pharmaceutical Added');
            redirect('pharmaceuticals');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('pharmaceuticals/add', $data);
        }
      } else {
        $data = [
          'title' => '',
          'body' => '',
          'img' => '',
          'range_id' => $range_id,
        ];
  
        $this->view('pharmaceuticals/add', $data);
      }
    }

    public function edit($id){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'id' => $id,
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
          'title_err' => '',
          'body_err' => ''
        ];

        // Validate data
        if(empty($data['title'])){
          $data['title_err'] = 'Please enter title';
        }
        if(empty($data['body'])){
          $data['body_err'] = 'Please enter body text';
        }

        // Make sure no errors
        if(empty($data['title_err']) && empty($data['body_err'])){
          // Validated
          if($this->pharmaceuticalModel->updatePharmaceutical($data)){
            flash('pharmaceutical_message', 'Pharmaceutical Updated');
            redirect('pharmaceuticals');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('pharmaceuticals/edit', $data);
        }

      } else {
        // Get existing pharmaceutical from model
        $pharmaceutical = $this->pharmaceuticalModel->getPharmaceuticalById($id);

        // Check for owner
        if($pharmaceutical->user_id != $_SESSION['user_id']){
          redirect('pharmaceuticals');
        }

        $data = [
          'id' => $id,
          'title' => $pharmaceutical->title,
          'body' => $pharmaceutical->body
        ];
  
        $this->view('pharmaceuticals/edit', $data);
      }
    }

    public function show($id){
      $pharmaceutical = $this->pharmaceuticalModel->getPharmaceuticalById($id);
      $user = $this->userModel->getUserById($pharmaceutical->user_id);

      $data = [
        'pharmaceutical' => $pharmaceutical,
        'user' => $user
      ];

      $this->view('pharmaceuticals/show', $data);
    }

    public function delete($id){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing pharmaceutical from model
        $pharmaceutical = $this->pharmaceuticalModel->getPharmaceuticalById($id);
        
        // Check for owner
        if($pharmaceutical->user_id != $_SESSION['user_id']){
          redirect('pharmaceuticals');
        }

        if($this->pharmaceuticalModel->deletePharmaceutical($id)){
          flash('pharmaceutical_message', 'Pharmaceutical Removed');
          redirect('pharmaceuticals');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('pharmaceuticals');
      }
    }
  }