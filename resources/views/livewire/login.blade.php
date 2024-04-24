<div>
    @include('sweetalert::alert')
    @if ($daftar == null)
        <div class="d-flex justify-content-center gap-3 pt-3 mt-5">
            <div class="col-4 ">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Login Admin</h2>
                        <form action="{{ route('loginAdmin') }}" method="POST">
                            @csrf
                            <span>Username</span>
                            <input name="username" required type="text" class="form-control mb-4"
                                placeholder=" gunakan usernam dan pass admin">
                            <span>Password</span>
                            <input name="password" required type="password" class="form-control"
                                placeholder="admin">
                            <div class="d-flex justify-content-center">

                                <button type="submit" class="btn btn-primary  mt-3">Login</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4 ">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Login Member</h2>
                        <form action="{{ route('loginMember') }}" method="POST">
                            @csrf
                            <span>Email</span>
                            <input  type="text" name="email" class="form-control mb-4" placeholder="Masukkan Email">
                            <span>Password</span>

                            <input name="password" type="password" class="form-control "
                                placeholder="Masukkan password">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary text-center mt-3">Login</button>
                            </div>
                            <p class="text-center mt-3">
                                Belum jadi member?
                                <span>
                                    <a href="#" wire:click.prevent="daftarChange">
                                        Daftar member
                                    </a>
                                </span>
                            </p>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    @else
        <div class="d-flex justify-content-center gap-3 pt-3 mt-5">
            <div class="col-4 ">
                <div class="card">
                    <div class="card-body">
                        <form wire:submit.prevent="daftar">
                            @csrf
                            <input required type="text" value="test" name="foto" hidden
                                wire:model="dataMember.foto">

                            <h2 class="text-center mb-4">Daftar Member</h2>

                            <div class="mb-2">
                                <span>Nama</span>
                                <input required wire:model="dataMember.name" type="text" class="form-control mb-4"
                                    placeholder="Masukkan username">
                                @error('dataMember.name')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <span>Password</span>
                                <input required wire:model="dataMember.password" type="password" class="form-control"
                                    placeholder="Masukkan password">
                                @error('dataMember.password')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <span>Email</span>
                                <input required wire:model="dataMember.email" type="email" class="form-control"
                                    placeholder="Masukkan Email">
                                @error('dataMember.email')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <span>No HP</span>
                                <input required wire:model="dataMember.no_hp" type="tel" class="form-control"
                                    placeholder="Masukkan No HP">
                                @error('dataMember.no_hp')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <span>No KTP</span>
                                <input required wire:model="dataMember.no_ktp" type="number" class="form-control"
                                    placeholder="Masukkan No KTP">
                                @error('dataMember.no_ktp')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <span>Tanggal Lahir</span>
                                <input required wire:model="dataMember.tanggal_lahir" type="date"
                                    class="form-control" placeholder="Masukkan tanggal lahir">
                                @error('dataMember.tanggal_lahir')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <span>Jenis Kelamin</span><br>
                                <input required wire:model="dataMember.jenis_kelamin" type="radio" id="laki-laki"
                                    name="jenis_kelamin" value="L"
                                    {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}>
                                <label for="laki-laki">Laki-laki</label>

                                <input required wire:model="dataMember.jenis_kelamin" type="radio" id="perempuan"
                                    name="jenis_kelamin" value="P"
                                    {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}>
                                <label for="perempuan">Perempuan</label>
                            </div>
                          

                            <div class="d-flex justify-content-center">
                                <button wire:click="daftar" class="btn btn-primary text-center mt-3">Daftar
                                    Member</button>
                            </div>
                        </form>


                        <p class="text-center mt-3">
                            Sudah jadi member?
                            <span>
                                <a href="#" wire:click.prevent="daftarNull">
                                    Login
                                </a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    @endif
</div>
