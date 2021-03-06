@extends('admin.master')
@section('title', 'Categorías')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/categories')}}"><i class="fas fa-folder-open"></i> Categorías</a>
</li>
@endsection

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<div class="panel shadow">
					<div class="header">
						<h2 class="title"><i class="fas fa-plus"></i> Agregar Categoría</h2>
					</div>
					<div class="inside">
						{!! Form::open(['url' => '/admin/category/add']) !!}

							<label for="name">Nombre:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">
										<i class="fas fa-keyboard"></i>
									</span>
								</div>
								{!! Form::text('name', null, ['class' => 'form-control']) !!}
							</div>

							<label for="module" class="mt-3">Módulo:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">
										<i class="fas fa-tags"></i>
									</span>
								</div>
								{!! Form::select('module',getModulesArray(), 0, ['class'=>'custom-select']) !!}
							</div>

							<label for="icon" class="mt-3">Icono:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">
										<i class="fas fa-keyboard"></i>
									</span>
								</div>
								{!! Form::text('icon', null, ['class' => 'form-control']) !!}
							</div>

							{!! Form::submit('Guardar',['class' => 'btn btn-success mt-3']) !!}

						{!! Form::close() !!}
					</div>
				</div>
			</div>

			<div class="col-md-9">
				<div class="panel shadow">
					<div class="header">
						<h2 class="title"><i class="fas fa-folder-open"></i> Categorías</h2>
					</div>
					<div class="inside">
						<nav class="nav">
							@foreach(getModulesArray() as $m => $k)
								<a class="nav-link" href="{{ url('/admin/categories/'.$m)}}"><i class="fas fa-list"></i> {{ $k }}</a>
							@endforeach
						</nav>
						<table class="table mt-3">
							<thead>
								<tr>
									<td width="32px">Icono</td>
									<td>Nombre</td>
									<td width="140px"></td>
								</tr>
							</thead>
							<tbody>
								@foreach($cats as $cat)

								<tr>
									<td>{!! htmlspecialchars_decode($cat->icono) !!}</td>
									<td>{{ $cat->name }}</td>
									<td>
										<div class="opts">
											<a href="{{ url('/admin/category/'.$cat->id.'/edit')}}">
												<i class="fas fa-edit"></i>
											</a>
											<a href="{{ url('/admin/category/'.$cat->id.'/delete')}}">
												<i class="fas fa-trash-alt"></i>
											</a>
										</div>
									</td>
								</tr>

								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>

@endsection