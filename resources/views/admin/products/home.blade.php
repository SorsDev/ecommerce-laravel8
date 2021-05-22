@extends('admin.master')
@section('title', 'Productos')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/products')}}"><i class="fas fa-boxes"></i> Productos</a>
</li>
@endsection

@section('content')

	<div class="container-fluid">
		<div class="panel shadow">

			<div class="header">
				<h2 class="title"><i class="fas fa-boxes"></i> Productos</h2>
			</div>

			<div class="inside">

				<div class="btns">
					<a href="{{ url('/admin/products/add') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar Producto</a>
				</div>

				<table class="table table-striped mt-3">
					<thead>
						<tr>
							<td>ID</td>
							<td>Imagen</td>
							<td>Nombre</td>
							<td>Categoría</td>
							<td>Precio</td>
							<td>Acciones</td>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $p)
							<tr @if($p->status=="0") class="table-warning" @endif>
								<td width="50px">{{$p->id }}</td>
								<td width="64px">
									<a href="{{ url('/uploads/'.$p->file_path.'/'.$p->image) }}" data-fancybox="gallery">
										<img src="{{ url('/uploads/'.$p->file_path.'/t_'.$p->image) }}" width="64px" alt="producto">
									</a>
								</td>
								<td>{{$p->name }}</td>
								<td>{{$p->cat->name }}</td>
								<td>S/.{{$p->price }}</td>
								<td>
									<div class="opts">
											<a href="{{ url('/admin/products/'.$p->id.'/edit')}}">
												<i class="fas fa-edit"></i>
											</a>
											<a href="{{ url('/admin/products/'.$p->id.'/delete')}}">
												<i class="fas fa-trash-alt"></i>
											</a>
										</div>
								</td>
							</tr>
						@endforeach
						<tr>
							<td colspan="6">{!! $products->render() !!}</td>
						</tr>
					</tbody>
				</table>
			</div>


		</div>
	</div>

@endsection