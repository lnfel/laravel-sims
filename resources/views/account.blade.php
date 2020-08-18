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
              <span class="font-w300">Accounts</span>
              <span class="font-w400 font-size-lg text-white-op d-none d-md-inline-block">Index</span>
            </h1>
          </div>

          <div class="col-md py-10 d-md-flex align-items-md-center justify-content-md-end text-center">
            <button type="button" class="btn btn-success btn-noborder" data-toggle="modal" data-target="#store-employee">
                <i class="fa fa-user-plus mr-5"></i> New Account
            </button>
          </div>
      	</div>
      </div>
    </div>
  </div>
  <!-- Hero -->
	<!-- Page Content -->
  <div class="content">
    @if(session('success'))
    <div id="notify" data-type="success"></div>
    @endif

    <div class="block">
      <!-- <div class="block-header block-header-default">
          <h3 class="block-title">Dynamic Table <small>Full pagination</small></h3>
      </div> -->
      <div class="block-content block-content-full">
        <form action="{{ route('accounts.index') }}" method="get">
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
            
          </tbody>
        </table>
      </div>
    </div><!-- block -->
  </div>
  <!-- Page Content -->
</main>
@endsection