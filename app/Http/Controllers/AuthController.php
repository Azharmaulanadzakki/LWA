<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{

    public function profile()
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login

        return view('auth.profile', compact('user'));
    }

    // public function editProfile()
    // {
    //     $user = Auth::user();
    //     return view('auth.edit-profile', compact('user'));
    // } itu gaguna salah inii  dahla 

    public function updateProfile(Request $request)
    {
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        // add other validation rules as needed
    ]);

    $userData = [
        'name' => $request->name,
        'email' => $request->email,
        'bio' => $request->bio,
        // add other profile fields
    ];

    // Update data
    $user->update($userData);

    // Update profile image if uploaded
    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
    
        // Store the image in the storage/app/public/profile_images directory
        Storage::putFileAs('public/profile_images', $image, $imageName);
    
        // Delete old image if it exists
        if ($user->profile_image) {
            // Use Storage::delete to remove the old image from the storage
            Storage::delete('public/profile_images/'.$user->profile_image);
        }
    
        // Save image file name to the database
        $user->update(['profile_image' => $imageName]);
    }

    // Show SweetAlert success message
    Alert::success('Profile Updated', 'Your profile has been successfully updated.');

    return redirect()->route('profile');
    }

    public function profileAdmin()
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login

        return view('admin.profile.index', compact('user'));
    }

    public function updateProfileAdmin(Request $request)
    {
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        // add other validation rules as needed
    ]);

    $userData = [
        'name' => $request->name,
        'email' => $request->email,
        'bio' => $request->bio,
        // add other profile fields
    ];

    // Update data
    $user->update($userData);

    // Update profile image if uploaded
    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
    
        // Store the image in the storage/app/public/profile_images directory
        Storage::putFileAs('public/profile_images', $image, $imageName);
    
        // Delete old image if it exists
        if ($user->profile_image) {
            // Use Storage::delete to remove the old image from the storage
            Storage::delete('public/profile_images/'.$user->profile_image);
        }
    
        // Save image file name to the database
        $user->update(['profile_image' => $imageName]);
    }

    // Show SweetAlert success message
    Alert::success('Profile Updated', 'Your profile has been successfully updated.');

    return redirect()->route('admin.profile.index');
    }
    

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8', // Gunakan 'confirmed' untuk memastikan ada konfirmasi password
        ], [
            'password.confirmed' => 'Konfirmasi password tidak cocok!',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        // Menampilkan pesan SweetAlert untuk keberhasilan
        Alert::success('Pendaftaran Berhasil', 'Selamat! Anda berhasil terdaftar.');

        return redirect('login');
    }



    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                Alert::success('Login berhasil');
                return redirect('/admin/dashboard');
            } elseif ($user->role == 'user') {
                return redirect('/login');
            }
        }
        Alert::error('Email atau Password salah!');
        return back()->withInput();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function authenticated($user)
    {
        if ($user->role == 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($user->role == 'user') {
            return redirect('/home');
        }
    }

    // forgot password
    public function forgot()
    {
        return view('auth.forgot');
    }

    public function forgot_password(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if (!empty($user)) {
            $user->remember_token = Str::random(40);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', 'Silahkan cek email anda!');
        } else {
            return redirect()->back()->with('error', 'Email tidak ditemukan!');
        }
    }


    // reset password
    public function reset($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            $data['user'] = $user;
            return view('auth.reset', $data);
        } else {
            return redirect('login');
        }
    }

    public function post_reset($token, Request $request)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            if ($request->password == $request->cpassword) {
                $user->password = Hash::make($request->password);
                if(empty($user->email_verified_at)) {
                    $user->email_verified_at = date('Y-m-d H:i:s');
                }
                $user->remember_token = Str::random(40);
                $user->save();
                return redirect('/')->with('success', 'Password berhasil diperbarui');
            } else {
                return redirect()->back()->with('error', 'Password tidak sama!');
            }
        } else {
            abort(404);
        }
    }
}
