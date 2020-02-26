<?php
class Ranges extends Controller
{
  public function __construct()
  {
    /* if (!isLoggedIn()) {
      redirect('users/login');
    } */

    $this->rangeModel = $this->model('Range');
    $this->pharmaceuticalModel = $this->model('Pharmaceutical');
    $this->userModel = $this->model('User');
  }

  public function index()
  {
    // Get ranges
    $ranges = $this->rangeModel->getRanges();
    $news = $this->pharmaceuticalModel->getPharmaceuticalsNew(4);
    $populars = $this->pharmaceuticalModel->getPharmaceuticalsPopular(8);

    $data = [
      'ranges' => $ranges,
      'news' => $news,
      'populars' => $populars
    ];

    $this->view('ranges/index', $data);
  }

  public function add()
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'img' => '',
        'user_id' => $_SESSION['user_id'],
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

        $upload_dir = UPLOADROOT . '/ranges/'; // upload directory

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
        if ($this->rangeModel->addRange($data)) {
          flash('range_message', 'Range Added');
          redirect('ranges');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('ranges/add', $data);
      }
    } else {
      $data = [
        'title' => '',
        'body' => '',
        'img' => ''
      ];

      $this->view('ranges/add', $data);
    }
  }

  public function edit($id)
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter title';
      }
      if (empty($data['body'])) {
        $data['body_err'] = 'Please enter body text';
      }

      // Make sure no errors
      if (empty($data['title_err']) && empty($data['body_err'])) {
        // Validated
        if ($this->rangeModel->updateRange($data)) {
          flash('range_message', 'Range Updated');
          redirect('ranges');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('ranges/edit', $data);
      }
    } else {
      // Get existing range from model
      $range = $this->rangeModel->getRangeById($id);

      // Check for owner
      if ($range->user_id != $_SESSION['user_id']) {
        redirect('ranges');
      }

      $data = [
        'id' => $id,
        'title' => $range->title,
        'body' => $range->body
      ];

      $this->view('ranges/edit', $data);
    }
  }

  public function show($id)
  {
    $range = $this->rangeModel->getRangeById($id);
    $pharmaceuticals = $this->pharmaceuticalModel->getPharmaceuticalsByRangeId($id);
    $user = $this->userModel->getUserById($range->user_id);

    $data = [
      'range' => $range,
      'user' => $user,
      'pharmaceuticals' => $pharmaceuticals
    ];

    $this->view('ranges/show', $data);
  }

  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Get existing Range from model
      $range = $this->rangeModel->getRangeById($id);

      // Check for owner
      if ($range->user_id != $_SESSION['user_id']) {
        redirect('ranges');
      }

      if ($this->rangeModel->deleteRange($id)) {
        flash('range_message', 'Range Removed');
        redirect('ranges');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('ranges');
    }
  }
}
