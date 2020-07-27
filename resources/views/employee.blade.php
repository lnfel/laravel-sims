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
            <button type="button" class="btn btn-success btn-noborder">
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
@endsection