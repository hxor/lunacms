@extends('layouts.backend.app')

@section('styles')
    <!-- DataTables -->
@endsection


@section('content')
  <div class="container">

        @include('layouts.backend.partials._bread', ['data' => empty($bread) ? '' : $bread])

        <div class="row">
            <div class="col-md-4 col-lg-3">
                <div class="profile-detail card-box">
                    <div>
                        <img src="{{ $user->photo }}" class="img-circle" alt="profile-image">

                        <ul class="list-inline status-list m-t-20">
                            <li>
                                <h3 class="text-primary m-b-5">{{ ucwords($user->role) }}</h3>
                                <p class="text-muted">Role</p>
                            </li>

                            <li>
                                <h3 class="text-success m-b-5">{{ ucwords($user->active==1 ? 'Active' : 'Inactive') }}</h3>
                                <p class="text-muted">Status Account</p>
                            </li>
                        </ul>

                        <button type="button" class="btn btn-pink btn-custom btn-rounded waves-effect waves-light">Follow</button>
                    </div>

                </div>

            </div>


            <div class="col-lg-9 col-md-8">
                <div class="card-box">
                    <div class="text-left">
                            <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15">{{ ucwords($user->name) }}</span></p>

                            <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15">{{ $user->email }}</span></p>

                            <p class="text-muted font-13"><strong>Added Date :</strong> <span class="m-l-15">{{ $user->created_at }}</span></p>

                        </div>


                        <div class="button-list m-t-20">
                            <button type="button" class="btn btn-facebook waves-effect waves-light">
                               <i class="fa fa-facebook"></i>
                            </button>

                            <button type="button" class="btn btn-twitter waves-effect waves-light">
                               <i class="fa fa-twitter"></i>
                            </button>

                            <button type="button" class="btn btn-linkedin waves-effect waves-light">
                               <i class="fa fa-linkedin"></i>
                            </button>

                            <button type="button" class="btn btn-dribbble waves-effect waves-light">
                               <i class="fa fa-dribbble"></i>
                            </button>

                        </div>
                </div>
            </div>

        </div>
  </div>
@endsection

@section('scripts')
    
@endsection
