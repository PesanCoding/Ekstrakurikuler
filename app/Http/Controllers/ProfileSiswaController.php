<?php

namespace App\Http\Controllers;

use App\Models\ProfileSiswa;
use App\Http\Requests\StoreProfileSiswaRequest;
use App\Http\Requests\UpdateProfileSiswaRequest;
use App\Models\User;

class ProfileSiswaController extends Controller
{
    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('siswa.profile.show_profile', compact('data'));
    }
    public function edit(User $user)
    {
        $data = User::findOrFail(auth()->user()->id);
        return view('siswa.profile.edit', compact('data'));
    }
    public function update(UpdateProfileSiswaRequest $request, ProfileSiswa $profileSiswa)
    {
        dd($request->all());
    }
}
