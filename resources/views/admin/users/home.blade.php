@extends('admin.master')
@section('title', 'Usuarios')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/users')}}"><i class="fas fa-user-friends"></i>Usuarios</a>
</li>
@endsection

@section('content')

	<div class="container-fluid">
		<div class="panel shadow">

			<div class="header">
				<h2 class="title"><i class="fas fa-user-friends"></i> Usuarios</h2>
			</div>

			<div class="inside">

				<div class="row">
					<div class="col-md-2 offset-md-10">
						<div class="dropdown" >
							<button class="btn btn-success dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="button" style="width: 100%">
								<i class="fas fa-filter"></i> Filtrar
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a href="{{url('/admin/users/all')}}" class="dropdown-item"><i class="fas fa-stream"></i> Todos</a>
								<a href="{{url('/admin/users/0')}}" class="dropdown-item"><i class="fas fa-unlink"></i> No Verificados</a>
								<a href="{{url('/admin/users/1')}}" class="dropdown-item"><i class="fas fa-user-check"></i> Verificados</a>
								<a href="{{url('/admin/users/100')}}" class="dropdown-item"><i class="fas fa-heart-broken"></i> Suspendidos</a>
							</div>
						</div>
					</div>
				</div>

				<table class="table mt-3">
					<thead>
						<tr>
							<td>ID</td>
							<td>Nombres</td>
							<td>Apellidos</td>
							<td>Email</td>
							<td>Rol</td>
							<td>Estado</td>
							<td>Acción</td>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{$user->id}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->lastname}}</td>
							<td>{{$user->email}}</td>
							<td>{{getRoleUserArray(null,$user->role)}}</td>
							<td>{{getUserStatusArray(null,$user->status)}}</td>
							<td>
								<div class="opts">
									<a href="{{ url('/admin/users/'.$user->id.'/edit')}}">
										<i class="fas fa-edit"></i>
									</a>
									<a href="{{ url('/admin/users/'.$user->id.'/permissions')}}">
										<i class="fas fa-cogs"></i>
									</a>
								</div>
							</td>
						</tr>
						@endforeach
						<tr>
							<td colspan="7">{!! $users->render() !!}</td>
						</tr>
					</tbody>
				</table>
			</div>


		</div>
	</div>

@endsection