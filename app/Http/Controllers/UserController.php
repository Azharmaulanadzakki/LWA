<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        })
            ->latest()
            ->paginate(5);

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8', // Sesuaikan aturan keamanan password
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Maksimal 2MB
            'role' => 'required',
        ]);

        // Periksa apakah peran yang dimasukkan adalah sah
        $validRoles = ['admin', 'user'];
        if (!in_array($request->role, $validRoles)) {
            return redirect()->back()->with('error', 'Peran yang dimasukkan tidak valid.');
        }

        // Upload gambar profil jika ada
        $imageName = null;
        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $imageName = time() . '.' . $profileImage->extension();
            $profileImage->storeAs('public/profile_images', $imageName);
        }

        // Simpan pengguna baru ke dalam database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_image' => $imageName,
            'role' => $request->role,
        ]);

        return redirect()->route('user.index')->with(['success' => "Data Pengguna Baru Berhasil Ditambahkan!"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users,email,' . auth()->id(),
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
            'role' => '',
        ]);

        // Periksa apakah peran yang diubah adalah sah
        $validRoles = ['admin', 'user'];
        if (!in_array($request->role, $validRoles)) {
            return redirect()->back()->with('error', 'Peran yang dimasukkan tidak valid.');
        }

        // Temukan pengguna yang ingin diubah
        $user = User::find($id);

        // Update atribut pengguna jika diperlukan
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;

            if ($request->hasFile('profile_image')) {
                // Hapus gambar lama jika ada
                if ($user->profile_image) {
                    Storage::delete('public/profile_images/' . $user->profile_image);
                }

                // Upload gambar profil yang baru
                $profileImage = $request->file('profile_image');
                $imageName = time() . '.' . $profileImage->extension();
                $profileImage->storeAs('public/profile_images', $imageName);
                $user->profile_image = $imageName;
            }

            $user->save();

            return redirect()->route('user.index')->with(['success' => "Data Berhasil di Update!"]);
        } else {
            return redirect()->route('user.index')->with(['error' => "Pengguna tidak ditemukan."]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan pengguna yang ingin dihapus
        $user = User::find($id);

        // Periksa apakah pengguna ditemukan
        if ($user) {
            // Hapus gambar profil jika ada
            if ($user->profile_image) {
                Storage::delete('public/profile_images/' . $user->profile_image);
            }

            // Hapus pengguna dari database
            $user->delete();
            Alert::success("Berhasil dihapus");

            return redirect()->route('user.index');
        } else {
            return redirect()->route('user.index');
        }
    }
}
