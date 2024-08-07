
	@extends("admin_dashboard.layouts.app")

	@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin_dashboard_assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />

	<script src="https://cdn.tiny.cloud/1/wul4w7yae69ggfibeead32lbky9ybwlavgcdcnmpppce6w0z/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

	@endsection
		
		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Posts</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Posts</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  	<h5 class="card-title">Novo Post</h5>
					  	<hr/>

                    <form action="{{ route('admin.posts.store') }}" method='post' enctype='multipart/form-data'>
							@csrf

							<div class="form-body mt-4">
							<div class="row">
								<div class="col-lg-12">
									<div class="border border-3 p-4 rounded">
										<div class="mb-3">
											<label for="inputProductTitle" class="form-label">Titulo do Post</label>
                                            <input type="text" value='{{ old("title") }}' name='title' required class="form-control" id="inputProductTitle">
											@error('title')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
										<div class="mb-3">
											<label for="inputProductTitle" class="form-label">Slug do Post</label>
                                            <input type="text" value='{{ old("slug") }}' class="form-control" required name='slug' id="inputProductTitle">
											@error('slug')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
										<div class="mb-3">
											<label for="inputProductDescription" class="form-label">Trecho do Post</label>
											<textarea required class="form-control" name='excerpt' id="inputProductDescription" rows="3">{{ old("excerpt") }}</textarea>
                                            @error('excerpt')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
										</div>
										<div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Categoria do Post</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="rounded">
                                                        <div class="mb-3">
                                                            <select required name='category_id' class="single-select">
                                                                @foreach($categories as $key => $category)
                                                                <option value="{{ $key }}">{{ $category }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('category_id')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										<div class="mb-3">
                                            <label class="form-label">Tags</label>
                                            <input type="text" class="form-control" name='tags' data-role="tagsinput" value="{{ old('tags') }}">
                                        </div>
										@error('tags')
											<span class="text-danger">{{ $message }}</span>
										@enderror
										<div class="mb-3">
											<div class='card'>
												<div class="card-body">
											
													<label for="inputProductDescription" class="form-label">Thumbnail do Post</label>
													<input id='thumbnail' required name='thumbnail' id="file" type="file">
													@error('thumbnail')
														<span class="text-danger">{{ $message }}</span>
													@enderror

												</div>
											</div>
										</div>
										<div class="mb-3">
											<label for="inputProductDescription" class="form-label">Conteúdo do Post</label>
                                            <textarea name='body'  id='post_content' class="form-control" id="inputProductDescription" rows="3">{{ old("body") }}</textarea>
											@error('body')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>

										<button class='btn btn-primary' type='submit'>Cadastrar Post</button>

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
			$('.multiple-select').select2({
				theme: 'bootstrap4',
				width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
				placeholder: $(this).data('placeholder'),
				allowClear: Boolean($(this).data('allow-clear')),
			});
			tinymce.init({
				selector: '#post_content',
				plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
				toolbar: 'insertfile undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
				toolbar_mode: 'floating',
				tinycomments_mode: 'embedded',
				tinycomments_author: 'Author name',
				height: '500',
				mergetags_list: [
				{ value: 'First.Name', title: 'First Name' },
				{ value: 'Email', title: 'Email' },
				],
				ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
				image_title: true,
				automatic_uploads: true,
				images_upload_handler: (blodinfo, failure) => new Promise((success, reject) => {
					let formData = new FormData();
					let _token = $('input[name="_token"]').val();
				
					let xhr = new XMLHttpRequest();
					xhr.open('POST', "{{ route('admin.upload_tinymce_image') }}");
					xhr.onload = () =>
					{
						if( xhr.status !== 200 )
						{
							failure('HTTP Error: ' + xhr.status);
							return 
						}
						let json = JSON.parse(xhr.responseText);
						if( !json || typeof json.location != 'string' )
						{
							failure('Invalid JSON: ' + xhr.responseText);
							return;
						}
						success(json.location);
					};
					formData.append('_token', _token);
					formData.append('file', blodinfo.blob(), blodinfo.filename());
					xhr.send(formData);
				})
				
			});

			setTimeout(() => {
            	$(".general-message").fadeOut();
        	}, 5000);

		});
	</script>
	@endsection