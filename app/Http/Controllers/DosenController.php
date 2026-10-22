<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(Request $request)
    {
        $query = Dosen::with('mataKuliah');

        // Fitur Search
        if ($search = trim((string) $request->input('search', ''))) {
            $query->where(function ($builder) use ($search) {
                $builder->where('nidn', 'like', "%{$search}%")
                        ->orWhere('nama', 'like', "%{$search}%")
                        ->orWhere('prodi', 'like', "%{$search}%");
            });
        }

        // Fitur Filter Prodi
        if ($prodi = $request->input('prodi')) {
            $query->where('prodi', $prodi);
        }

        // Opsi Sorting
        $sortOptions = [
            'nidn'  => 'NIDN',
            'nama'  => 'Nama',
            'prodi' => 'Program Studi',
        ];
        $sort = $request->input('sort', 'nama');
        $direction = $request->input('direction', 'asc');

        $sort = array_key_exists($sort, $sortOptions) ? $sort : 'nama';
        $direction = in_array($direction, ['asc', 'desc'], true) ? $direction : 'asc';

        // Fetch data dengan Pagination
        $dosen = $query->orderBy($sort, $direction)
                       ->paginate(10)
                       ->withQueryString();

        // Ambil daftar prodi unik untuk dropdown filter
        $programStudi = Dosen::query()
            ->select('prodi')
            ->distinct()
            ->orderBy('prodi')
            ->pluck('prodi');

        return view('dosen.index', compact('dosen', 'programStudi', 'sortOptions', 'sort', 'direction'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nidn'  => 'required|string|max:20|unique:dosen,nidn',
            'nama'  => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
        ], [
            'nidn.required'  => 'NIDN wajib diisi.',
            'nidn.unique'    => 'NIDN sudah terdaftar.',
            'nama.required'  => 'Nama dosen wajib diisi.',
            'prodi.required' => 'Program studi wajib diisi.',
        ]);

        Dosen::create($validated);

        return redirect()->route('dosen.index')
            ->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        // Validasi input update (mengabaikan keunikan NIDN milik sendiri)
        $validated = $request->validate([
            'nidn'  => 'required|string|max:20|unique:dosen,nidn,' . $dosen->id,
            'nama'  => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
        ]);

        $dosen->update($validated);

        return redirect()->route('dosen.index')
            ->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        // Proses Soft Delete
        $dosen->delete();

        return redirect()->route('dosen.index')
            ->with('success', 'Data dosen berhasil dihapus.');
    }
}