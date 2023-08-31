<?php

namespace App\Http\Controllers;

use App\Exports\ClossingExport;
use App\Models\Clossing;
use Illuminate\Http\Request;
use App\Imports\ClossingImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ClossingController extends Controller
{
    public function index()
    {
        $data = Clossing::all();
        return view('dataclossings', compact('data'));
    }

    public function tambahclossing()
    {
        return view('tambahclossing');
    }

    public function store(Request $request)
    {
        $data = Clossing::create($request->all());

        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoclossing/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('clossing')->with('sukses', 'Data Berhasil Ditambah');
    }

    public function edit($id){
        $data = Clossing::find($id);
        return view('editclossing', compact('data'));
    }

    public function update(Request $request, $id){
        $data = Clossing::find($id);
        if($request->file != ''){        
            $path = public_path().'fotoclossing/';

            //code for remove old file
            if($data->file != ''  && $data->file != null){
                $file_old = $path.$data->file;
                unlink($file_old);
            }

            //upload new file
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);

            //for update in table
            $data->update(['file' => $filename]);
        }
        $data->update($request->all());

        return redirect()->route('clossing')->with('sukses', 'Data Berhasil Diupdate');
    }

    public function delete($id){
        $data=Clossing::find($id)->delete();
        return redirect()->route('clossing')->with('sukses', 'Data Berhasil Dihapus');
    }

    public function importexcel(Request $request){
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();

        $data->move('ClossingData', $namafile);

        Excel::import(new ClossingImport, \public_path('/ClossingData/'.$namafile));
        return redirect()->back();
    }

    public function export() 
    {
        return Excel::download(new ClossingExport, 'invoices.xlsx');
    }
}