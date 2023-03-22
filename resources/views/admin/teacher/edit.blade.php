@extends('admin.master')

@section('body')
    <div class="row ">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add Teacher from</h4>
                    <h4 class="text-center text-success">
                        {{session('message')}}
                    </h4>
                    <form action="{{route('teacher.update', ['id'=>$teacher->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Full name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="horizontal-firstname-input"
                                value="{{$teacher->name}}"
                                >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="horizontal-email-input"
                                       value="{{$teacher->email}}"
                                >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="horizontal-password-input"
                                       value="{{$teacher->password}}"
                                >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Mobile Number</label>
                            <div class="col-sm-9">
                                <input type="number" name="mobile" class="form-control"
                                       value="{{$teacher->mobile}}"
                                >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control-file" >
                                <img src="{{asset($teacher->image)}}" height="100" width="120"/>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                {{--                               <div class="custom-control custom-checkbox mb-4">--}}
                                {{--                                   <input type="checkbox" class="custom-control-input" id="horizontal-customCheck">--}}
                                {{--                                   <label class="custom-control-label" for="horizontal-customCheck">Remember me</label>--}}
                                {{--                               </div>--}}

                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Teacher</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
