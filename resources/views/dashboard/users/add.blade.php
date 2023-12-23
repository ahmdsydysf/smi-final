@extends('dashboard.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Horizontal Form</h4>
        <p class="card-description">
            Horizontal form layout
        </p>

        <form class="forms-sample" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group row">
                <x-input-label class="col-sm-3 col-form-label" for="name" :value="__('Name')" />
                <x-text-input class="form-control" id="name" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="form-group row">
                <x-input-label class="col-sm-3 col-form-label" for="email" :value="__('email')" />
                <x-text-input class="form-control" id="email" type="text" name="email" :value="old('email')" required
                    autofocus autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="form-group row">
                <x-input-label class="col-sm-3 col-form-label" for="password" :value="__('Password')" />

                <x-text-input class="form-control" id="password" class="block mt-1 w-full" type="password"
                    name="password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="form-group row">
                @foreach ( $data as $role )
                <div class="form-check form-check-primary">
                    <label class="form-check-label">

                        <input type="radio" class="form-check-input" name="role" id="ExampleRadio{{ $role->id }}" {{
                            $role->name == 'user' ? 'checked' : '' }}>
                        {{ $role->display_name }}
                        <i class="input-helper"></i></label>
                </div>
                @endforeach

            </div>

            <button type="submit" class="btn btn-primary me-2">Submit</button>
            <a href="{{ url()->previous() }}" class="btn btn-light">Cancel</a>
        </form>
    </div>
</div>
@endsection

@section('page_title' , 'Main Dashboard')