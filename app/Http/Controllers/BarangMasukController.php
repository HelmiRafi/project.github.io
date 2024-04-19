<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\Barang;

class BarangMasukController extends Controller
{
    public function index()
{
    $barangMasuk = BarangMasuk::join('tbl_barang', 'tbl_barang.id', '=', 'tbl_barang_masuk.id_barang')
    ->select('tbl_barang_masuk.*', 'tbl_barang.nama_barang')
    ->get();
    
    $data = array(
        'title' => 'Data Barang Masuk',
        'data_barang' => Barang::all(),
        'barangMasuk'   => $barangMasuk,
    );

    return view('admin.barangmasuk.list', $data);
}

public function store(Request $request)
{
    $barang = Barang::create([
        'nama_barang' => $request->nama_barang,
    ]);

    BarangMasuk::create([
        'barang_id' => $barang->id,
        'qty' => $request->stok,
        'total' => $request->stok * $request->harga,
        'tanggal_masuk' => now(),
    ]);

    return redirect('/barang-masuk')->with('success', 'Data Barang Masuk Berhasil Disimpan');
}

public function update(Request $request, $id)
{
    $barangMasuk = BarangMasuk::find($id);

    $barangMasuk->update([
        'qty' => $request->stok,
        'total' => $request->stok * $request->harga,
    ]);

    return redirect('/barang-masuk')->with('success', 'Data Barang Masuk Berhasil Diubah');
}

public function destroy($id)
{
    $barangMasuk = BarangMasuk::find($id);
    $barang = Barang::find($barangMasuk->barang_id);

    $barangMasuk->delete();
    $barang->delete();

    return redirect('/barang-masuk')->with('success', 'Data Barang Masuk Berhasil Dihapus');
}
}
