<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#CFFFFA]">
    <div class="flex flex-col md:flex-row min-h-screen">
    <aside class="md:w-64 w-full bg-[#CFFFFA] p-4 border-b md:border-b-0 md:border-r border-blue-300">
        <img src="images/BorrowBox" alt="">
        <div class="text-2xl font-bold mb-6 text-[#0F172A] text-center md:text-left">BorrowBox</div>
        <nav class="space-y-4 text-center md:text-left">
            <a href="#" class="flex items-center justify-center md:justify-start space-x-2 text-black hover:font-semibold">
                <span></span>
                <span>Menu</span>
            </a>
            <a href="#" class="flex items-center justify-center md:justify-start space-x-2 bg-white p-2 rounded-lg font-semibold shadow">
                <span></span>
                <span>Daftar Barang</span>
            </a>
            <a href="#" class="flex items-center justify-center md:justify-start space-x-2 text-black hover:font-semibold">
                <span></span>
                <span>Riwayat Peminjaman</span>
            </a>
        </nav>
        </aside>

        <main class="flex-1 p-6 bg-white rounded-t-3xl md:rounded-none">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <h1 class="text-2xl font-bold">Daftar Barang</h1>
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">+ Tambah</button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-[#CFFFFA]">
                    <th class="px-4 py-2">Gambar</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Stok</th>
                    <th class="px-4 py-2">Kategori</th>
                    <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700">
                    <tr class="bg-white border-t">
                        <td class="px-4 py-2">
                        <img src="images/gambar 1.png U" class="w-20 h-14 rounded object-cover" />
                        </td>
                            <td class="px-4 py-2">Mountain</td>
                            <td class="px-4 py-2">100</td>
                            <td class="px-4 py-2">Nature</td>
                            <td class="px-4 py-2 text-xl text-center">⋮</td>
                        </tr>
                </tbody>
                </table>

                <div class="mt-6 flex justify-end space-x-2">
                    <button class="px-3 py-1 border rounded hover:bg-gray-100">&lt;</button>
                    <button class="px-3 py-1 border rounded bg-blue-600 text-white">1</button>
                    <button class="px-3 py-1 border rounded hover:bg-gray-100">2</button>
                    <button class="px-3 py-1 border rounded hover:bg-gray-100">3</button>
                    <button class="px-3 py-1 border rounded hover:bg-gray-100">&gt;</button>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
