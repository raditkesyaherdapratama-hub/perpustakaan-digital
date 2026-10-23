<?php

namespace App\Imports;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class BukuImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    public function collection(Collection $rows)
    {
        $barisExcel = 1; // Baris pertama adalah heading

        foreach ($rows as $row) {
            $barisExcel++;

            // Lewati baris yang benar-benar kosong
            if ($row->filter(fn ($value) => $value !== null && trim((string) $value) !== '')->isEmpty()) {
                continue;
            }

            $data = [
                'kode_buku'    => trim((string) ($row['kode_buku'] ?? '')),
                'judul_buku'   => trim((string) ($row['judul_buku'] ?? '')),
                'pengarang'    => trim((string) ($row['pengarang'] ?? '')),
                'penerbit'     => trim((string) ($row['penerbit'] ?? '')),
                'tahun_terbit' => $row['tahun_terbit'] ?? null,
                'stok'         => $row['stok'] ?? null,
                'nama_kategori'=> trim((string) ($row['nama_kategori'] ?? '')),
                'deskripsi'    => $row['deskripsi'] ?? null,
            ];

            $validator = Validator::make($data, [
                'kode_buku'     => ['required', 'string', 'max:50', 'unique:buku,kode_buku'],
                'judul_buku'    => ['required', 'string', 'max:255'],
                'pengarang'     => ['required', 'string', 'max:255'],
                'penerbit'      => ['required', 'string', 'max:255'],
                'tahun_terbit'  => ['required', 'integer', 'min:1900', 'max:' . (date('Y') + 1)],
                'stok'          => ['required', 'integer', 'min:0'],
                'nama_kategori' => ['required', 'string', 'exists:kategori,nama_kategori'],
                'deskripsi'     => ['nullable', 'string'],
            ]);

            if ($validator->fails()) {
                throw ValidationException::withMessages([
                    'file_import' => [
                        "Baris Excel {$barisExcel}: " .
                        implode(' ', $validator->errors()->all()),
                    ],
                ]);
            }

            $kategori = Kategori::where('nama_kategori', $data['nama_kategori'])->firstOrFail();

            Buku::create([
                'kategori_id'  => $kategori->id,
                'kode_buku'    => $data['kode_buku'],
                'judul_buku'   => $data['judul_buku'],
                'pengarang'    => $data['pengarang'],
                'penerbit'     => $data['penerbit'],
                'tahun_terbit' => $data['tahun_terbit'],
                'stok'         => $data['stok'],
                'deskripsi'    => $data['deskripsi'],
            ]);
        }
    }

    public function chunkSize(): int
    {
        return 500;
    }
}
