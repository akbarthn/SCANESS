@extends('layouts.karyawan')

@section('content')
<div class="py-6">
    <h2 class="text-2xl font-semibold text-gray-800 leading-tight mb-6">Profil</h2>

    <div class="max-w-7xl mx-auto space-y-6">
        <!-- Update Profile Info -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>
    </div>
</div>
@endsection

