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
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <li><span class="caret">Mr Ram(CEO)</span>
        <ul class="nested">
            @foreach ($members as $member)
                <li>{{ $member->name }} <span style="margin: 0 5px">{{ $member->MemberRoles->name }}</span>
                </li>
            @endforeach

            <ul class="nested">
                @foreach ($leaders as $leader)
                    <li>{{ $leader->name }} <span style="margin: 0 5px">{{ $leader->MemberRoles->name }}</span>
                    </li>
                @endforeach

                <ul class="nested">
                    @foreach ($seniors as $senior)
                        <li>{{ $senior->name }} <span style="margin: 0 5px">{{ $senior->MemberRoles->name }}</span>
                        </li>
                    @endforeach

                    <ul class="nested">
                        @foreach ($juniors as $junior)
                            <li>{{ $junior->name }} <span
                                    style="margin: 0 5px">{{ $junior->MemberRoles->name }}</span>
                            </li>
                        @endforeach
                    </ul>
                </ul>
            </ul>
        </ul>

    </li>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
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
