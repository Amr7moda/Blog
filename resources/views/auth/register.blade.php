@extends('web.layout')

@section('title')
create
@endsection

@section('body')

<!-- Validation Errors -->

<div class="container ">
    <div class="row p-5 login">
        <div class="col-8  p-4 shadow border login">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                @csrf

                <!-- Fname -->
                <div>
                    <x-label for="fname" :value="__('First Name')" />

                    <x-input id="fname" class="block mt-1 w-full form-control" type="text" name="fname" :value="old('fname')" required autofocus />
                </div>

                <!-- Lname -->
                <div>
                    <x-label for="lname" :value="__('Last Name')" />

                    <x-input id="lname" class="block mt-1 w-full form-control" type="text" name="lname" :value="old('lname')" required autofocus />
                </div>

                <!-- Phone -->
                <div>
                    <x-label for="phone" :value="__('Phone')" />

                    <x-input id="phone" class="block mt-1 w-full form-control" type="number" name="phone" :value="old('phone')" required autofocus />
                </div>

                <!-- Phone -->
                <div>
                    <x-label for="address" :value="__('Address')" />

                    <x-input id="address" class="block mt-1 w-full form-control" type="text" name="address" :value="old('address')" required autofocus />
                </div>

                <!-- job -->
                <div>
                    <x-label for="job" :value="__('Job')" />

                    <x-input id="job" class="block mt-1 w-full form-control" type="text" name="job" :value="old('job')" autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- profile picture -->
                <div class="my-4">
                    <label class="p-1" for="profile picture"> Choose Your Profile Picture</label>
                    <x-input class="form-control p-2" type="file" name="pimage" id="" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="text-decoration-none mt-2 pe-3" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="btn btn-lg p-2 shadow w-25" style="color: black !important;">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection