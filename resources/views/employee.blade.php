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
            <button type="button" class="btn btn-success btn-noborder" data-toggle="modal" data-target="#modal-slideup">
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
              <th class="text-center"></th>
              <th>Name</th>
              <th class="d-none d-sm-table-cell">Email</th>
              <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
              <th class="text-center" style="width: 15%;">Profile</th>
            </tr>
          </thead>
          <tbody>
          	<tr>
                <td class="text-center">{{ Auth::guard('account')->user()->id }}</td>
                <td class="font-w600"><a href="#">{{ Auth::guard('account')->user()->employee->first_name }}</a></td>
                <td class="d-none d-sm-table-cell">{{ Auth::guard('account')->user()->email }}</td>
                <td class="d-none d-sm-table-cell">
                    <span class="badge badge-success">{{ Auth::guard('account')->user()->status->name }}</span>
                </td>
                <td class="text-center">
                	<button type="button" class="btn btn-primary mr-5 mb-5">
                    <i class="fa fa-edit"></i>
                  </button>
                	<button type="button" class="btn btn-danger mr-5 mb-5">
                    <i class="fa fa-times"></i>
                  </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">1</td>
                <td class="font-w600">Ryan Flores</td>
                <td class="d-none d-sm-table-cell">customer1@example.com</td>
                <td class="d-none d-sm-table-cell">
                    <span class="badge badge-success">VIP</span>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                        <i class="fa fa-user"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td class="font-w600">Carol Ray</td>
                <td class="d-none d-sm-table-cell">customer2@example.com</td>
                <td class="d-none d-sm-table-cell">
                    <span class="badge badge-info">Business</span>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                        <i class="fa fa-user"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td class="font-w600">Carol Ray</td>
                <td class="d-none d-sm-table-cell">customer3@example.com</td>
                <td class="d-none d-sm-table-cell">
                    <span class="badge badge-primary">Personal</span>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                        <i class="fa fa-user"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td class="font-w600">Marie Duncan</td>
                <td class="d-none d-sm-table-cell">customer4@example.com</td>
                <td class="d-none d-sm-table-cell">
                    <span class="badge badge-warning">Trial</span>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                        <i class="fa fa-user"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td class="font-w600">Amanda Powell</td>
                <td class="d-none d-sm-table-cell">customer5@example.com</td>
                <td class="d-none d-sm-table-cell">
                    <span class="badge badge-danger">Disabled</span>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                        <i class="fa fa-user"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">6</td>
                <td class="font-w600">Jeffrey Shaw</td>
                <td class="d-none d-sm-table-cell">customer6@example.com</td>
                <td class="d-none d-sm-table-cell">
                    <span class="badge badge-success">VIP</span>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                        <i class="fa fa-user"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">7</td>
                <td class="font-w600">Lori Grant</td>
                <td class="d-none d-sm-table-cell">customer7@example.com</td>
                <td class="d-none d-sm-table-cell">
                    <span class="badge badge-danger">Disabled</span>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                        <i class="fa fa-user"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">8</td>
                <td class="font-w600">Andrea Gardner</td>
                <td class="d-none d-sm-table-cell">customer8@example.com</td>
                <td class="d-none d-sm-table-cell">
                    <span class="badge badge-warning">Trial</span>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                        <i class="fa fa-user"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">9</td>
                <td class="font-w600">Sara Fields</td>
                <td class="d-none d-sm-table-cell">customer9@example.com</td>
                <td class="d-none d-sm-table-cell">
                    <span class="badge badge-success">VIP</span>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                        <i class="fa fa-user"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">10</td>
                <td class="font-w600">Marie Duncan</td>
                <td class="d-none d-sm-table-cell">customer10@example.com</td>
                <td class="d-none d-sm-table-cell">
                    <span class="badge badge-danger">Disabled</span>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                        <i class="fa fa-user"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">11</td>
                <td class="font-w600">Sara Fields</td>
                <td class="d-none d-sm-table-cell">customer11@example.com</td>
                <td class="d-none d-sm-table-cell">
                    <span class="badge badge-success">VIP</span>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                        <i class="fa fa-user"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">12</td>
                <td class="font-w600">Brian Cruz</td>
                <td class="d-none d-sm-table-cell">customer12@example.com</td>
                <td class="d-none d-sm-table-cell">
                    <span class="badge badge-info">Business</span>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                        <i class="fa fa-user"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">13</td>
                <td class="font-w600">Jose Parker</td>
                <td class="d-none d-sm-table-cell">customer13@example.com</td>
                <td class="d-none d-sm-table-cell">
                    <span class="badge badge-danger">Disabled</span>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                        <i class="fa fa-user"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">14</td>
                <td class="font-w600">Brian Cruz</td>
                <td class="d-none d-sm-table-cell">customer14@example.com</td>
                <td class="d-none d-sm-table-cell">
                    <span class="badge badge-info">Business</span>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                        <i class="fa fa-user"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="text-center">15</td>
                <td class="font-w600">Jesse Fisher</td>
                <td class="d-none d-sm-table-cell">customer15@example.com</td>
                <td class="d-none d-sm-table-cell">
                    <span class="badge badge-primary">Personal</span>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                        <i class="fa fa-user"></i>
                    </button>
                </td>
            </tr>
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
<div class="modal fade" id="modal-slideup" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slideup" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title"><i class="fa fa-user-plus mr-5"></i></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form>
                        <h5 class="mb-1">Personal Info</h5>
                        <div class="form-group row mb-4">
                            <div class="col-md-4">
                                <div class="form-material form-material-primary floating">
                                    <input type="text" class="form-control" id="first_name" name="first_name">
                                    <label for="first_name">Given Name</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material form-material-primary floating">
                                    <input type="text" class="form-control" id="middle_name" name="middle_name">
                                    <label for="middle_name">Middle Name</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material form-material-primary floating">
                                    <input type="text" class="form-control" id="last_name" name="last_name">
                                    <label for="last_name">Surname</label>
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
                                    <label for="province">City / Province</label>
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-alt-success" data-dismiss="modal">
                    <i class="fa fa-check"></i> Perfect
                </button>
            </div>
        </div>
    </div>
</div>
@endsection