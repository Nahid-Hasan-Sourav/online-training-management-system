@extends('teacher.master')

@section('body')
    <div class="row ">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add Training from</h4>
                    <h4 class="text-center text-success">
                        {{session('message')}}
                    </h4>
                    <form action="{{route('training.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Training Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <teaxtarea  name="description" class="form-control" id="horizontal-email-input">

                                </teaxtarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Starting Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="starting_date" class="form-control" id="horizontal-password-input">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Training Price</label>
                            <div class="col-sm-9">
                                <input type="number" name="mobile" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control-file" >
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                {{--                               <div class="custom-control custom-checkbox mb-4">--}}
                                {{--                                   <input type="checkbox" class="custom-control-input" id="horizontal-customCheck">--}}
                                {{--                                   <label class="custom-control-label" for="horizontal-customCheck">Remember me</label>--}}
                                {{--                               </div>--}}

                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Create New Training</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
