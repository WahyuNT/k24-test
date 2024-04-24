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
                                placeholder="Masukkan username">
                            <span>Password</span>
                            <input  name="password" required type="password" class="form-control"
                                placeholder="Masukkan password">
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
                        <span>Username</span>
                        <input type="text" class="form-control mb-4" placeholder="Masukkan username">
                        <span>Password</span>

                        <input type="text" class="form-control " placeholder="Masukkan password">

                        <p class="text-center mt-3">
                            Belum jadi member?
                            <span>
                                <a href="#" wire:click.prevent="daftarChange">
                                    Daftar member
                                </a>
                            </span>
                        </p>


                    </div>
                </div>

            </div>
        </div>
    @else
        <div class="d-flex justify-content-center gap-3 pt-3 mt-5">
            <div class="col-4 ">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Daftar Member</h2>
                        <span>Username</span>
                        <input type="text" class="form-control mb-4" placeholder="Masukkan username">
                        <span>Password</span>
                        <input type="text" class="form-control" placeholder="Masukkan password">
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
