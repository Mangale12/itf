<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>CodePen - Bootstrap Page with Sidebar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="{{ asset('dist/style.css') }}">



</head>
<body>
<!-- partial:index.partial.html -->
<nav class="nav-side-menu">
  <div class="brand">Site Logo</div>
  <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  <div class="menu-list">
    <ul id="menu-content" class="menu-content collapse out">
      <li>
        <a href="#">
          <i class="fa fa-fw fa-dashboard fa-lg"></i>Dashboard
        </a>
      </li>
      <li data-toggle="collapse" data-target="#products" class="collapsed" data-parent="#menu-content">
        <a href="#">
          <i class="fa fa-fw fa-gift fa-lg"></i>Team
          <i class="fa fa-chevron-down"></i>
        </a>
      </li>
      <ul class="sub-menu collapse" id="products">
        <li class="active"><a href="{{ route("teams.index") }}">All Teams</a></li>
        <li><a href="{{ route('teams.create') }}">Add New</a></li>
      </ul>
      <li data-toggle="collapse" data-target="#service" class="collapsed" data-parent="#menu-content">
        <a href="#">
          <i class="fa fa-fw fa-table fa-lg"></i>Contact
          <i class="fa fa-chevron-down"></i>
        </a>
      </li>
      <ul class="sub-menu collapse" id="service">
        <li><a href="{{ route('contacts.index') }}">All Contacts</a></li>
        <li><a href="{{ route('contacts.create') }}">Add New</a></li>
        <li><a href="{{ route('contact.new_contact') }}">New Request</a></li>
        <li><a href="{{ route('contact.team_assign') }}">Team Assigend Contacts</a></li>
      </ul>
      <li data-toggle="collapse" data-target="#new" class="collapsed" data-parent="#menu-content">
        <a href="#">
          <i class="fa fa-fw fa-users fa-lg"></i>Category <i class="fa fa-chevron-down"></i>
        </a>
      </li>
      <ul class="sub-menu collapse" id="new">
        <li><a href="{{ route('category.index') }}">Categories</a></li>
        <li><a href="{{ route('category.create') }}">Add New</a></li>
      </ul>
      {{--
      <li>
        <a href="#">
          <i class="fa fa-fw fa-calendar-o fa-lg"></i>Events
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-fw fa-user fa-lg"></i>Profile
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-fw fa-users fa-lg"></i>People
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-fw fa-cog fa-lg"></i>System
        </a>
      </li> --}}
    </ul>
  </div>
</nav>

<div class="content bg-light" style="background: white;">
    @yield('content')
</div>
<!-- partial -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>

<script  src="{{ asset('dist/script.js') }}"></script>
<script src="{{ asset('public/assets/plugins/jquery/spartan-multi-image-picker-min.js') }}"></script>
@yield('script')
</body>
</html>
