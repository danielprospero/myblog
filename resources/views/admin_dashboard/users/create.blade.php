
	@extends("admin_dashboard.layouts.app")

	@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />

	@endsection
		
		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Usuários</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Usuários</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  	<h5 class="card-title">Novo Usuário</h5>
					  	<hr/>

                    <form action="{{ route('admin.users.store') }}" method='role' enctype='multipart/form-data'>
							@csrf

							<div class="form-body mt-4">
							<div class="row">
								<div class="col-lg-12">
									<div class="border border-3 p-4 rounded">

										<div class="mb-3">
											<label for="input_name" class="form-label">Nome</label>
                                            <input name='name' type="text" id='input_name' required class="form-control" value='{{ old("name") }}'>

											@error('name')
												<p class='text-danger'>{{ $message }}</p>
											@enderror
										</div>

										<div class="mb-3">
											<label for="input_email" class="form-label">E-mail</label>
                                            <input name='email' id='input_email' type="email" required class="form-control" value='{{ old("email") }}'>
											
											@error('email')
												<p class='text-danger'>{{ $message }}</p>
											@enderror
										</div>

										<div class="mb-3">
											<label for="input_password" class="form-label">Senha</label>
                                            <input name='password' id='input_password' type="password" required class="form-control" value=''>
											
											@error('password')
												<p class='text-danger'>{{ $message }}</p>
											@enderror
										</div>

										<div class="mb-3">
											<label for="input_image" class="form-label">Imagem de Perfil</label>
											<input type="file" name='image' class="form-control" id="inputProductTitle">

											@error('image')
												<p class='text-danger'>{{ $message }}</p>
											@enderror
										</div>

										<div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Permissões do Usuário</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="rounded">
                                                        <div class="mb-3">
                                                            <select required name='role_id' class="single-select">
                                                                @foreach($roles as $key => $role)
                                                                <option value="{{ $key }}">{{ $role }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('role_id')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

										<button class='btn btn-primary' type='submit'>Adicionar Usuário</button>

									</div>
								</div>

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
	<script src="{{ asset('admin_dashboard_assets/plugins/select2/js/select2.min.js') }}"></script>
	<script src="{{ asset('admin_dashboard_assets/plugins/input-tags/js/tagsinput.js') }}"></script>
	<script>
		$(document).ready(function () {

			$('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
			});

			setTimeout(() => {
            	$(".general-message").fadeOut();
        	}, 5000);

		});
	</script>
	@endsection