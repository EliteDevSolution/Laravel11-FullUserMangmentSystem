@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
	<div class="col-12">
		 <div class="page-title-box">
			  <div class="page-title-right">
					<ol class="breadcrumb m-0">
						 <li class="breadcrumb-item">
							  <a href="{{ route('dashboard') }}">
									@lang("cruds.favorites.title")
							  </a>
						 </li>
						 <li class="breadcrumb-item active">{{ __('global.my_account') }}</li>
					</ol>
			  </div>
			  <h4 class="page-title">{{ __('global.my_account') }}</h4>
		 </div>
	</div>
</div>
<!-- end page title -->
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		 <span aria-hidden="true">×</span>
	</button>
	{{ session('success') }}
</div>
@endif
<div class="justify-content-center nav nav-pills navtab-bg mt-3">
	<div class="card-box col-md-12 card-box-shadow">
		<div class="row mt-4">
			<div class="col-sm-3">
				<div class="nav flex-column nav-pills nav-pills-tab" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link mb-2 {{ old('is_password') || session('tab') == 'password' ? '' : 'active show' }}" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
						<i class="fe-user"></i>
						{{ __('global.personal_information') }}
					</a>
					<a class="nav-link mb-2 {{ old('is_password') ||  session('tab') == 'password' ? 'active show' : '' }}" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-password" role="tab" aria-controls="v-pills-password" aria-selected="false">
						<i class="fe-lock"></i>
						{{ __('global.password') }}
					</a>
				</div>
			</div> <!-- end col-->

			<div class="col-sm-9">
				<div class="tab-content pt-0">
					<div class="tab-pane fade {{ old('is_password')  || session('tab') == 'password' ? '' : 'active show' }}" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						<form action="{{ route('my-account.personal') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="form-group mb-3">
										<label for="nome">{{ __('cruds.user.fields.full_name') }} <span class="text-danger">*</span></label>
										<input type="text" id="nome" name="nome" class="form-control {{ $errors->has('nome') ? 'has-error' : '' }}" value="{{ old('nome', isset($user) ? $user->nome : '') }}" placeholder="" autofocus>
										@if ($errors->has('nome'))
											<div class="mt-1 text-danger">
												{{ $errors->first('nome') }}
											</div>
										@endif
									</div>
									<div class="form-group mb-3">
										<label for="email">{{ __('cruds.user.fields.email') }} <span class="text-danger">*</span></label>
										<input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" value="{{ old('email', isset($user) ? $user->email : '') }}" placeholder="">
										@if ($errors->has('email'))
											<div class="mt-1 text-danger">
												{{ $errors->first('email') }}
											</div>
										@endif
									</div>
									<div class="form-group mb-3">
										<label for="cpf">{{ __('cruds.user.fields.cpf') }} <span class="text-danger">*</span></label>
										<input type="text" id="cpf" name="cpf" data-toggle="input-mask" data-mask-format="000.000.000-00" maxlength="14" class="form-control {{ $errors->has('cpf') ? 'has-error' : '' }}" value="{{ old('cpf', $user->cpf) }}">
										@if($errors->has('cpf'))
											<div class="mt-1 require_error">
												{{ $errors->first('cpf') }}
											</div>
										@endif
									</div>
									<div class="form-group mb-3">
										<label for="telefone">{{ __('cruds.user.fields.phone') }}</label>
										<input type="text" id="telefone" name="telefone" data-toggle="input-mask" data-mask-format="(99) 99999-9999" maxlength="15" class="form-control" value="{{ old('telefone', $user->telefone) }}">
									</div>
									<div class="form-group mt-3">
										<label>@lang("global.avatar")</label>
										<input type="file" name="photo" class="dropify" data-allowed-file-extensions="jpg png gif tif jpeg" />
									</div>

									<div class="text-right">
										<button type="submit" class="btn btn-normal">{{ __('global.save') }}</button>
										<button class="btn btn-secondary waves-effect btn-cancel" type="button" onclick="history.back(1);">@lang("global.cancel")</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane fade {{ old('is_password') || session('tab') == 'password' ? 'active show' : '' }}" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<form action="{{ route('my-account.password') }}" method="POST">
									@csrf
									<input type="hidden" id="is_password" name="is_password" value="is_password">
									<div class="form-group mb-3">
										<label for="current_password">{{ __('global.current_password') }} <span class="text-danger">*</span></label>
										<input type="password" id="current_password" name="current_password" class="form-control {{ $errors->has('current_password') ? 'has-error' : '' }}" placeholder="" value="{{ old('current_password') }}" autofocus>
										@if ($errors->has('current_password'))
											<div class="mt-1 text-danger">
												{{ $errors->first('current_password') }}
											</div>
										@endif
									</div>
									<div class="form-group mb-3">
										<label for="new_password ">{{ __('global.new_password') }} <span class="text-danger">*</span></label>
										<input type="password" id="new_password" name="new_password" class="form-control {{ $errors->has('new_password') ? 'has-error' : '' }}" placeholder="" value="{{ old('current_password') }}">
										@if ($errors->has('new_password'))
											<div class="mt-1 text-danger">
												{{ $errors->first('new_password') }}
											</div>
										@endif
									</div>
									<div class="form-group mb-3">
										<label for="new_confirm_password">{{ __('global.confirm_password') }} <span class="text-danger">*</span></label>
										<input type="password" id="new_confirm_password" name="new_confirm_password" class="form-control {{ $errors->has('new_confirm_password') ? 'has-error' : '' }}" placeholder="" value="{{ old('current_password') }}">
										@if ($errors->has('new_confirm_password'))
											<div class="mt-1 text-danger">
												{{ $errors->first('new_confirm_password') }}
											</div>
										@endif
									</div>
									<div class="text-right">
										<button type="submit" class="btn btn-normal">{{ __('global.save') }}</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- end col-->
		</div>
	</div>
</div>
@endsection
@push('css')
	<link href="{{ asset('assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('js')
	<!-- third party js -->
	<script src="{{ asset('assets/libs/dropify/dropify.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			@if(is_null($user->avatar) || empty($user->avatar))
				$('.dropify').dropify({
					defaultFile: "{{ asset('assets/images/users/default.png') }}",
					messages: {
						'default': '{{ __('global.dropify.default') }}',
						'replace': '{{ __('global.dropify.replace') }}',
						'remove':  '{{ __('global.dropify.remove') }}',
						'error':   '{{ __('global.dropify.error') }}'
					}
				});
			@else
				$('.dropify').dropify({
					defaultFile: "{{ asset('storage/images/avatars').'/'.$user->avatar }}",
					messages: {
						'default': '{{ __('global.dropify.default') }}',
						'replace': '{{ __('global.dropify.replace') }}',
						'remove':  '{{ __('global.dropify.remove') }}',
						'error':   '{{ __('global.dropify.error') }}'
					}
				});
			@endif
		});
	</script>
@endpush

