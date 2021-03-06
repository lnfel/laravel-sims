@extends('layouts.app')

@section('content')
<main id="main-container">
	<!-- Hero -->
  <div class="bg-image bg-image-bottom" style="background-image: url('codebase/assets/media/photos/photo34@2x.jpg');">
    <div class="bg-primary-dark-op">
      <div class="content content-top overflow-hidden">
      	<div class="row pt-50 pb-20">
      		<div class="col-md py-10 d-md-flex align-items-md-center text-center">
            <h1 class="text-white mb-0">
              <span class="font-w300">Employees</span>
              <span class="font-w400 font-size-lg text-white-op d-none d-md-inline-block">Index</span>
            </h1>
          </div>

          <div class="col-md py-10 d-md-flex align-items-md-center justify-content-md-end text-center">
            <button type="button" class="btn btn-success btn-noborder" data-toggle="modal" data-target="#store-employee">
                <i class="fa fa-user-plus mr-5"></i> New Employee
            </button>
          </div>
      	</div>
      </div>
    </div>
  </div>
  <!-- Hero -->
	<!-- Page Content -->
  <div class="content">
  	<!-- Dynamic Table Full Pagination -->
    {{-- $response->json() --}}
    <!-- <span>Status: </span> -->{{-- $response->status() --}}
    
    @if(session('success'))
    <div id="notify" data-type="success"></div>
    <!-- <button type="button" class="js-notify btn btn-sm btn-alt-success" data-type="success" data-icon="fa fa-check" data-message="App was updated successfully to 1.2 version">Success</button> -->
    @endif
    <div class="block">
      <!-- <div class="block-header block-header-default">
          <h3 class="block-title">Dynamic Table <small>Full pagination</small></h3>
      </div> -->
      <div class="block-content block-content-full">
        <form action="{{ route('employees.index') }}" method="get">
            <div class="form-group row">
                <div class="col-md-2">
                    <div class="form-material form-material-primary floating open">
                        <select id="view" class="form-control" name="view">
                            <option hidden="">-- Select filter --</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="all">All</option>
                        </select>
                        <label for="">Status</label>
                    </div>
                </div>
            </div>
        </form>

        <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
          <thead>
            <tr>
              <th class="text-center">Employee number</th>
              <th>Name</th>
              <th class="d-none d-sm-table-cell">Email</th>
              <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
              <th class="text-center" style="width: 15%;">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse($employees as $account)
          	<tr>
                <td class="text-center">{{ $account->employee->number }}</td>
                <td class="font-w600"><a class="link-effect" href="{{ route('employees.show', $account->employee_id) }}">{{ $account->employee->first_name }} {{ $account->employee->last_name }}</a></td>
                <td class="d-none d-sm-table-cell">{{ $account->employee->personal_email }}</td>
                <td class="d-none d-sm-table-cell">
                    <span class="badge badge-{{ $account->status->name == 'Active' ? 'success' : 'danger' }}">{{ $account->status->name }}</span>
                </td>
                <td class="text-center">
                    @if($account->status->name == 'Active')
                        <button type="button" class="btn btn-primary mr-5 mb-5" data-toggle="modal" data-target-id="{{ $account->employee_id }}" data-target="#update-employee" title="Edit">
                            <i class="fa fa-edit"></i>
                        </button>
                    	<button type="button" class="btn btn-danger mr-5 mb-5" data-toggle="modal" data-target-id="{{ $account->employee_id }}" data-full-name="{{ $account->employee->first_name }} {{ $account->employee->last_name }}" data-target="#destroy-employee" title="Delete">
                            <i class="fa fa-trash"></i>
                        </button>
                    @else
                        <form id="restore" action="{{ route('employees.restore', $account->employee->id) }}" method="post">
                            @csrf
                        </form>
                        <button form="restore" class="btn btn-success mb-5" title="Restore">
                            <i class="fa fa-undo"></i>
                        </button>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center">{{ __('No employees found on database.') }}</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
    <!-- END Dynamic Table Full Pagination -->
    <!-- <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">{{-- __('Employee') --}}</div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{-- session('status') --}}
              </div>
            @endif
            {{-- Auth::guard('account')->user()->username --}}
            {{-- __('You are logged in!') --}}
            <pre>{{-- var_dump($user->toArray()) --}}</pre>
          </div>
        </div>
      </div>
    </div> -->
  </div>
  <!-- Page Content -->
</main>
<!-- Store Employee Modal -->
<x-modal icon="fa fa-user-plus mr-5" title="New Employee" modalId="store-employee" formId="create-employee">
    <form id="create-employee" action="{{ route('employees.store') }}" method="post">
        @csrf
        <h5 class="mb-1">Account Info</h5>
        <div class="form-group row mb-4">
            <!-- <div class="col-md-4">
                <div class="form-material form-material-primary floating">
                    <input id="number" type="text" class="form-control" name="number" value="{{-- $new_username ?? date('Ymd').'01' --}}" readonly="" style="background-color: #f0f2f5;">
                    <label for="number">Employee and Account number</label>
                </div>
            </div> -->
            <div class="col-md-4">
                <div class="form-material form-material-primary {{($errors->storeEmployee->first('account_type') ? ' form-error store' : '')}} floating open">
                    <select class="form-control" id="account_type" name="account_type" value="">
                        <option value="3" selected="">Employee</option>
                        <!-- <option hidden="" value="{{-- null --}}">-- Select Role --</option>
                        @forelse($account_types as $type)
                            <option value="{{-- $type->id --}}" {{-- old('account_type') == $type->id ? 'selected' : '' --}}>
                                {{-- $type->name --}}
                            </option>
                        @empty
                            <option disabled="">{{-- __('No account types found on database.') --}}</option>
                        @endforelse -->
                    </select>
                    <label for="account_type">Account Type</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->storeEmployee->first('account_type') }}</strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-material form-material-primary {{($errors->storeEmployee->first('personal_email') ? ' form-error store' : '')}} floating">
                    <input id="personal_email" type="email" name="personal_email" class="form-control" value="{{ old('personal_email') }}">
                    <label for="personal_email">Email</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->storeEmployee->first('personal_email') }}</strong>
                    </span>
                </div>
            </div>
        </div>
        <h5 class="mb-1">Personal Info</h5>
        <div class="form-group row mb-4">
            <div class="col-md-4">
                <div class="form-material form-material-primary {{($errors->storeEmployee->first('first_name') ? ' form-error store' : '')}} floating">
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $errors->storeEmployee ? old('first_name') : '' }}">
                    <label for="first_name">First Name</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->storeEmployee->first('first_name') }}</strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-material form-material-primary {{($errors->storeEmployee->first('middle_name') ? ' form-error store' : '')}} floating">
                    <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name') }}">
                    <label for="middle_name">Middle Name</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->storeEmployee->first('middle_name') }}</strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-material form-material-primary {{($errors->storeEmployee->first('last_name') ? ' form-error store' : '')}} floating">
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}">
                    <label for="last_name">Last Name</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->storeEmployee->first('last_name') }}</strong>
                    </span>
                </div>
            </div>
        </div>
        <h5 class="mb-1">Address</h5>
        <div class="form-group row">
            <div class="col">
                <div class="form-material form-material-primary {{($errors->storeEmployee->first('address') ? ' form-error store' : '')}} floating">
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                    <label for="address">Street address</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->storeEmployee->first('address') }}</strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <div class="form-material form-material-primary {{($errors->storeEmployee->first('region') ? ' form-error store' : '')}} floating open">
                    <select class="form-control" id="region" name="region" data-old-region="{{ old('region') ? old('region') : '' }}">
                        <option value="" hidden="">-- Choose Region --</option>
                        @forelse($regions as $region)
                            <option value="{{ $region->region_code }}" {{-- old('region') == $region->region_code ? 'selected' : '' --}}>{{ $region->region_description }}</option>
                        @empty
                            <option disabled="">{{ __('No regions found on database.') }}</option>
                        @endforelse
                    </select>
                    <label for="region">Region</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->storeEmployee->first('region') }}</strong>
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-material form-material-primary {{($errors->storeEmployee->first('province') ? ' form-error store' : '')}} floating open">
                    <select class="form-control" id="province" name="province" data-old-province="{{ old('province') ? old('province') : '' }}">
                        <option value="" hidden="">-- Select Region first --</option>
                    </select>
                    <label for="province">Province</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->storeEmployee->first('province') }}</strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <div class="form-material form-material-primary {{($errors->storeEmployee->first('municipality') ? ' form-error store' : '')}} floating open">
                    <select class="form-control" id="municipality" name="municipality" data-old-municipality="{{ old('municipality') }}">
                        <option value="" hidden="">-- Select Province first --</option>
                    </select>
                    <label for="municipality">Municipality / City</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->storeEmployee->first('municipality') }}</strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-material form-material-primary {{($errors->storeEmployee->first('brgy') ? ' form-error store' : '')}} floating open">
                    <select class="form-control" id="brgy" name="brgy" data-old-brgy="{{ old('brgy') }}">
                        <option value="" hidden="">-- Select a Municipality / City first --</option>
                    </select>
                    <label for="brgy">Baranggay</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->storeEmployee->first('brgy') }}</strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-material form-material-primary {{($errors->storeEmployee->first('zip_code') ? ' form-error store' : '')}} floating">
                    <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ old('zip_code') }}">
                    <label for="zip_code">Zip Code</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->storeEmployee->first('zip_code') }}</strong>
                    </span>
                </div>
            </div>
        </div>
    </form>
</x-modal>
<!-- Store Employee Modal -->
<!-- Update Employee Modal -->
<x-modal icon="fa fa-edit mr-5" title="Edit Employee" modalId="update-employee" formId="edit-employee">
    <form id="edit-employee" action="" method="post" data-old-employee-id="{{ session('employee_id') }}">
        <input type="hidden" id="employee_id" name="employee_id" value="{{ old('employee_id') }}">
        @csrf
        @method('PATCH')
        <h5 class="mb-1">Account Info</h5>
        <div class="form-group row mb-4">
            <!-- <div class="col-md-4">
                <div class="form-material form-material-primary floating">
                    <input id="edit-number" type="text" class="form-control" name="edit_number" value="{{ old('edit_number') }}" style="background-color: #f0f2f5;">
                    <label for="number">Employee number</label>
                </div>
            </div> -->
            <div class="col-md-4">
                <div class="form-material form-material-primary {{ $errors->updateEmployee->first('edit_account_type') ? 'form-error update' : '' }} floating">
                    <select class="form-control" id="" name="edit_account_type">
                        <option hidden="" value="0">-- Select Role --</option>
                        @forelse($account_types as $type)
                            <option value="{{ $type->id }}" {{ old('edit_account_type') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                        @empty
                            <option disabled="">{{ __('No account types found on database.') }}</option>
                        @endforelse
                    </select>
                    <label for="region">Account Type</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $errors->updateEmployee->first('edit_account_type') }}
                        </strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-material form-material-primary {{ $errors->updateEmployee->first('edit_personal_email') ? 'form-error update' : '' }} floating">
                    <input id="" type="email" name="edit_personal_email" class="form-control" value="{{ old('edit_personal_email') }}">
                    <label for="personal_email">Email</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->updateEmployee->first('edit_personal_email') }}</strong>
                    </span>
                </div>
            </div>
        </div>
        <h5 class="mb-1">Personal Info</h5>
        <div class="form-group row mb-4">
            <div class="col-md-4">
                <div class="form-material form-material-primary {{ $errors->updateEmployee->first('first_name') ? 'form-error update' : '' }} floating">
                    <input type="text" class="form-control" id="" name="edit_first_name" value="{{ old('edit_first_name') }}">
                    <label for="first_name">First Name</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->updateEmployee->first('first_name') }}</strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-material form-material-primary {{ $errors->updateEmployee->first('edit_middle_name') ?  'form-error update' : '' }} floating">
                    <input type="text" class="form-control" id="" name="edit_middle_name" value="{{ old('edit_middle_name') }}">
                    <label for="middle_name">Middle Name</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->updateEmployee->first('middle_name') }}</strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-material form-material-primary {{ $errors->updateEmployee->first('edit_last_name') ? 'form-error update' : '' }} floating">
                    <input type="text" class="form-control" id="" name="edit_last_name" value="{{ old('edit_last_name') }}">
                    <label for="last_name">Last Name</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->updateEmployee->first('last_name') }}</strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h5 class="mb-1">Address</h5>
            </div>
            <div class="col text-right">
                <label class="css-control css-control-sm css-control-primary css-switch">
                    <input type="checkbox" class="css-control-input" id="toggleAddressEdit">
                    <span class="css-control-indicator"></span> Edit address
                </label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col">
                <div class="form-material form-material-primary floating {{ $errors->updateEmployee->first('edit_address') ? 'form-error update' : '' }}">
                    <input type="text" class="form-control" id="" name="edit_address" value="{{ old('edit_address') }}">
                    <label for="address">Street address</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->updateEmployee->first('edit_address') }}</strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <div class="form-material form-material-primary floating">
                    <select class="form-control" id="edit_region" name="edit_region" data-old-edit-region="{{ old('edit_region') ? old('edit_region') : '' }}">
                        <option value="" hidden="">-- Choose Region --</option>
                        @forelse($regions as $region)
                            <option value="{{ $region->region_code }}">{{ $region->region_description }}</option>
                        @empty
                            <option disabled="">{{ __('No regions found on database.') }}</option>
                        @endforelse
                    </select>
                    <label for="region">Region</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->updateEmployee->first('edit_region') }}</strong>
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-material form-material-primary floating">
                    <select class="form-control" id="edit_province" name="edit_province">
                        <option value="" hidden="">-- Select Region first --</option>
                    </select>
                    <label for="province">Province</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->updateEmployee->first('edit_province') }}</strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <div class="form-material form-material-primary floating">
                    <select class="form-control" id="edit_municipality" name="edit_municipality">
                        <option value="" hidden="">-- Select Province first --</option>
                    </select>
                    <label for="municipality">Municipality / City</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->updateEmployee->first('edit_municipality') }}</strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-material form-material-primary floating">
                    <select class="form-control" id="edit_brgy" name="edit_brgy" >
                        <option value="" hidden="">-- Select a Municipality / City first --</option>
                    </select>
                    <label for="brgy">Baranggay</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->updateEmployee->first('edit_brgy') }}</strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-material form-material-primary floating {{ $errors->updateEmployee->first('edit_zip_code') ? 'form-error update' : '' }}">
                    <input type="text" class="form-control" id="edit_zip_code" name="edit_zip_code" value="{{ old('edit_zip_code') }}">
                    <label for="zip_code">Zip Code</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->updateEmployee->first('edit_zip_code') }}</strong>
                    </span>
                </div>
            </div>
        </div>
    </form>
</x-modal>
<!-- Update Employee Modal -->
<!-- Destroy Employee Modal -->
<x-modal icon="fa fa-times mr-5" title="Delete Employee" modalId="destroy-employee" formId="delete-employee" modalSize="modal-sm" yesOrNo="true">
    <form id="delete-employee" action="" method="post">
        @csrf
        @method('DELETE')
        <div class="form-group row" style="font-size: 1.142857rem;">
            <div class="col">
                You are about to delete record of: <br><span id="employee"><b></b></span>.
            </div>
        </div>
    </form>
</x-modal>
<!-- Destroy Employee Modal -->
@endsection