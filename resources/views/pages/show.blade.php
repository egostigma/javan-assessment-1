@extends('app')

@section('title')
    {{ __('Family Tree') }} | {{ $member->name }}
@endsection

@section('content')
    @include('components.alert')
    <div class="container">
        <h1>{{ __("Family Member") }}</h1>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" placeholder="Mustopa" value="{{ old('name', $member->name) }}" disabled>
            <label for="name" class="form-label">{{ __("Name") }}*</label>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">{{ __("Gender") }}*</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="m" id="gender-m" {{ old('gender', $member->gender) == 'm' ? 'checked' : ''}} disabled>
                <label class="form-check-label" for="gender-m">
                    {{ __("Male") }}
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="f" id="gender-f" {{ old('gender', $member->gender) == 'f' ? 'checked' : ''}} disabled>
                <label class="form-check-label" for="gender-f">
                    {{ __("Female") }}
                </label>
            </div>
        </div>

        <div class="form-floating mb-3">
            <select class="form-select" name="parent_id" disabled>
                <option selected>{{ __('Select parent') }}</option>
                @foreach ($family_members as $family_member)
                    <option value="{{ $family_member->id }}" {{ old('parent_id', $member->parent_id) == $family_member->id ? 'selected' : ''}}>{{ $family_member->name }}</option>
                @endforeach
            </select>
            <label for="name" class="form-label">{{ __("Parent") }}</label>
        </div>
        <form method="POST" action="{{ route('family-member.destroy', $member->id) }}">
            @csrf
            @method('DELETE')
            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="{{ route("family-member.edit", $member->id) }}" class="btn btn-warning">{{ __("Edit") }}</a>
                <button class="btn btn-danger" type="submit">{{ __("Delete") }}</button>
                <a href="{{ route("family-member.index") }}" class="btn btn-info" type="button">{{ __("Back") }}</a>
            </div>
        </form>
    </div>
@endsection
