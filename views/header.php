<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Hello, world!</title>
    <link rel="stylesheet" href="http://localhost/php/views/styles.css">
  </head>
  <body>



  
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/php/">Tweet</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?page=timeline">Timeline</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=yourtweets">your tweets</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link " href="?page=publicprofile" >public profiles</a>
        </li>
      </ul>
      <div class="form-inline pull-xs-right">

        <?php if(isset($_SESSION['id'])){ ?>

          <a class="btn btn-outline-success" href="?function=logout">Logout</a>
        <?php }else{ ?>

          <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#exampleModal">Login/Signup</button>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>