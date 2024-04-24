<div>
    <div class="card">
        <div class="card-body">
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
                        <span>Nama Lengkap</span>
                        <input type="text" class="form-control mb-3" disabled wire:model="newdata.nama_lengkap">
                        <span>Username</span><small class="text-danger"> (yang akan digunakan untuk login)</small>
                        <input type="textbac" class="form-control mb-3" disabled wire:model="newdata.username">

                        <button type="button" wire:click="editfoto" class="btn btn-primary">Ubah Foto</button>
                        <button type="button" wire:click="editdataTrue" class="btn btn-warning">Ubah Data</button>
                        <button type="button" wire:click="editdatapassword" class="btn btn-danger">Ubah
                            Password</button>
                    @elseif ($editdata == 'editfoto')
                        <span>Upload Foto Baru</span>
                        <form action="{{ route('foto.admin.store') }}" method="POST" enctype="multipart/form-data">
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
                    @elseif($editdata == 'editdata')
                        <span>Nama Lengkap</span>
                        <input type="text" class="form-control mb-3" wire:model="newdata.nama_lengkap">

                        <span>Username</span><small class="text-danger"> (yang akan digunakan untuk login)</small>
                        <input type="text" class="form-control mb-3" wire:model="newdata.username">

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
