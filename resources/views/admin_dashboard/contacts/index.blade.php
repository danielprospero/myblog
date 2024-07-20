@extends("admin_dashboard.layouts.app")

	@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
	@endsection
		
		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Contatos</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Contatos</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Sobre nome</th>
                                                <th>E-mail</th>
                                                <th>Assunto</th>
                                                <th>Mensagem</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($contacts as $contact)
                                                
                                            <tr>
                                                <td>{{ $contact->first_name }}</td>
                                                <td>{{ $contact->last_name }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->subject }}</td>
                                                <td>{{ $contact->message }}</td>
                                                <td>
                                                    <div class="d-flex order-actions">
                                                        <a href="#" onclick="event.preventDefault(); document.getElementById('delete_form_{{$contact->id}}').submit();" class="text-danger  bg-light-danger ms-2"><i class='bx bxs-trash'></i></a>
                                                        <form id="delete_form_{{$contact->id}}" action="{{route('admin.contacts.destroy', $contact)}}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
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

                {{$contacts->links()}}

			</div>
		</div>
		<!--end page wrapper -->
		@endsection

		@section("script")
        	<script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	        <script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

            <script>
                $(document).ready(function() {
                    var table = $('#example2').DataTable( {
                        lengthChange: false,
                        buttons: ['excel']
                    } );
                
                    table.buttons().container()
                        .appendTo( '#example2_wrapper .col-md-6:eq(0)' );

                        setTimeout(function() {
                        $('.general-message').fadeOut();
                    }, 5000);
                } );
            </script>

		@endsection
	