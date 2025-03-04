<x-app-layout>

    <style>
        /* Wrapper tabel */
        #siswaTable_wrapper {
            width: 100% !important;
            overflow-x: auto !important;
        }

        /* Styling tabel */
        table.dataTable {
            width: 100% !important;

        }

        table.dataTable thead th {
            background-color: #F3F4F6 !important;
            /* Tailwind gray-100 */
            color: #1F2937 !important;
            /* Tailwind gray-800 */
            text-transform: uppercase !important;
            font-size: 0.875rem !important;
            /* text-sm */
            padding: 0.5rem 1rem !important;
            /* px-4 py-2 */
            text-align: left !important;
        }

        table.dataTable tbody td {
            padding: 0.5rem 1rem !important;
            /* px-4 py-2 */

        }

        /* Warna baris genap */
        table.dataTable tbody tr:nth-child(even) {
            background-color: #F9FAFB !important;
            /* Tailwind gray-50 */
        }

        /* Pagination */
        .dataTables_paginate {
            display: flex !important;
            justify-content: flex-end !important;
            margin-top: 1rem !important;
        }

        .dataTables_paginate .paginate_button {
            background-color: #E5E7EB !important;
            /* Tailwind gray-200 */
            color: #374151 !important;
            /* Tailwind gray-700 */
            padding: 0.25rem 0.75rem !important;
            /* px-3 py-1 */
            margin: 0 0.25rem !important;
            /* mx-1 */
            transition: all 0.2s !important;
        }

        .dataTables_paginate .paginate_button:hover {
            background-color: #D1D5DB !important;
            /* Tailwind gray-300 */
        }

        .dataTables_paginate .paginate_button.current {
            background-color: #3B82F6 !important;
            /* Tailwind blue-500 */
            color: white !important;
        }

        /* Input pencarian */
        .dataTables_filter input {
            margin: 10px !important;
            border: 1px solid #D1D5DB !important;
            /* Tailwind gray-300 */
            border-radius: 0.5rem !important;
            /* rounded-lg */
            padding: 0.25rem 0.75rem !important;
            /* px-3 py-1 */
            outline: none !important;
            transition: all 0.2s !important;
        }

        .dataTables_filter input:focus {
            border-color: #3B82F6 !important;
            /* Tailwind blue-400 */
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5) !important;
            /* focus:ring-2 */
        }

        /* Dropdown untuk jumlah data per halaman */
        .dataTables_length select {
            border: 1px solid #D1D5DB !important;
            /* Tailwind gray-300 */
            border-radius: 0.5rem !important;
            /* rounded-lg */
            padding: 0.25rem 0.75rem !important;
            /* px-3 py-1 */
        }

        .dataTables_info {
            margin-top: 1.25rem !important;
            /* mt-5 */
        }

        table.dataTable tbody td {
            padding-top: 10px !important;
            padding-bottom: 10px !important;
        }

    </style>



    <div class="bg-white dark:bg-navy-600 dark:text-primary p-8 rounded-xl mt-2">
        <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
            <table id="siswaTable" class="is-zebra w-full text-left">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Jurusan</th>
                        <th>Kelas</th>
                    </tr>
                </thead>
                <tbody class="gap-y-16"></tbody>
            </table>
        </div>
    </div>

    @push('scripts')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#siswaTable').DataTable({
                processing: true
                , serverSide: false
                , ajax: "{{ route('siswa.data') }}"
                , columns: [{
                        data: 'DT_RowIndex'
                        , name: 'DT_RowIndex'
                    }
                    , {
                        data: 'nis'
                        , name: 'nis'
                    }
                    , {
                        data: 'nama'
                        , name: 'nama'
                    }
                    , {
                        data: 'alamat'
                        , name: 'alamat'
                    }
                    , {
                        data: 'tanggal_lahir'
                        , name: 'tanggal_lahir'
                    }
                    , {
                        data: 'jurusan'
                        , name: 'jurusan'
                    }
                    , {
                        data: 'kelas'
                        , name: 'kelas'
                    }
                ]
                , language: {
                    "lengthMenu": "Tampilkan _MENU_ data per halaman"
                    , "zeroRecords": "Tidak ada data ditemukan"
                    , "info": "Menampilkan _PAGE_ dari _PAGES_ halaman"
                    , "infoEmpty": "Tidak ada data tersedia"
                    , "infoFiltered": "(difilter dari total _MAX_ data)"
                    , "search": "Cari:"
                    , "paginate": {
                        "first": "Pertama"
                        , "last": "Terakhir"
                        , "next": "Berikutnya"
                        , "previous": "Sebelumnya"
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>