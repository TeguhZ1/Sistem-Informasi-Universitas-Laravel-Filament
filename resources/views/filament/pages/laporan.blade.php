<x-filament-panels::page>
    <div class="space-y-6">
        {{-- Section Data Dosen --}}
        <x-filament::section>
            <x-slot name="heading">
                <h2 class="text-xl font-semibold">Data Dosen</h2>
            </x-slot>

            <div class="overflow-x-auto">
                <table class="w-full text-sm filament-tables-table">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left bg-gray-50 dark:bg-gray-800 border dark:border-gray-700">NIDN</th>
                            <th class="px-4 py-2 text-left bg-gray-50 dark:bg-gray-800 border dark:border-gray-700">Nama</th>
                            <th class="px-4 py-2 text-left bg-gray-50 dark:bg-gray-800 border dark:border-gray-700">Jenis Kelamin</th>
                            <th class="px-4 py-2 text-left bg-gray-50 dark:bg-gray-800 border dark:border-gray-700">Bidang Keahlian</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($dosens as $dosen)
                            <tr class="bg-white dark:bg-gray-900 transition-colors hover:bg-gray-100 dark:hover:bg-gray-800">
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $dosen->nidn }}</td>
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $dosen->nama }}</td>
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $dosen->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $dosen->bidang_keahlian }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-filament::section>

        {{-- Section Data Mahasiswa --}}
        <x-filament::section>
            <x-slot name="heading">
                <h2 class="text-xl font-semibold">Data Mahasiswa</h2>
            </x-slot>

            <div class="overflow-x-auto">
                <table class="w-full text-sm filament-tables-table">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left bg-gray-50 dark:bg-gray-800 border dark:border-gray-700">NIM</th>
                            <th class="px-4 py-2 text-left bg-gray-50 dark:bg-gray-800 border dark:border-gray-700">Nama</th>
                            <th class="px-4 py-2 text-left bg-gray-50 dark:bg-gray-800 border dark:border-gray-700">Program Studi</th>
                            <th class="px-4 py-2 text-left bg-gray-50 dark:bg-gray-800 border dark:border-gray-700">Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($mahasiswas as $mahasiswa)
                            <tr class="bg-white dark:bg-gray-900 transition-colors hover:bg-gray-100 dark:hover:bg-gray-800">
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $mahasiswa->nim }}</td>
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $mahasiswa->nama }}</td>
                                <td class="px-4 py-2 border dark:border-gray-700">
                                    @switch($mahasiswa->program_studi)
                                        @case('TI')
                                            Teknik Informatika
                                            @break
                                        @case('SI')
                                            Sistem Informasi
                                            @break
                                        @case('ILKOM')
                                            Ilmu Komputer
                                            @break
                                    @endswitch
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $mahasiswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-filament::section>

        {{-- Section Data Mata Kuliah --}}
        <x-filament::section>
            <x-slot name="heading">
                <h2 class="text-xl font-semibold">Data Mata Kuliah</h2>
            </x-slot>

            <div class="overflow-x-auto">
                <table class="w-full text-sm filament-tables-table">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left bg-gray-50 dark:bg-gray-800 border dark:border-gray-700">Kode</th>
                            <th class="px-4 py-2 text-left bg-gray-50 dark:bg-gray-800 border dark:border-gray-700">Nama Mata Kuliah</th>
                            <th class="px-4 py-2 text-left bg-gray-50 dark:bg-gray-800 border dark:border-gray-700">SKS</th>
                            <th class="px-4 py-2 text-left bg-gray-50 dark:bg-gray-800 border dark:border-gray-700">Semester</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($mataKuliah as $mk)
                            <tr class="bg-white dark:bg-gray-900 transition-colors hover:bg-gray-100 dark:hover:bg-gray-800">
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $mk->kode }}</td>
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $mk->nama }}</td>
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $mk->sks }}</td>
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $mk->semester }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-filament::section>
    </div>

    {{-- Tambahkan script untuk print --}}
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('print', () => {
                window.print();
            });
        });
    </script>
</x-filament-panels::page>
