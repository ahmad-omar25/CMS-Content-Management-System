@extends('website.layout.app')

@section('wizardCss')
    <link rel="stylesheet" type="text/css" href="{{url('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons')}}" />
    <link rel="stylesheet" href="{{url('https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css')}}" />
    <!-- CSS Files -->
    <link href="{{asset('website/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('website/assets/css/material-bootstrap-wizard.css')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->

    <!-- Wizard -->
@endsection

@section('content')
    <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="wizard-container pt-0">
                        <div class="card wizard-card" data-color="red" id="wizard">
                            <form action="{{route('profile.update', $user->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->
                                <div class="wizard-header"><h3 class="wizard-title">Update Information</h3></div>
                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#details" data-toggle="tab">Account</a></li>
                                        <li><a href="#captain" data-toggle="tab">About you</a></li>
                                        <li><a href="#description" data-toggle="tab">Reset Password</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane" id="details">
                                        <div class="picture-container">
                                            <div class="picture">
                                                <img src="{{asset('assets/users/' . $user->user_image)}}" class="picture-src" id="wizardPicturePreview" title="">
                                                <input type="file" name="user_image" id="wizard-picture">
                                            </div>
                                            <h6>Choose Picture</h6>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Your Name</label>
                                                        <input name="name" type="text" value="{{$user->name}}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">email</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Your Email</label>
                                                        <input type="email" value="{{$user->email}}" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane pt-4" id="captain">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Your Mobile</label>
                                                        <input name="mobile" type="text" value="{{$user->mobile}}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">email</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Your Bio</label>
                                                        <input name="bio" type="text" value="{{$user->bio}}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane pt-4" id="description">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Your password</label>
                                                        <input name="password" type="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Confirm Password</label>
                                                        <input name="password_confirmation" type="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <button class='btn btn-fill btn-danger btn-wd'>Submit</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
                <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                    @include('website.users.include.sidebar')
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection

@section('wizard')
    <!--   Core JS Files   -->
    <script src="{{asset('website/assets/js/jquery.bootstrap.js')}}" type="text/javascript"></script>
    <!--  Plugin for the Wizard -->
    <script src="{{asset('website/assets/js/material-bootstrap-wizard.js')}}"></script>
    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
    <script src="{{asset('website/assets/js/jquery.validate.min.js')}}"></script>
@endsection
