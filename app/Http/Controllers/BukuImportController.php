<?php

namespace App\Http\Controllers;

use App\Imports\BukuImport;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException as ExcelValidationException;
use Throwable;

class BukuImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => [
                'required',
                'file',
                'mimes:xlsx,xls,csv',
                'max:10240',
            ],
        ], [
            'file.required' => 'Silakan pilih file Excel terlebih dahulu.',
            'file.mimes' => 'Format file harus Excel (.xlsx, .xls) atau CSV.',
            'file.max' => 'Ukuran file maksimal 10 MB.',
        ]);

        try {
            Excel::import(new BukuImport, $request->file('file'));

            return redirect()
                ->route('buku.index')
                ->with('success', 'Import data buku berhasil.');
        } catch (ValidationException $e) {
            return redirect()
                ->route('buku.index')
                ->withErrors([
                    'file_import' => $e->validator->errors()->all(),
                ]);
        } catch (ExcelValidationException $e) {
            $errors = [];

            foreach ($e->failures() as $failure) {
                $errors[] = 'Baris ' . $failure->row() . ': ' .
                    implode(', ', $failure->errors());
            }

            return redirect()
                ->route('buku.index')
                ->withErrors([
                    'file_import' => $errors,
                ]);
        } catch (Throwable $e) {
            report($e);

            return redirect()
                ->route('buku.index')
                ->withErrors([
                    'file_import' => 'Import gagal. Periksa format Excel, kategori, dan kode buku, lalu coba lagi.',
                ]);
        }
    }
}
