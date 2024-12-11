@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('users.index') }}">
                            {{ __('cruds.user.title_singular') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('global.create') }}</li>
                </ol>
            </div>
            <h4 class="page-title">{{ __('global.create') }} {{ __('cruds.user.title_singular') }}</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card card-box-shadow">
            <div class="card-body">
                <form action="{{ route("users.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="name">{{ __('cruds.user.fields.name') }} <span class="text-danger">*</span></label>
                            <input type="text" id="nome" name="nome" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" value="{{ old('name') }}">
                            @if($errors->has('name'))
                                <div class="mt-1 require_error">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">{{ __('cruds.user.fields.email') }} <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <div class="mt-1 require_error">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="password">{{ __('cruds.user.fields.password') }} <span class="text-danger">*</span></label>
                            <input type="password" id="password" name="password" autocomplete  class="form-control {{ $errors->has('password') ? 'has-error' : '' }}">
                            @if($errors->has('password'))
                                <div class="mt-1 require_error">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                         <div class="form-group col-md-4">
                            <label for="cpf">{{ __('cruds.user.fields.cpf') }} <span class="text-danger">*</span></label>
                            <input type="text" id="cpf" name="cpf" data-toggle="input-mask" data-mask-format="000.000.000-00" maxlength="14" class="form-control {{ $errors->has('cpf') ? 'has-error' : '' }}" value="{{ old('cpf') }}">
                            @if($errors->has('cpf'))
                                <div class="mt-1 require_error">
                                    {{ $errors->first('cpf') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="telefone">{{ __('cruds.user.fields.phone') }}</label>
                            <input type="text" id="telefone" name="telefone" data-toggle="input-mask" data-mask-format="(99) 99999-9999" maxlength="15" class="form-control" value="{{ old('telefone') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nivel">{{ __('cruds.user.fields.level') }} <span class="text-danger">*</span></label>
                            <div>
                                <select name="nivel" id="nivel" class="form-control" data-toggle="select2">
                                    @foreach($level as $key => $value)
                                        <option value="{{ $key }}" {{ old('nivel', 0) == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('nivel'))
                                <div class="mt-1 require_error">
                                    {{ $errors->first('nivel') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">{{ __('cruds.user.fields.status') }} <span class="text-danger">*</span></label>
                            <div>
                                <select name="status" id="status" class="form-control" data-toggle="select2">
                                    @foreach($status as $key => $value)
                                        <option value="{{ $key }}" {{ old('status', 1) == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('status'))
                                <div class="mt-1 require_error">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="roles">{{ __('cruds.user.fields.roles') }} <span class="text-danger">*</span></label>
                            <div>
                                <select name="roles[]" id="roles" class="form-control" multiple="multiple" data-toggle="select2">
                                    @foreach($rolePermissions as $key => $permission)
                                        <option value="{{ $key }}" {{ in_array($key, old('roles', [])) ? 'selected' : '' }}>{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('roles'))
                                <div class="mt-1 require_error">
                                    {{ $errors->first('roles') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="permissions">{{ __('cruds.user.fields.permissions') }} <span class="text-danger">*</span></label>
                            <div>
                                <select name="permissions[]" id="permissions" class="form-control" multiple="multiple" data-toggle="select2">
                                    @foreach($permissions as $id => $permission)
                                        <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permission }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('permissions'))
                                <div class="mt-1 require_error">
                                    {{ $errors->first('permissions') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="avatar">{{ __('cruds.user.fields.avatar') }}</label>
                        <div class="col-md-2 p-0">
                            <input type="file" name="photo" class="dropify" data-allowed-file-extensions="jpg png gif tif jpeg" />
                        </div>
                    </div>
                    <div>
                        @canany(['all_access', 'manage_user_permissions', 'deactivate_delete_users', 'reset_user_passwords', 'create_users'])
                            <input class="btn btn-normal waves-effect" type="submit" value="{{ __('global.save') }}">
                        @endcanany
                        <a class="btn btn-secondary waves-effect btn-cancel" type="button" href="{{ route('users.index') }}">{{ __('global.cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
    <!-- third party css -->
    <link href="{{ asset('assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

@endpush
@push('js')
    <!-- third party js -->
    <script src="{{ asset('assets/libs/dropify/dropify.min.js') }}"></script>
    <script>
        const rolePermissions = @json($rolePermissions);
        $(document).ready(function(){
            $('.dropify').dropify({
                messages: {
                    'default': '{{ __('global.dropify.default') }}',
                    'replace': '{{ __('global.dropify.replace') }}',
                    'remove':  '{{ __('global.dropify.remove') }}',
                    'error':   '{{ __('global.dropify.error') }}'
                }
            });
        });
        $('#roles').change(function() {
            var selectedRoles = $(this).val();
            var selectedPermissions = [];
            selectedRoles.forEach(function(role) {
                if (rolePermissions[role]) {
                    selectedPermissions = selectedPermissions.concat(Object.keys(rolePermissions[role]));
                }
            });
            $('#permissions').val(selectedPermissions).trigger('change');
        });
    </script>
    <!-- third party js end -->
@endpush
