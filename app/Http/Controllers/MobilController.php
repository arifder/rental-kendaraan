<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Mobil;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Mobil::all();

    //    return $data;
    return response()->json([
        "message" => "Mobil yang tersedia",
        "data" => $table
    ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate =Validator::make($request->all(), [
            'merk' => 'required',
            'thn_keluar' => 'required|integer',
            'biaya_sewa' => 'required|integer',
            'no_plat' => 'required|integer',
            'jenis' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:5000'
        ]);

        $file = $request->file('gambar');

        $imagename = round(microtime(true) * 100).'.'.$file->extension();
        $request->file('gambar')->move(public_path('pictures/'), $imagename);

        $data = Mobil::create([
            'merk' => $request->merk,
            'thn_keluar' => $request->thn_keluar,
            'biaya_sewa' => $request->biaya_sewa,
            'no_plat' =>$request->no_plat,
            'jenis' =>$request->jenis,
            'gambar' => $imagename
        ]);

        if ($data) {
            return response([
                'status' => 201,
                'message' => "data berhasil ditambahkan",
                'data' => $data
            ]);
        }else {
            return response([
                'status' => 400,
                'message' => "data gagal ditambahkan",
                'data' => null
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Mobil::find($id);
        if($table){
            return $table;
        }else{
            return ["message" => "Data not found"];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except(['_method']);
        $update = Mobil::where("id", $id)->update($data);

        return response()->json([
            "message" => "data berhasil diubah",
            "data" => $update
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Mobil::find($id);
        if ($table){
            $table->delete();
            return ["message" => "Data berhasil dihapus"];
        }else{
            return ["message" => "Data not found"];
        }
    }
}
