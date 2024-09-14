@extends('admin.admin_dashboard')

@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Product Sub Category</h4>
            </div>
         <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
                <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
            </div>
            <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="printer"></i>
                Download Report
            </button>
        </div>
    </div>
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-body">	
                <div class="col-sm-6 mb-4">
                    <h4>Create Sub Category</h4>
                </div>							
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>	
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" required>	
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control" required>	
                        </div>
                    </div> --}}
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="category">Category</label>
							<select name="category" id="category" class="form-control">
                                <option value="">Active</option>
                                <option value="">Inactive</option>
                            </select>
                        </div>
                    </div>									
                </div>
            </div>							
        </div>
        <div class="pb-5 pt-3">
            <button class="btn btn-primary">Create</button>
            <a href="brands.html" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
    </div>
    <div class="col-12 mt-2">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">All Sub Categories</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="100" scope="col">#</th>
                            <th width="100" scope="col">Name</th>
                            <th width="100" scope="col">Slug</th>
                            <th width="100" scope="col">Category</th>
                            <th width="100" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>John</td>
                            <td>Doe</td>
                            <td>Doe</td>
                            <td>
                                <a href=""><span class="badge bg-success">Edit</span></a>
                                <a href=""><span class="badge bg-danger">Delete</span></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection