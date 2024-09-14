@extends('admin.admin_dashboard')

@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Product Category</h4>
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
            {{-- <button button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
               <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                <a style="color: aliceblue;" href="">Add Category</a>
            </button> --}}
        </div>
    </div>
    <div class="container-fluid">
        <form action="{{route('admin.upload_category')}}" method="post" id="categoryForm" name="categoryForm" enctype="multipart/form-data">
            @csrf
        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-body">	
                <div class="col-sm-6 mb-4">
                    <h4>Create Category</h4>
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
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control" >	
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status">Status</label>
							<select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>									
                </div>
            </div>							
        </div>
        <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-primary">Upload Category</button>
        </div>
        </form>
    </div>
    <div class="col-12 mt-2">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">All Categories</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="100" scope="col">Image</th>
                            <th width="100" scope="col">Name</th>
                            <th width="100" scope="col">Slug</th>
                            <th width="100" scope="col">Status</th>
                            <th width="100" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $categories)
                        @if ($categories != "")
                        <tr>
                            <td>
                                @if ($categories->image != "")
                                <img src="/categoryimage/{{$categories->image}}"  width="50" >
                                @else
                                <p>no image</p>
                                @endif
                                
                            </td>
                            <td>{{ $categories->name }}</td>
                            <td>{{ $categories->slug }}</td>
                            <td>
                                @if ( $categories->status != 0 )
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            
                            <td>
                                <a href="{{route('admin.edit_category',$categories->id)}}"><span class="badge bg-success">Edit</span></a>
                                <a href="{{route('admin.delete_category',$categories->id)}}"><span class="badge bg-danger">Delete</span></a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="your-paginate mt-4">
        {{ $category->links() }}
    </div>
</div>


@endsection