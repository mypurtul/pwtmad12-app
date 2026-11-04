<aside class="sidebar bg-white border-end p-3"><nav class="nav nav-pills flex-column gap-1"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
@if(auth()->user()->hasRole('admin','dosen'))<a class="nav-link" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>@endif
<a class="nav-link" href="{{ route('matakuliah.index') }}">Mata Kuliah</a>
@if(auth()->user()->hasRole('admin'))<hr><span class="text-uppercase text-secondary small fw-semibold px-3">Administrasi</span><a class="nav-link" href="{{ route('dosen.index') }}">Kelola Dosen</a><a class="nav-link" href="{{ route('users.index') }}">Kelola Pengguna</a>@endif</nav></aside>
