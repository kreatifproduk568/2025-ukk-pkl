<div class="fixed inset-0 z-10 overflow-y-auto ease-out duration-400">
  <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
      
    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
  
    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
    
    <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <div class='py-4 px-4'>
        <h2 class='font-semibold'>Indrstri Baru</h2>
        Kontributor: {{ $siswa_login->nama }}
        <div class="border-t border-gray-300 my-2"></div>

      </div>
      <form>
        <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
        <div>

         

          <fieldset class="border border-gray-300 rounded-md p-4">
            <legend class="text-lg text-gray-700 px-2">Identitas Industri</legend>

            <div class="mb-4">
              <label for="indNama" class="block mb-2 text-sm font-bold text-gray-700">Nama</label>
              <input wire:model="indNama" type="text" class="mt-1 p-2 border rounded-md w-full focus:ring focus:ring-blue-300 focus:outline-none">
                  
              @error('indNama') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4">
              <label for="indBidUs" class="block mb-2 text-sm font-bold text-gray-700">Bidang Usaha</label>
              {{-- <input wire:model="indBidUs" type="textarea" class="mt-1 p-2 border rounded-md w-full focus:ring focus:ring-blue-300 focus:outline-none"> --}}
              <textarea wire:model="indBidUs">
              </textarea>    
              @error('indBidUs') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4">
              <label for="indAlmt" class="block mb-2 text-sm font-bold text-gray-700">Alamat</label>
              {{-- <input wire:model="indBidUs" type="textarea" class="mt-1 p-2 border rounded-md w-full focus:ring focus:ring-blue-300 focus:outline-none"> --}}
              <textarea wire:model="indAlmt">
              </textarea>    
              @error('indAlmt') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4">
              <label for="indKontak" class="block mb-2 text-sm font-bold text-gray-700">Kontak</label>
              <input wire:model="indKontak" type="text" class="mt-1 p-2 border rounded-md w-full focus:ring focus:ring-blue-300 focus:outline-none">
                  
              @error('indKontak') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4">
              <label for="indEmail" class="block mb-2 text-sm font-bold text-gray-700">email</label>
              <input wire:model="indEmail" type="text" class="mt-1 p-2 border rounded-md w-full focus:ring focus:ring-blue-300 focus:outline-none">
                  
              @error('indEmail') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="mb-4">
              <label for="indWebsite" class="block mb-2 text-sm font-bold text-gray-700">Website</label>
              <input wire:model="indWebsite" type="text" class="mt-1 p-2 border rounded-md w-full focus:ring focus:ring-blue-300 focus:outline-none">
                  
              @error('indWebsite') <span class="text-red-500">{{ $message }}</span>@enderror
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
