
	@extends("admin_dashboard.layouts.app")

	@section("style")
	<style>
		.permission {
			background: white;
			padding: 5px 10px;
			display: inline-block;
			font-size: 20px;
			margin: 10px 10px;
			cursor: pointer;
		}
	</style>
	@endsection
		
		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Permissões</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Permissões</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  	<h5 class="card-title">Editar Permissões: {{ $role->name }}</h5>
					  	<hr/>

                    <form action="{{ route('admin.roles.update', $role) }}" method='post'>
							@csrf
							@method('PATCH')

							<div class="form-body mt-4">
							<div class="row">
								<div class="col-lg-12">
									<div class="border border-3 p-4 rounded">
										<div class="mb-3">
											<label for="inputProductTitle" class="form-label">Nome</label>
                                            <input type="text" value='{{ old("name", $role->name) }}' name='name' required class="form-control" id="inputProductTitle">
											@error('name')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
										<div class="mb-3">
											<label for="inputProductTitle" class="form-label">Permissões</label>
											<div class="row">
											@php
												$the_count = count($permissions);
												$start = 0;
											@endphp

											@for($j = 1; $j <= 3; $j++)
												@php
													$end = round($the_count * ($j / 3));
												@endphp

												<div class="col-md-4">
													@for($i = $start; $i < $end; $i++)
														<label class="permission">
														<input {{  $role->permissions->contains($permissions[$i]->id) ? 'checked' : '' }} type="checkbox" name='permissions[]' value='{{ $permissions[$i]->id }}'> {{ $permissions[$i]->name }}
														</label>
													@endfor
												</div>
												@php
													$start = $end;
												@endphp
											@endfor
										</div>


										<button class='btn btn-primary' type='submit'>Atualizar</button>
										<a href="#" onclick='event.preventDefault(); document.getElementById("delete-form").submit()' class='btn btn-danger'>Deletar</a>

									</div>
								</div>

							</form>
							<form id='delete-form' action="{{ route('admin.roles.destroy', $role->id) }}" method='post'>
								@csrf
								@method('DELETE')
                        	</form>   

						  </div>
					   </div><!--end row-->
					</div>
				  </div>
			  </div>


			</div>
		</div>
		<!--end page wrapper -->
		@endsection
	
	@section("script")
	<script>
		$(document).ready(function () {

			setTimeout(() => {
            	$(".general-message").fadeOut();
        	}, 5000);

		});
	</script>
	@endsection