<div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-start">
                <div class="col-6 p-3">
                    <div class="card shadow-none">
                        <img src="{{ asset('assets/images/profile/admin1.png') }}" class="rounded" width="auto"
                            alt="">
                    </div>
                </div>

                <div class="col-6">

                    @if ($editdata == 'view')
                        <span>Nama Lengkap</span>
                        <input type="text" class="form-control mb-3" disabled wire:model="newdata.nama_lengkap">
                        <span>Username</span>
                        <input type="text" class="form-control mb-3" disabled wire:model="newdata.username">

                        <button type="button" wire:click="" class="btn btn-primary">Ubah Foto</button>
                        <button type="button" wire:click="editdataTrue" class="btn btn-warning">Ubah Data</button>
                        <button type="button" wire:click="editdatapassword" class="btn btn-danger">Ubah
                            Password</button>
                    @elseif($editdata == 'editdata')
                        <span>Nama Lengkap</span>
                        <input type="text" class="form-control mb-3" wire:model="newdata.nama_lengkap">

                        <span>Username</span>
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
