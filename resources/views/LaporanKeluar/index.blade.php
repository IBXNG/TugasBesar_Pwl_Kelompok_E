<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Keluar Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-primary-button tag="a" href="{{route('barangkeluar.print')}}">Cetak Laporan Masuk</x-primary-button>
                    <x-primary-button tag="a" href="{{ route('barangkeluar.export')}}">Export Excel</x-primary-button>
                    <br /><br />
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th class="py-2 bg-red-500 text-white">No</th>
                                <th class="py-2 bg-red-500 text-white">Tanggal Keluar</th>
                                <th class="py-2 bg-red-500 text-white">Kode Barang Keluar</th>
                                <th class="py-2 bg-red-500 text-white">Kode Barang</th>
                                <th class="py-2 bg-red-500 text-white">Nama Barang</th>
                                <th class="py-2 bg-red-500 text-white">Jumlah keluar</th>
                                <th class="py-2 bg-red-500 text-white">Tujuan</th>

                            </tr>
                        </x-slot>
                        @php $num=1; @endphp
                        @foreach($barang_keluar as $barangkeluar)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{ $barangkeluar->tgl_keluar }}</td>
                            <td>{{ $barangkeluar->kode_barang_keluar }}</td>
                            <td>{{ $barangkeluar->kode_barang }}</td>
                            <td>{{ $barangkeluar->barang->nama_barang }}</td>
                            <td>{{ $barangkeluar->jumlah_keluar }}</td>
                            <td>{{ $barangkeluar->tujuan }}</td>
                        </tr>
                        @endforeach

                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
