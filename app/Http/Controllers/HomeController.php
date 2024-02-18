<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\User;
use App\Models\Mapel;
use App\Models\MapelUser;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $mapels = Mapel::when($search, function ($query) use ($search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        })
            ->latest()
            ->paginate();

        $mapel = Mapel::find(1)->users;
        $faqs = FAQ::latest()->take(5)->get();


        return view('home', compact('mapels', 'search', 'faqs'));
    }

    public function getMateri($parent_id)
    {
        // Ambil data parent dari tabel mapels sesuai dengan $parent_id
        $parent = Mapel::find($parent_id);

        // Ambil data user sesuai dengan informasi yang sedang login
        $user = Auth::user();

        // dd($parent->pivot);

        foreach ($parent->users as $value) {
            if ($value->id == $user->id) {
                $mapelUser = $value;
            }
        }

        if (!isset($mapelUser)) {
            return $this->payment($parent_id);
        }
    }

    function viewMateri($parent_id)
    {
        $parent = Mapel::find($parent_id);

        // Jika $parent tidak ditemukan, bisa ditangani di sini
        if (!$parent) {
            abort(404); // atau atur sesuai kebutuhan aplikasi Anda
        }

        // Ambil data materi yang terkait dengan $parent_id yang dipilih dengan paginasi
        $materis = DB::table('materis')
            ->where('parent_id', $parent_id)
            ->paginate(1); // Sesuaikan dengan jumlah item per halaman yang diinginkan

            $playlists = DB::table('materis')
            ->where('parent_id', $parent_id)
            ->get();

            $parent_id = $parent_id;


        // Kirimkan variabel $parent dan $materis ke tampilan
        return view('materi', compact('materis', 'parent', 'playlists', 'parent_id'));
    }

    function payment($parent_id)
    {

        // Ambil data parent dari tabel mapels sesuai dengan $parent_id
        $parent = Mapel::find($parent_id);

        // Ambil data user sesuai dengan informasi yang sedang login
        $user = Auth::user();

        //Melakukan create data pembayaran sekaligus pembuatan snapToken
        $pembayaran = Pembayaran::create([
            'harga' => $parent->harga,
            'tanggal' => date('Y-m-d'),
            'mapel_id' => $parent->id,
            'user_id' => $user->id,
        ]);

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $pembayaran->id,
                'gross_amount' => $pembayaran->harga,
            ),
            'customer_details' => array(
                'first_name' => $user->name,
                'last_name' => '',
                'email' => $user->email,
            ),
        );

        // dd($params);

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $pembayaran->snapToken = $snapToken;
        $pembayaran->update();

        return response()->json([
            'snapToken' => $snapToken,
            'pembayaran_id' => $pembayaran->id
        ]);
    }

    public function destroy(Pembayaran $pembayaran)
    {
        // Hapus rekord dari database
        $pembayaran->delete();
    }

    function midtransCallback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settelment') {
                $pembayaran = Pembayaran::find($request->order_id);
                $pembayaran->update(['status' => 'sukses', 'snapToken' => null]);

                $mapel = Mapel::find($pembayaran->mapel_id);
                $user = Mapel::find($pembayaran->user_id);
                MapelUser::create(['mapel_id' => $mapel->id, 'user_id' => $user->id]);
            }
        }

        // $serverKey = config('services.midtrans.serverKey');
        // $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        // $transaksi = Pembayaran::where('id', $request->order_id)->first();

        // if ($hashed == $request->signature_key) {
        //     if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
        //         $transaksi->update(['status' => 'sukses']);
        //     } elseif ($request->transaction_status == 'expire') {
        //         $transaksi->update(['status' => 'gagal']);
        //     }
        // }
    }

    function callback(Pembayaran $pembayaran)
    {
        $pembayaran->update(['status' => 'success', 'snapToken' => null]);

        $mapel = Mapel::find($pembayaran->mapel_id);
        $user = Mapel::find($pembayaran->user_id);
        MapelUser::create(['mapel_id' => $mapel->id, 'user_id' => $user->id]);
    }

    public function tools($parent_id = null)
    {
        // Ambil data parent dari tabel mapels sesuai dengan $parent_id
        $parent = $parent_id ? DB::table('mapels')->find($parent_id) : null;

        // Jika $parent tidak ditemukan, bisa ditangani di sini
        if (!$parent && $parent_id) {
            abort(404); // atau atur sesuai kebutuhan aplikasi Anda
        }

        // Ambil data tools yang terkait dengan $parent_id (jika diberikan) atau semua tools
        $toolsQuery = DB::table('tools');

        if ($parent_id) {
            $toolsQuery->where('mapel_id', $parent_id);
        }

        $tools = $toolsQuery->get();

        // Kirimkan variabel $parent, $tools, dan $parent_id ke tampilan
        return view('tools', compact('parent', 'tools', 'parent_id'));
    }
}
