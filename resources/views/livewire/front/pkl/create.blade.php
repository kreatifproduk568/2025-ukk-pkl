<div class="fixed inset-0 z-10 overflow-y-auto ease-out duration-400">
  <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
      
    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
  
    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
    
    <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <div class='py-4 px-4'>
        <h2 class='font-semibold'>Lapor PKL</h2>
        {{ $siswa_login->nama }}
        <div class="border-t border-gray-300 my-2"></div>

      </div>
      <form>
        <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
        <div>

          <fieldset class="border border-gray-300 rounded-md p-4">
            <legend class="text-lg text-gray-700 px-2">Siswa</legend>

            <div class="mb-4">
              {{-- <input type="text" value="{{ $siswa_login->nama }}">
              <input wire:model="siswaId" type="text" name="nama" value="{{ $siswa_login->id }}" readonly> --}}
              <select wire:model="siswaId">
                <option value="">Pilih Siswa</option>
                  
                {{-- @foreach ($siswa as $s) --}}
                  <option value="{{ $siswa_login->id }}">{{ $siswa_login->nama }}</option>
                {{-- @endforeach --}}
              </select>
                  
              @error('siswaId') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
          </fieldset>

          <fieldset class="border border-gray-300 rounded-md p-4">
            <legend class="text-lg text-gray-700 px-2">Industri</legend>
            <div class="mb-4">
                  <select wire:model="industriId">
                      <option value="">Pilih Industri</option>
                      @foreach ($industris as $industri)
                          <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                      @endforeach
                  </select>
                  
                  @error('industriId') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
          </fieldset>

          <fieldset class="border border-gray-300 rounded-md p-4">
            <legend class="text-lg text-gray-700 px-2">Guru Pembimbing</legend>
            <div class="mb-4">
              <select wire:model="guruId">
                <option value="">Pilih Guru Pembimbing PKL</option>
                  @foreach ($gurus as $guru)
                    <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                  @endforeach
              </select>
                  
              @error('guruId') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
          </fieldset>

          <fieldset class="border border-gray-300 rounded-md p-4">
            <legend class="text-lg text-gray-700 px-2">Pelaksanaan PKL</legend>

            <div class="mb-4">
                  <label for="Mulai" class="block mb-2 text-sm font-bold text-gray-700">Mulai</label>
                  <input wire:model="mulai" type="date" id="start-date" name="start-date" class="mt-1 p-2 border rounded-md w-full focus:ring focus:ring-blue-300 focus:outline-none">
                  
                  
                  @error('mulai') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>

              <div class="mb-4">
                  <label for="Selesai" class="block mb-2 text-sm font-bold text-gray-700">Selesai</label>
                  <input wire:model="selesai" type="date" id="start-date" name="end-date" class="mt-1 p-2 border rounded-md w-full focus:ring focus:ring-blue-300 focus:outline-none">
                  
                  
                  @error('selesai') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
            
          </fieldset>

        </div>
      </div>
  
      <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
          <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green sm:text-sm sm:leading-5">
            Save
          </button>
        </span>
        <span class="flex w-full mt-3 rounded-md shadow-sm sm:mt-0 sm:w-auto">
            
          <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue sm:text-sm sm:leading-5">
            Cancel
          </button>
        </span>
        </form>
      </div>
        
    </div>
  </div>
</div>
