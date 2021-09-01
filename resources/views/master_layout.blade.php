<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('public/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendor/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('public/vendor/css/sweetalert.css')}}">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@routes()
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="{{route('shop.home')}}">TRAININGdev</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link" href="{{route('product-manager.index')}}">Products</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="{{route('customer-manager.index')}}">Customers</a>
	        </li>
			<li class="nav-item">
	          <a class="nav-link" href="#">Orders</a>
	        </li>
			<li class="nav-item">
	          <a class="nav-link" href="{{route('order-manager.create')}}">Create cart</a>
	        </li>
	      </ul>
	      <form class="d-flex">
	        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
	        <button class="btn btn-outline-success " type="button">Search</button>
	      </form>
	    </div>
	  </div>
	</nav>
	<main class="pt-2">
		<div class="container">
	     	@yield('content')
		</div>
	</main>
	
	<script src="{{ asset('public/bootstrap/js/bootstrap.js') }}"></script>
	<script src="{{ asset('public/vendor/js/sweetalert.js') }}"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
	@include('script')

</body>
</html>