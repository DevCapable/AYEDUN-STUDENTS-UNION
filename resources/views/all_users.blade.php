<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User | Dashboard</title>
    @include('layouts.styles')
    <style>
        .help-block {
            color: #dc3545;
        }

        .has-error {
            color: #dc3545;
        }


        span {
            float: right;
        }

        .card:hover {
            box-shadow: 0px 2px 7px 2px gray;
        }

        img {
            border-radius: 100px;
        }

    </style>
</head>
@include('layouts.header')

<body style="padding-top: 100px">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <form method="POST" action="{{ url('user/image-upload') }}" id="logout" novalidate>
                    <button style=" float: right;" type="submit" class="btn btn-sm btn-primary"> <a
                            style="color: white; text-decoration:none" href="/user/image-upload"> Upload Profile
                            Picture</a></button>
                </form>
                <form method="POST" action="{{ url('user/logout') }}" id="logout" novalidate>
                    @csrf
                    <button style=" float: right;" type="submit" class="btn btn-sm btn-primary">Log Out</button>
                </form>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title pull-left text-uppercase text-info font-weight-bolder">Student's List</h3>
                        <h3 class="pull-right"><a class="btn btn-primary btn-sm" href="{{ url('user/onlineUsers') }}">Chat Room</a> <a
                                href="javascript:void(0)" onclick="window.history.back();" class="btn btn-info">Go
                                Back</a></h3>
                    </div>
                        @include('searchUsers')
                        <div class="row el-element-overlay">
                            @foreach ($users as $user)<br />
                                <div class="col-lg-3 col-md-3 col-sm-6" style="padding-top: 20px">
                                    <div class="card bg-white card-hover">
                                        <div class="card-header">
                                            <span style="float: left" class="badge badge-info pull-right">Active since
                                                {{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
                                            </span>
                                            <span class="badge badge-success pull-right">{{ $user->gender }}</span>
                                        </div>
                                        <div class="card-body" style="height: 100%; width: 100%">
                                            <div class="card-title text-center">
                                                <img src="{{ asset($user->picture) }}" class="img_thumbnails"
                                                    width="200px" height="200px" class="img-thumbnail"
                                                    alt="Ayedun Students' Union" /><br />
                                                {{ strtoupper($user->fullname) }}
                                            </div>
                                            <br />
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ url('user/view_user_profile/' . $user->id) }}"
                                                class="btn btn-outline-primary btn-sm pull-right">
                                                <i class="fa fa-eye"></i> PROFILE
                                            </a>
                                            <span class="badge badge-success pull-right">{{ $user->compound }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                   
                    <div class="card-footer">
                        <div class="card card-body bg-transparent">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
    </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

    </div>
    @include('layouts.footer')
    @include('layouts.scripts')

</body>

</html>
