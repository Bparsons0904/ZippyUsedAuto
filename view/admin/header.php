<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Zippy Used Auto</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../styles/css/style.min.css" />
    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://kit.fontawesome.com/1691b24dfc.js"
      crossorigin="anonymous"
    ></script>
    <script src="../../js/script.js"></script>
  </head>

  <!-- Admin Navigation Header -->
  <nav class="navbar navbar-expand-lg navbar-custom" id="admin-nav">
  <h4 class="navbar-brand">Zippy Used Auto</h4>
  <button
    class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-target="#navbarNavDropdown"
    aria-controls="navbarNavDropdown"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <i class="fa fa-bars fa-sm py-1 text-white"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <form method="POST" id="admin-control">
      <input type="hidden" name="action" value="" id="admin-input" />
      <ul class="navbar-nav">
        <li class="nav-item" onclick="navControl('vehicle-list')">
          <a class="nav-link">Vehicle List</a>
        </li>
        <li class="nav-item" onclick="navControl('addVehicle')">
          <a class="nav-link">Add Vehicle</a>
        </li>
        <li class="nav-item" onclick="navControl('editMakes')">
          <a class="nav-link" href="#">Edit Makes</a>
        </li>
        <li class="nav-item" onclick="navControl('editTypes')">
          <a class="nav-link" href="#">Edit Types</a>
        </li>
        <li class="nav-item" onclick="navControl('editClasses')">
          <a class="nav-link" href="#">Edit Classes</a>
        </li>
      </ul>
    </form>
  </div>
</nav>