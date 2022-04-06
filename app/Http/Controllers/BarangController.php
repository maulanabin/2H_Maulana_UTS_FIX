<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){ // Pemilihan jika ingin melakukan pencarian
            $barang = Barang::where('kode_barang', 'like', "%".$request->search."%")
            ->orwhere('nama_barang', 'like', "%".$request->search."%")
            ->orwhere('kategori_barang', 'like', "%".$request->search."%")
            ->paginate();
        } else { // Pemilihan jika tidak melakukan pencarian
            //fungsi eloquent menampilkan data menggunakan pagination
            $barang = Barang::paginate(5); // Pagination menampilkan 5 data
        }
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori_barang' => 'required',
            'harga' => 'required',
            'qty' => 'required',
            ]);

            //fungsi eloquent untuk menambah data
            Barang::create($request->all());

            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('barang.index')
                ->with('success', 'Data Barang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_barang)
    {
        //menampilkan detail data dengan menemukan/berdasarkan kode barang
        $Barang = Barang::find($id_barang);
        return view('barang.detail', compact('Barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_barang)
    {
        //menampilkan detail data dengan menemukan berdasarkan kode barang untuk diedit
        $Barang = Barang::find($id_barang);
        return view('barang.edit', compact('Barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_barang)
    {
        //melakukan validasi data
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori_barang' => 'required',
            'harga' => 'required',
            'qty' => 'required',
            ]);

        //fungsi eloquent untuk mengupdate data inputan kita
            Barang::find($id_barang)->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('barang.index')
                ->with('success', 'Data Barang Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_barang)
    {
        //fungsi eloquent untuk menghapus data
        Barang::find($id_barang)->delete();
        return redirect()->route('barang.index')
            -> with('success', 'Data Barang Berhasil Dihapus');
    }
}
