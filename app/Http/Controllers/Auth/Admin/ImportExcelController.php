<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Exports\SubscribersExport;
use App\Http\Controllers\Controller;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAuth');
    }

    public function fileImportExport()
    {

        if (auth()->guard('admin')->check()) {
            return view('auth.admin.excelData');

        } else {
            return redirect()->route('index', app()->getLocale());
        }
    }

    public function fileImport(Request $request)
    {

        if (auth()->guard('admin')->check()) {
            $request->validate([
                'file' => 'required|max:10000',
            ]);
            $excelFile = $request->file('file');
            $name = $excelFile->getClientOriginalName();
            $destinationPath = public_path('storage/temp/');
            $movePath = $excelFile->move($destinationPath, $name);
            Excel::import(new ProductsImport(), $movePath);
            return redirect()->route('dashboard', app()->getLocale())->with('success', 'Prodotti importati con successo');

        } else {
            return redirect()->route('index', app()->getLocale());
        }
    }

    public function fileExport()
    {
        if (auth()->guard('admin')->check()) {
            Excel::download(new SubscribersExport, 'subscribers.xlsx');
            return redirect()->route('importData', app()->getLocale())->with('success', 'Lista esportata con successo');

        } else {
            return redirect()->route('index', app()->getLocale());
        }
    }
}
