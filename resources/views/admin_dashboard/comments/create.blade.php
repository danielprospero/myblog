
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
					<div class="breadcrumb-title pe-3">Comentrários</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Comentrários</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  	<h5 class="card-title">Novo Comentrário</h5>
					  	<hr/>

                    <form action="{{ route('admin.comments.store') }}" method='post'>
							@csrf

							<div class="form-body mt-4">
							<div class="row">
								<div class="col-lg-12">
									<div class="border border-3 p-4 rounded">

										<div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Post Relacionado</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="rounded">
                                                        <div class="mb-3">
                                                            <select required name='post_id' class="single-select">
                                                                @foreach($posts as $key => $post)
                                                                <option value="{{ $key }}">{{ $post }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('post_id')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

	
										<div class="mb-3">
											<label for="inputProductDescription" class="form-label">Comentrário do Post</label>
                                            <textarea name='the_comment'  id='post_comment' class="form-control" id="inputProductDescription" rows="3">{{ old("the_comment") }}</textarea>
											@error('the_comment')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>

										<button class='btn btn-primary' type='submit'>Adicionar Comentrário</button>

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