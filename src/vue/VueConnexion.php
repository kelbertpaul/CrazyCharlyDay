<?php

namespace CrazyCharlyDay\vue;

class VueConnexion {
    public $selector;
    public function __construct($sel) {
    $this->selector = $sel;
    }
    public function formulaireCo() {
    $html =
            <<<END
            <html lang="en">
                    <head>
                      <meta charset="utf-8">
                      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                      <meta name="description" content="">
                      <meta name="author" content="">
                      <title>Bare - Start Bootstrap Template</title>
                      <!-- Bootstrap core CSS -->
                      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                    </head>
                    <body>
                      <!-- Navigation -->
                      <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
                        <div class="container">
                          <a class="navbar-brand" href="#">Start Bootstrap</a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ml-auto">
                              <li class="nav-item active">
                                <a class="nav-link" href="#">Home
                                  <span class="sr-only">(current)</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Services</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </nav>
                      <!-- Page Content -->
                      <div class="container">
                        <form>
                          <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- Bootstrap core JavaScript -->
                      <script src="vendor/jquery/jquery.slim.min.js"></script>
                      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                    </body>
                    </html>
    END;
    }

    public function render() {
        if ($this->selector == "CONNEXION") {
            $this->formulaireCo();
            echo $this->html;
        }
    }
}