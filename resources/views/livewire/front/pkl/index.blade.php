<div class="py-24">
  {{-- Card --}}
  <div class="mx-auto bg-white rounded-lg shadow-md overflow-hidden px-4 py-4">

    {{-- tampilan pesan --}}
    <div>
      @if (session()->has('error'))
          <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" 
              class="p-4 bg-red-500 text-white rounded-md">
              {{ session('error') }}
          </div>
      @endif

      @if (session()->has('success'))
          <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" 
              class="p-4 bg-green-500 text-white rounded-md">
              {{ session('success') }}
          </div>
      @endif
      
    </div>
    {{-- ./tampilan pesan --}}

    {{-- Judul  --}}
    <div class="w-full bg-gray-200 p-4 text-center text-xl font-bold">
      Laporan Siswa PKL
    </div>
    {{-- Judul./  --}}
    
    {{-- Form Entry dan Searching --}}
    <div class="mx-auto flex items-center justify-between bg-white p-6 rounded-lg shadow-md">

        <!-- Tombol Create Lapor PKL di kiri -->
        <button wire:click="create()" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
            Create Lapor PKL
        </button>

        {{-- cek apakah menampilkan halaman modal --}}
            @if($isOpen)
                @include('livewire.front.pkl.create')
            @endif
        {{-- ./cek apakah menampilkan halaman modal --}}

        {{-- form searching --}}
        <input wire:model.live="search" type="text" placeholder="Search ..." class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        {{-- ./form searching --}}
    </div>
    {{-- ./Form Entry dan Searching --}}

    {{-- Table PKL --}}
    <table class="min-w-full bg-white border border-gray-200">
      <thead>
        <tr>
          <th class="px-4 py-2 border-b border-gray-200 text-left text-gray-600">No</th>
          <th class="px-4 py-2 border-b border-gray-200 text-left text-gray-600">Nama Siswa</th>
          <th class="px-4 py-2 border-b border-gray-200 text-left text-gray-600">Industri</th>
          <th class="px-4 py-2 border-b border-gray-200 text-left text-gray-600">Bidang Usaha</th>
          <th class="px-4 py-2 border-b border-gray-200 text-left text-gray-600">Mulai</th>
          <th class="px-4 py-2 border-b border-gray-200 text-left text-gray-600">Selesai</th>
          <th class="px-4 py-2 border-b border-gray-200 text-left text-gray-600">Durasi (Hari)</th>
        </tr>
      </thead>

      <tbody>
        @php
          use Carbon\Carbon;
          $no = 0;
        @endphp

        @foreach($pkls as $key => $pkl)
          @php
            $no++;

            $d1 = Carbon::parse($pkl->mulai);
            $d2 = Carbon::parse($pkl->selesai);

            $selisihHari = $d1->diffInDays($d2); // Selisih dalam hari
          @endphp
          
          <tr class="hover:bg-gray-100">
            {{-- <td class="px-4 py-2 border-b border-gray-200">{{ $pkl->id }}</td> --}}
            <td class="px-4 py-2 border-b border-gray-200">{{ $no }}</td>
            <td class="px-4 py-2 border-b border-gray-200">{{ $pkl->siswa->nama }}</td>
            <td class="px-4 py-2 border-b border-gray-200">{{ $pkl->industri->nama }}</td>
            <td class="px-4 py-2 border-b border-gray-200">{{ $pkl->industri->bidang_usaha }}</td>
            <td class="px-4 py-2 border-b border-gray-200">{{ $pkl->mulai }}</td>
            <td class="px-4 py-2 border-b border-gray-200">{{ $pkl->selesai }}</td>
            <td class="px-4 py-2 border-b border-gray-200">{{ $selisihHari }}</td>
              {{-- <img src="{{ asset('/storage/product/'.$product->image) }}" class="rounded" style="width: 150px"> --}}
              {{-- <img src="{{ asset('storage/product/' . $image->name) }}" alt="{{ $image->title }}" width="200"> --}}
              {{-- {{ $product->image }} --}}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{-- ./Table PKL --}}

    {{-- pagination --}}
            <div class="p-4">
               {{ $pkls->links() }}
            </div>
            {{-- pagination --}}
  </div>
  {{-- ./Card --}}
  

</div>
