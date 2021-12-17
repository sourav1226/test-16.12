<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Test</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/view') }}">Members</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/tree_view') }}">Tree view</a>
                    </li>

                </ul>
                <form class="d-flex" method="POST" action="{{ url('/search') }}">
                    @csrf
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="query">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container p-5">
        @if (session('status'))
            <div class="alert alert-info" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ url('/store') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name"> <span
                    style="color: red">@error('name'){{ $message }}@enderror
                    </span>

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="email">
                    <span style="color: red">@error('email'){{ $message }}@enderror
                        </span>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        <span style="color: red">@error('password'){{ $message }}@enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mobile No</label>
                            <input type="tel" class="form-control" name="phone">
                            <span style="color: red">@error('phone'){{ $message }}@enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">City</label>
                                <select class="form-select" aria-label="Default select example" name="city">
                                    <span style="color: red">@error('city'){{ $message }}@enderror
                                        </span>
                                        <option value="Kolkata">Kolkata</option>
                                        <option value="Pune">Pune</option>
                                        <option value="Mumbai">Mumbai</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Select Gender</label>
                                    <div>
                                        <input type="radio" id="male" value="Male" name="gender">
                                        <label for="male">Male</label><br>
                                        <input type="radio" id="female" value="Female" name="gender">
                                        <label for="female">Female</label><br>
                                        <span style="color: red">@error('gender'){{ $message }}@enderror
                                            </span>
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Meretial Status</label>
                                        <div>
                                            <input type="radio" id="Married" name="meretial_status" value="Married">
                                            <label for="Married">Married</label><br>
                                            <input type="radio" id="Unmarried" name="meretial_status" value="Unmarried">
                                            <label for="Unmarried">Unmarried</label><br>
                                            <span style="color: red">@error('meretial_status'){{ $message }}@enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Date Of Birth</label>
                                            <input type="date" id="dob" name="dob" style="width: 100% ">
                                            <span style="color: red">@error('dob'){{ $message }}@enderror
                                                </span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Role</label>
                                                <select class="form-select" aria-label="Default select example" name="role_id" id="role_id">
                                                    <option selected>Select Role</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                    <span style="color: red">@error('role_id'){{ $message }}@enderror
                                                        </span>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Sub Role</label>
                                                    <select class="form-select" aria-label="Default select example" name="sub_role_id" id="sub_role_id">
                                                        <option selected>Select Sub Role</option>
                                                    </select>
                                                    <span style="color: red">@error('sub_role_id'){{ $message }}@enderror
                                                        </span>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>



                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                                                                                        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                                                                                        crossorigin="anonymous">
                                            </script>

                                            <script>
                                                jQuery(document).ready(function() {
                                                    jQuery('#role_id').change(function() {
                                                        let cid = jQuery(this).val();
                                                        jQuery('#sub_role_id').html('<option value="">Select Sub Role</option>')
                                                        jQuery.ajax({
                                                            url: '/getsubrole',
                                                            type: 'post',
                                                            data: 'cid=' + cid + '&_token={{ csrf_token() }}',
                                                            success: function(result) {
                                                                jQuery('#sub_role_id').html(result)
                                                            }
                                                        });
                                                    });



                                                });
                                            </script>



                                        </body>

                                        </html>
