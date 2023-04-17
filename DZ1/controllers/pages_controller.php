<?php
  class PagesController {
    public function home() {
      $first_name = 'Marko';
      $last_name  = 'Pavkovič';
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>