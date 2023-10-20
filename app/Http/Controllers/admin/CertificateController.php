<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::paginate(7);
        return view('admin-panel.certificate.index', [
            'certificates' => $certificates ,
        ]);
    }

    public function create()
    {
        return view('admin-panel.certificate.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'count' => 'required',
        ]);

        $certificates = Certificate::create([
            'name' => $request->name,
            'count' => $request->count,
        ]);
        return redirect()->route('certificates.index')->with('successMsg',
        'You have successfully created new certificate.');
    }

    public function edit($id)
    {
        $certificate = Certificate::find($id);
        return view('admin-panel.certificate.edit', compact('certificate'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'count' => 'required',
        ]);

        $certificate = Certificate::find($id);
        $certificate->update([
            'name' => $request->name,
            'count' => $request->count,
        ]);
        return redirect()->route('certificates.index')->with('successMsg',
        'You have successfully updated certificate.');

    }
}
