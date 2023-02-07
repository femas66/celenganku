<?php

namespace App\Http\Controllers;

use App\Models\Celengan;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        $celengan = Celengan::all();
        return view('home', compact('celengan'));
    }
    public function tambahcelengan()
    {
        return view('buatcelengan');
    }
    public function actiontambahcelengan(Request $request)
    {
        $file = $request->file('file');
        $name = $file->hashName();
        $file->move(base_path('/public/img'), $name);
        $data = [
            'img' => $name,
            'nama_barang' => $request->input('nama_tabungan'),
            'harga_barang' => $request->input('target'),
            'rencana' => $request->input('rencana'),
            'nominal' => $request->input('nominal'),
            'terkumpul' => 0
        ];
        // dd($data);
        Celengan::create($data);
        return redirect()->route('home');
    }
    public function detailtabungan($id)
    {
        $celengan = Celengan::find($id);
        return view('detail', compact('celengan'));
    }
    public function viewtambahuang($id)
    {
        $id_data = $id;
        return view('tambahuang', compact('id_data'));
    }
    public function tambahuang(Request $request)
    {
        //dd($request->all());
        
        $a = Celengan::find($request->input('id'));
        $data = ['terkumpul' => $a->terkumpul + $request->input('uang')];

        $a->update($data);
        $d_r = [
            'celengan_id' => $request->input('id'),
            'uang' => $request->input('uang'),
            'deskripsi' => "+ " . $request->input('deskripsi')
        ];
        Riwayat::create($d_r);
        return redirect()->route('home');
    }
    public function viewkuranguang($id)
    {
        $id_data = $id;
        return view('kuranguang', compact('id_data'));
    }

    public function kuranguang(Request $request) {
        $a = Celengan::find($request->input('id'));
        $hasil = 0;
        if ($a->terkumpul - $request->input('uang') <= 0) {
            $hasil += 0;
        }
        else {
            $hasil += $a->terkumpul - $request->input('uang');
        }
        $data = ['terkumpul' => $hasil];
        $a->update($data);
        $d_r = [
            'celengan_id' => $request->input('id'),
            'uang' => $request->input('uang'),
            'deskripsi' => "- " . $request->input('deskripsi')
        ];
        Riwayat::create($d_r);
        return redirect()->route('home');
    }
    public function hapus($id)
    {
        $celengan = Celengan::find($id);
        $img_celengan = base_path('/public/img/') . $celengan->img;
        unlink($img_celengan);
        $celengan->delete();
        Riwayat::where('celengan_id', '=', $id)->delete();
        return redirect()->route('home')->with('msg', 'Berhasil menghapus');
    }
}
