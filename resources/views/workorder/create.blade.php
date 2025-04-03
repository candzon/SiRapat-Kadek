@extends('layouts.app')
@section('title', 'New Rapat')
@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">New Rapat</h1>
        </div>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="{{ route('workorder.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="user_id">
                        Inviting<span class="text-red-500">*</span>
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('user_id') border-red-500 @enderror"
                        id="user_id" name="user_id" required>
                        <option value="">Select Participant</option>
                        @foreach ($operators as $operator)
                            <option value="{{ $operator->id }}" {{ old('user_id') == $operator->id ? 'selected' : '' }}>
                                {{ $operator->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Judul Rapat Input -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="judul_rapat">
                        Judul Rapat<span class="text-red-500">*</span>
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('judul_rapat') border-red-500 @enderror"
                        id="judul_rapat" type="text" name="judul_rapat" value="{{ old('judul_rapat') }}"
                        placeholder="Enter Judul Rapat" required>
                    @error('judul_rapat')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi Input -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="deskripsi">
                        Deskripsi
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('deskripsi') border-red-500 @enderror"
                        id="deskripsi" name="deskripsi" placeholder="Enter Deskripsi">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Input -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal">
                        Tanggal<span class="text-red-500">*</span>
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tanggal') border-red-500 @enderror"
                        id="tanggal" type="date" name="tanggal" value="{{ old('tanggal') }}" required>
                    @error('tanggal')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Waktu Mulai Input -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="waktu_mulai">
                        Waktu Mulai<span class="text-red-500">*</span>
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('waktu_mulai') border-red-500 @enderror"
                        id="waktu_mulai" type="time" name="waktu_mulai" value="{{ old('waktu_mulai') }}" required>
                    @error('waktu_mulai')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Waktu Selesai Input -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="waktu_selesai">
                        Waktu Selesai<span class="text-red-500">*</span>
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('waktu_selesai') border-red-500 @enderror"
                        id="waktu_selesai" type="time" name="waktu_selesai" value="{{ old('waktu_selesai') }}" required>
                    @error('waktu_selesai')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lokasi Input -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="lokasi">
                        Lokasi<span class="text-red-500">*</span>
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('lokasi') border-red-500 @enderror"
                        id="lokasi" type="text" name="lokasi" value="{{ old('lokasi') }}"
                        placeholder="Enter Lokasi" required>
                    @error('lokasi')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status Select -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                        Status<span class="text-red-500">*</span>
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('status') border-red-500 @enderror"
                        id="status" name="status" required>
                        <option value="">Select Status</option>
                        <option value="Terjadwal" {{ old('status') == 'Terjadwal' ? 'selected' : '' }}>Terjadwal</option>
                        <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="Dibatalkan" {{ old('status') == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex">

                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                        type="submit">
                        Simpan
                    </button>
                    <a href="{{ route('workorder.index') }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
