<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Add User</h1>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ ((isset($data->id)) && ($data->id != "")) ? route('users.update',$data->id) : route('users.store') }}" method="post">
            {{-- {{ ((isset($data->id)) && ($data->id != "")) ? method_field('PUT') :  method_field('POST') }} --}}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input class="form-control" id="name" type="text" name="name" value="{{ (isset($data->id) && $data->id != '') ? $data->name : old('name') }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" type="text" name="email" value="{{ (isset($data->id) && $data->id != '') ? $data->email : old('email') }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="alt_email">Alternate Email</label>
                        <input class="form-control" id="alt_email" type="text" name="alt_email" value="{{ (isset($data->id) && $data->id != '') ? $data->alt_email : old('alt_email') }}">
                        @if ($errors->has('alt_email'))
                            <span class="text-danger">
                                {{ $errors->first('alt_email') }}
                            </span>
                        @endif
                    </div>
                </div>
                @if(!isset($data->id))
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input class="form-control" id="password" type="password" name="password" value="">
                        @if ($errors->has('password'))
                            <span class="text-danger">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="password_confirmation">Confirm Password</label>
                        <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" value="">
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">
                                {{ $errors->first('password_confirmation') }}
                            </span>
                        @endif
                    </div>
                </div>
                @endif
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="phone">Phone Number</label>
                        <input class="form-control" id="phone" type="text" name="phone" value="{{ (isset($data->id) && $data->id != '') ? $data->phone : old('phone') }}">
                        @if ($errors->has('phone'))
                            <span class="text-danger">
                                {{ $errors->first('phone') }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="">Select Status</option>
                            <option value="1" {{ (isset($data->status) && $data->status == 1) ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ (isset($data->status) && $data->status == 0) ? 'selected' : '' }}>In Active</option>
                        </select>
                        @if ($errors->has('status'))
                            <span class="text-danger">
                                {{ $errors->first('status') }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="profile_image">Profile Image</label>
                        <input class="form-control" id="profile_image" type="file" name="profile_image" value="{{ (isset($data->id) && $data->id != '') ? $data->user_name : '' }}">
                        @if ($errors->has('profile_image'))
                            <span class="text-danger">
                                {{ $errors->first('profile_image') }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Save User</button>
                    <a href="{{ route('users.list') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
