@extends('admin.master')
@section('title', 'Permisos')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/users')}}"><i class="fas fa-user-friends"></i> Usuarios</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/users')}}"><i class="fas fa-cogs"></i> Permisos del Usuario: {{$u->name}} {{$u->lastname}} (ID:{{$u->id}})</a>
</li>
@endsection

@section('content')

	<div class="container-fluid">
		<div class="page_user">
			<div class="row">

				@include('admin.users.permissions.module_dashboard')
				@include('admin.users.permissions.module_products')
				@include('admin.users.permissions.module_categories')

			</div>

			<div class="row mt-3">
				@include('admin.users.permissions.module_users')
			</div>
		</div>
		
	</div>

@endsection