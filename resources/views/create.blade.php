@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('saveprofile') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- FIRST NAME -->

                        <div class="form-group row">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="Fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- LAST NAME -->

                        <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="Lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- HOME ADDRESS -->

                        <div class="form-group row">
                            <label for="Addr" class="col-md-4 col-form-label text-md-right">{{ __('Home Address') }}</label>

                            <div class="col-md-6">
                                <input id="Addr" type="text" class="form-control @error('Addr') is-invalid @enderror" name="Address" value="{{ old('Addr') }}" required autocomplete="Addr" autofocus>

                                @error('Addr')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- PHONE NUMBER -->

                        <div class="form-group row">
                            <label for="pnum" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="pnum" type="text" class="form-control @error('pnum') is-invalid @enderror" name="Pnumber" value="{{ old('pnum') }}" required autocomplete="pnum" autofocus>

                                @error('pnum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- EMAIL ADDRESS -->

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="Email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- PROFILE IMAGE -->

                        <div class="form-group row">
                            <label for="img1" class="col-md-4 col-form-label text-md-right">{{ __('Add Image') }}</label>

                            <div class="col-md-6">
                                <input class="file-input" type="file" ref="file" name="Image1" @change="addFile()">

                                <!-- Check if Image is Import -->

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                ||
                                <button type="reset" class="btn btn-primary">
                                    {{ __('Clear Fields') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection