@extends('layouts.master')
@section('content')
    <div class="d-flex justify-content-start  flex-wrap gap-3">

        @foreach ($member as $item)
            <div class="col-3 ">

                <div class="card rounded">
                    <div class="card-body ">
                        <img src="{{ asset('assets/images/profile/memebr1.png') }}" class="rounded w-100" width="auto"
                            alt="">
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
        @endforeach
    </div>
@endsection
