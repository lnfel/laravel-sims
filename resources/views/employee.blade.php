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
    <span>Status: </span>{{-- $response->status() --}}
    <div class="block">
      <div class="block-header block-header-default">
          <h3 class="block-title">Dynamic Table <small>Full pagination</small></h3>
      </div>
      <div class="block-content block-content-full">
        <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
          <thead>
            <tr>
              <th class="text-center">Employee number</th>
              <th>Name</th>
              <th class="d-none d-sm-table-cell">Email</th>
              <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
              <th class="text-center" style="width: 15%;">Profile</th>
            </tr>
          </thead>
          <tbody>
            @forelse($employees as $e)
          	<tr>
                <td class="text-center">{{ $e->number }}</td>
                <td class="font-w600"><a href="#">{{ $e->first_name }}</a></td>
                <td class="d-none d-sm-table-cell">{{ $e->personal_email }}</td>
                <td class="d-none d-sm-table-cell">
                    <span class="badge badge-success">{{ $e->account->status->name }}</span>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-primary mr-5 mb-5" data-toggle="modal" data-target-id="{{ $e->number }}" data-target="#update-employee">
                        <i class="fa fa-edit"></i>
                    </button>
                	<button type="button" class="btn btn-danger mr-5 mb-5">
                        <i class="fa fa-times"></i>
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td>{{ __('No employees found on database.') }}</td>
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
            <div class="col-md-4">
                <div class="form-material form-material-primary floating">
                    <input id="number" type="text" class="form-control" name="number" value="{{ $new_username ?? date('Ymd').'01' }}" readonly="" style="background-color: #f0f2f5;">
                    <label for="number">Employee and Account number</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-material form-material-primary {{($errors->storeEmployee->first('account_type') ? ' form-error store' : '')}} floating">
                    <select class="form-control" id="account_type" name="account_type">
                        <option hidden="" value="0">-- Select Role --</option>
                        @forelse($account_types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @empty
                            <option disabled="">{{ __('No account types found on database.') }}</option>
                        @endforelse
                    </select>
                    <label for="region">Account Type</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->storeEmployee->first('account_type') }}</strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-material form-material-primary {{($errors->storeEmployee->first('personal_email') ? ' form-error store' : '')}} floating">
                    <input id="personal_email" type="email" name="personal_email" class="form-control">
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
                    <input type="text" class="form-control" id="first_name" name="first_name">
                    <label for="first_name">First Name</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->storeEmployee->first('first_name') }}</strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-material form-material-primary {{($errors->storeEmployee->first('middle_name') ? ' form-error' : '')}} floating">
                    <input type="text" class="form-control" id="middle_name" name="middle_name">
                    <label for="middle_name">Middle Name</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->storeEmployee->first('middle_name') }}</strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-material form-material-primary {{($errors->storeEmployee->first('last_name') ? ' form-error' : '')}} floating">
                    <input type="text" class="form-control" id="last_name" name="last_name">
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
                <div class="form-material form-material-primary floating">
                    <input type="text" class="form-control" id="address" name="address">
                    <label for="address">Street address</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <div class="form-material form-material-primary floating">
                    <select class="form-control" id="region" name="region">
                        <option hidden="">-- Choose Region --</option>
                        @forelse($regions as $region)
                            <option value="{{ $region->region_code }}">{{ $region->region_description }}</option>
                        @empty
                            <option disabled="">{{ __('No regions found on database.') }}</option>
                        @endforelse
                    </select>
                    <label for="region">Region</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-material form-material-primary floating">
                    <select class="form-control" id="province" name="province" disabled="">
                        <option hidden="">-- Select Region first --</option>
                    </select>
                    <label for="province">Province</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <div class="form-material form-material-primary floating">
                    <select class="form-control" id="municipality" name="municipality" disabled="">
                        <option hidden="">-- Select Province first --</option>
                    </select>
                    <label for="municipality">Municipality / City</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-material form-material-primary floating">
                    <select class="form-control" id="brgy" name="brgy" disabled="">
                        <option hidden="">-- Select a Municipality / City first --</option>
                    </select>
                    <label for="brgy">Baranggay</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-material form-material-primary floating">
                    <input type="text" class="form-control" id="zip_code" name="zip_code">
                    <label for="zip_code">Zip Code</label>
                </div>
            </div>
        </div>
    </form>
</x-modal>
<!-- Store Employee Modal -->
<!-- Update Employee Modal -->
<x-modal icon="fa fa-edit mr-5" title="Edit Employee" modalId="update-employee" formId="edit-employee">
    <form id="edit-employee" action="" method="post">
        @csrf
        <h5 class="mb-1">Account Info</h5>
        <div class="form-group row mb-4">
            <div class="col-md-4">
                <div class="form-material form-material-primary floating">
                    <input id="edit-number" type="text" class="form-control" name="number" style="background-color: #f0f2f5;">
                    <label for="number">Employee number</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-material form-material-primary {{($errors->storeEmployee->first('account_type') ? ' form-error store' : '')}} floating">
                    <select class="form-control" id="account_type" name="account_type">
                        <option hidden="" value="0">-- Select Role --</option>
                        @forelse($account_types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @empty
                            <option disabled="">{{ __('No account types found on database.') }}</option>
                        @endforelse
                    </select>
                    <label for="region">Account Type</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->storeEmployee->first('account_type') }}</strong>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-material form-material-primary {{($errors->storeEmployee->first('personal_email') ? ' form-error store' : '')}} floating">
                    <input id="personal_email" type="email" name="personal_email" class="form-control">
                    <label for="personal_email">Email</label>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->storeEmployee->first('personal_email') }}</strong>
                    </span>
                </div>
            </div>
        </div>
    </form>
</x-modal>
<!-- Update Employee Modal -->
@endsection