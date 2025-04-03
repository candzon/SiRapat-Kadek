<form id="editForm" action="{{ route('workorder.update', encrypt($workorder->id)) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <!-- Inviting Select -->
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="user_id">
            Inviting<span class="text-red-500">*</span>
        </label>
        <select
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('user_id') border-red-500 @enderror"
            id="user_id" name="user_id">
            <option value="">Select Participant</option>
            @foreach ($operators as $operator)
                <option value="{{ $operator->id }}"
                    {{ old('user_id', $workorder->user_id) == $operator->id ? 'selected' : '' }}>
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
            id="judul_rapat" type="text" name="judul_rapat" value="{{ old('judul_rapat', $workorder->judul_rapat) }}"
            placeholder="Enter Judul Rapat">
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
            id="deskripsi" name="deskripsi" placeholder="Enter Deskripsi">{{ old('deskripsi', $workorder->deskripsi) }}</textarea>
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
            id="tanggal" type="date" name="tanggal" value="{{ old('tanggal', $workorder->tanggal) }}">
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
            id="waktu_mulai" type="time" name="waktu_mulai"
            value="{{ old('waktu_mulai', $workorder->waktu_mulai) }}">
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
            id="waktu_selesai" type="time" name="waktu_selesai"
            value="{{ old('waktu_selesai', $workorder->waktu_selesai) }}">
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
            id="lokasi" type="text" name="lokasi" value="{{ old('lokasi', $workorder->lokasi) }}"
            placeholder="Enter Lokasi">
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
            id="status" name="status">
            <option value="">Select Status</option>
            <option value="Terjadwal" {{ old('status', $workorder->status) == 'Terjadwal' ? 'selected' : '' }}>
                Terjadwal</option>
            <option value="Selesai" {{ old('status', $workorder->status) == 'Selesai' ? 'selected' : '' }}>Selesai
            </option>
            <option value="Dibatalkan" {{ old('status', $workorder->status) == 'Dibatalkan' ? 'selected' : '' }}>
                Dibatalkan
            </option>
        </select>
        @error('status')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <!-- Update Form Actions -->
    <div class="flex justify-end space-x-4">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Update
        </button>
        <button type="button" onclick="closeEditModal()"
            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Cancel
        </button>
    </div>
</form>

<script>
    document.getElementById('editForm').addEventListener('submit', function(e) {
        e.preventDefault();

        fetch(this.action, {
                method: 'PUT',
                body: new FormData(this),
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content'),
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closeEditModal();
                    window.location.reload();
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script>
