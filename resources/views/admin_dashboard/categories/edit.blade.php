
	@extends("admin_dashboard.layouts.app")

	@section("style")

	@endsection
		
		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Categorias</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Categorias</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				    <div class="card-body p-4">
					  	<h5 class="card-title">Editar Categoria: {{ $category->name }}</h5>
					  	<hr/>

                        <form action="{{ route('admin.categories.update', $category) }}" method='post'>
							@csrf
                            @method('PATCH')

							<div class="form-body mt-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="border border-3 p-4 rounded">
                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Nome</label>
                                                <input type="text" value='{{ old("name", $category->name) }}' name='name' required class="form-control" id="inputProductTitle">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Slug da Categoria</label>
                                                <input type="text" value='{{ old("slug", $category->slug) }}' class="form-control" required name='slug' id="inputProductTitle">
                                                @error('slug')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <button class='btn btn-primary' type='submit'>Atualizar</button>
                                            <a href="#" onclick='event.preventDefault(); document.getElementById("delete-form").submit()' class='btn btn-danger'>Deletar</a>


                                        </div>
                                    </div>
                                </div>
					        </div>
                        </form>

                        <form id='delete-form' action="{{ route('admin.categories.destroy', $category->id) }}" method='post'>
                            @csrf
                            @method('DELETE')
                        </form>                      
                       <!--end row-->
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