<div>
    <div class="card">
        <div class="card-body">
            @if (session('role') == 'admin')
                <a href="{{ route('data-member') }}">

                    <button class="btn btn-primary">Kembali</button>
                </a>
            @endif
            <div class="d-flex justify-content-start flex-wrap">
                <div class="col-12 col-lg-6 p-3">
                    <div class="card shadow-none">
                        @if ($data->foto != 'foto')
                            <img src="{{ asset('assets/images/profile/' . $data->foto) }}" class="rounded" width="auto"
                                alt="">
                        @else
                            <div class="d-flex justify-content-center align-items-center flex-column">

                                <p class="text-center">Anda belum upload Foto</p>
                                <button type="button" wire:click="editfoto" class="btn btn-primary w-50">Upload
                                    Foto</button>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-lg-6">

                    @if ($editdata == 'view')
                        <span>Nama</span>
                        <input type="text" class="form-control mb-3" disabled wire:model="newdata.name">
                        {{-- <span>Email</span> --}}
                        <input hidden type="text" class="form-control mb-3" disabled wire:model="newdata.email">
                        <span>No HP</span>
                        <input type="text" class="form-control mb-3" disabled wire:model="newdata.no_hp">
                        <span>No KTP</span>
                        <input type="text" class="form-control mb-3" disabled wire:model="newdata.no_ktp">
                        <span>Tanggal Lahir</span>
                        <input type="text" class="form-control mb-3" disabled wire:model="newdata.tanggal_lahir">
                        <span>Jenis Kelamin</span>
                        <input type="text" class="form-control mb-3" disabled wire:model="newdata.jenis_kelamin">

                        @if ($data->foto != 'foto')
                            <button type="button" wire:click="editfoto" class="btn btn-primary mb-3">Ubah Foto</button>
                        @endif
                        <button type="button" wire:click="editdataTrue" class="btn btn-warning mb-3">Ubah Data</button>
                        <button type="button" wire:click="editdatapassword" class="btn btn-danger mb-3">Ubah
                            Password</button>
                    @elseif ($editdata == 'editfoto')
                        <span>Upload Foto Baru</span>
                        @if (session('role') == 'member')
                            <form action="{{ route('foto.member.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input required type="file" class="form-control @error('foto') is-invalid @enderror"
                                    value="{{ old('foto') }}" id="foto" name="foto" accept="image/*"
                                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                @error('foto')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                                <div class="mt-1 space-bawah text-center">
                                    <img src="" id="output" width="200" alt="">
                                </div>
                                <button wire:click="back" class="btn btn-danger">Kembali</button>
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                            </form>
                        @else
                            <form action="{{ route('foto.member.store.admin', [($id = $data->id)]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input required type="file" class="form-control @error('foto') is-invalid @enderror"
                                    value="{{ old('foto') }}" id="foto" name="foto" accept="image/*"
                                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="mt-1 space-bawah text-center">
                                    <img src="" id="output" width="200" alt="">
                                </div>
                                <button wire:click="back" class="btn btn-danger">Kembali</button>
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                            </form>
                        @endif
                    @elseif($editdata == 'editdata')
                        <div class="div mb-3">

                            <span>Nama</span>
                            <input type="text" class="form-control " wire:model="newdata.name">
                            @error('newdata.name')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="div mb-3">

                            {{-- <span>Email</span> --}}
                            <input hidden type="text" class="form-control " wire:model="newdata.email">
                            @error('newdata.email')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="div mb-3">

                            <span>No HP</span>
                            <input type="text" class="form-control " wire:model="newdata.no_hp">
                            @error('newdata.no_hp')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="div mb-3">

                            <span>No KTP</span>
                            <input type="text" class="form-control " wire:model="newdata.no_ktp">
                            @error('newdata.no_ktp')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="div mb-3">

                            <span>Tanggal Lahir</span>
                            <input type="date" class="form-control " wire:model="newdata.tanggal_lahir">
                            @error('newdata.tanggal_lahir')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="div mb-3">

                            <span>Jenis Kelamin</span><br>

                            <input required wire:model="newdata.jenis_kelamin" type="radio" id="laki-laki"
                                name="jenis_kelamin" value="L"
                                {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}>
                            <label for="laki-laki">Laki-laki</label>

                            <input required wire:model="newdata.jenis_kelamin" type="radio" id="perempuan"
                                name="jenis_kelamin" value="P"
                                {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}>
                            <label for="perempuan">Perempuan</label>
                        </div>

                        <button wire:click="back" class="btn btn-danger">Kembali</button>
                        <button wire:click="savedata" class="btn btn-success">Simpan Data</button>
                    @elseif($editdata == 'password')
                        <span>Masukkan Password Lama</span>
                        <input type="password" class="form-control mb-3" wire:model="oldpass">
                        <button wire:click="back" class="btn btn-danger">Kembali</button>
                        <button wire:click="checkOldPass" class="btn btn-success">Lanjut</button>
                    @elseif ($editdata == 'changepassword')
                        <span>Password Baru</span>
                        <input required type="password" class="form-control mb-3" wire:model="newdata.newpassword">
                        @error('newdata.newpassword')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <span>Konfirmasi Password Baru</span>
                        <input required type="password" class="form-control mb-3"
                            wire:model="newdata.newpassword_confirmation">
                        @error('newdata.newpassword_confirmation')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <button wire:click="back" class="btn btn-danger">Kembali</button>
                        <button wire:click="saveNewPassword" class="btn btn-success">Simpan Password</button>
                    @endif

                    @if (session()->has('success'))
                        <div class="alert alert-success mt-3" role="alert">
                            {{ session('success') }}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-danger mt-3" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
