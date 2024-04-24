<div>
    <div class="px-3">
        <input type="text" class="form-control mb-3" placeholder="search" wire:model="search">
    </div>
    <div class="d-flex justify-content-start  flex-wrap ">
        @forelse($data as $item)
            <div class="col-12 col-lg-3 px-3">

                <div class="card rounded">
                    <div class="card-body ">
                        <img src="{{ asset('assets/images/profile/' . $item->foto) }}" class="rounded w-100"
                            width="auto" alt="">
                        <table class="table mt-3">

                            <tbody>
                                <tr>
                                    <td class="py-1 px-0 m-1">Nama</td>
                                    <td class="py-1 px-0 m-1">{{ $item->name }}</td>

                                </tr>
                                <tr>
                                    <td class="py-1 px-0 m-1">Email</td>
                                    <td class="py-1 px-0 m-1">{{ $item->email }}</td>
                                </tr>
                                <tr>
                                    <td class="py-1 px-0 m-1">No HP</td>
                                    <td class="py-1 px-0 m-1">{{ $item->no_hp }}</td>
                                </tr>
                                <tr>
                                    <td class="py-1 px-0 m-1">No KTP</td>
                                    <td class="py-1 px-0 m-1">{{ $item->no_ktp }}</td>
                                </tr>
                                <tr>
                                    <td class="py-1 px-0 m-1">Email</td>
                                    <td class="py-1 px-0 m-1">{{ $item->email }}</td>
                                </tr>
                                <tr>
                                    <td class="py-1 px-0 m-1">Tanggal Lahir</td>
                                    <td class="py-1 px-0 m-1">{{ $item->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td class="py-1 px-0 m-1">Jenis Kelamin</td>
                                    <td class="py-1 px-0 m-1">{{ $item->jenis_kelamin }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-warning text-center w-100">Edit Data</button>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-danger text-center">Data tidak ada</p>
        @endforelse
    </div>
</div>
