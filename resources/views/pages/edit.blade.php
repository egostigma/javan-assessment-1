@extends('app')

@section('title')
    {{ __('Family Tree') }} | {{ __('Edit') }}  {{ $member->name }}
@endsection

@section('content')
    @include('components.alert')
    <div class="container">
        <form method="POST" action="{{ route('family-member.update', $member->id) }}">
            @csrf
            @method('PUT')
            <h1>{{ __("Update Family Member") }}</h1>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" placeholder="Mustopa" value="{{ old('name', $member->name) }}" required>
                <label for="name" class="form-label">{{ __("Name") }}*</label>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">{{ __("Gender") }}*</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="m" id="gender-m" {{ old('gender', $member->gender) == 'm' ? 'checked' : ''}}>
                    <label class="form-check-label" for="gender-m">
                        {{ __("Male") }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="f" id="gender-f" {{ old('gender', $member->gender) == 'f' ? 'checked' : ''}}>
                    <label class="form-check-label" for="gender-f">
                        {{ __("Female") }}
                    </label>
                </div>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" name="parent_id">
                    <option selected>{{ __('Select parent') }}</option>
                    @foreach ($family_members as $family_member)
                        <option value="{{ $family_member->id }}" {{ old('parent_id', $member->parent_id) == $family_member->id ? 'selected' : ''}}>{{ $family_member->name }}</option>
                    @endforeach
                </select>
                <label for="name" class="form-label">{{ __("Parent") }}</label>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="{{ route("family-member.show", $member->id) }}" class="btn btn-info">{{ __("Cancel") }}</a>
                <button class="btn btn-primary" type="submit">{{ __("Save") }}</button>
            </div>
        </form>
    </div>
@endsection
