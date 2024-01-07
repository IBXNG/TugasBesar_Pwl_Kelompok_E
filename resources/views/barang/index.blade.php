<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-primary-button tag="a" href="{{ route('barang.create') }}">Add</x-primary-button>
                    <br /><br />
                    <x-table class="w-full bg-blue-200 rounded-lg overflow-hidden">
                        <x-slot name="header">
                            <tr>
                                <th class="py-2 bg-red-500 text-white">No</th>
                                <th class="py-2 bg-red-500 text-white">Kode Barang</th>
                                <th class="py-2 bg-red-500 text-white">Nama Barang</th>
                                <th class="py-2 bg-red-500 text-white">Jenis</th>
                                <th class="py-2 bg-red-500 text-white">Harga</th>
                                <th class="py-2 bg-red-500 text-white">Cover</th>
                                <th class="py-2 bg-red-500 text-white">Stok</th>
                                <th class="py-2 bg-red-500 text-white">Aksi</th>
                            </tr>
                        </x-slot>
                        @php $num = 1; @endphp
                        @foreach($data as $barang)
                        <tr class="bg-white border-b-2 border-gray-300">
                            <td class="py-2">{{ $num++ }}</td>
                            <td class="py-2">{{ $barang['kode_barang'] }}</td>
                            <td class="py-2">{{ $barang['nama_barang'] }}</td>
                            <td class="py-2">{{ $barang['jenis'] }}</td>
                            <td class="py-2">{{ $barang['harga'] }}</td>
                            <td class="py-2">
                                <img src="{{ asset('storage/cover_barang/'.$barang['cover']) }}" width="100px" />
                            </td>
                            <td class="py-2">{{ $barang['total_stok'] }}</td>
                            <td class="py-2">
                                <x-primary-button tag="a" href="{{route('barang.edit', $barang['id'])}}">
                                    Edit
                                </x-primary-button>

                                <x-danger-button x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-book-deletion')"
                                    x-on:click="$dispatch('set-action', '{{ route('barang.destroy', $barang['id']) }}')">
                                    Delete
                                </x-danger-button>
                            </td>
                        </tr>
                        @endforeach
                    </x-table>
                    <x-modal name="confirm-book-deletion" focusable maxWidth="xl">
                        <form method="post" x-bind:action="action" class="p-6">
                            @csrf
                            @method('delete')
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Apakah anda yakin akan menghapus data?') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Setelah proses dilaksanakan. Data akan dihilangkan secara permanen.') }}
                            </p>
                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                                <x-danger-button class="ml-3">
                                    {{ __('Delete!!!') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
