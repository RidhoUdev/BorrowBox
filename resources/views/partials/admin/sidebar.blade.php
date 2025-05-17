<aside class="w-64 min-h-screen bg-teal-200 text-gray-800 p-4 flex flex-col shadow-lg">
    <div class="flex items-center gap-10 mb-8">
        <img src="{{ asset('img/logo-borrowbox.svg') }}" class="w-10">
        <span class="text-xl font-bold text-cyan-800">BorrowBox</span>
    </div>

    <nav class="flex-1">
        <h3 class="mb-2 text-xs font-semibold tracking-wider text-gray-500 uppercase">Menu</h3>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                   class="relative flex items-center px-3 py-2.5 rounded-lg transition duration-150 ease-in-out group
                          {{ request()->routeIs('admin.dashboard*')
                             ? 'bg-cyan-50 text-cyan-900 font-semibold before:content-[\'\'] before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:w-1 before:h-4/5 before:bg-cyan-500 before:rounded-full'
                             : 'text-gray-700 hover:bg-cyan-50 hover:text-cyan-800' }}">
                    <div class="flex gap-3 items-center">
                        <span class="iconify w-6 h-6 flex-shrink-0 text-black" data-icon="material-symbols:dashboard-rounded"></span>
                        <span class="text-md">Dashboard</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.items.index') }}"
                   class="relative flex items-center px-3 py-2.5 rounded-lg transition duration-150 ease-in-out group
                          {{ request()->routeIs('admin.items*')
                             ? 'bg-cyan-50 text-cyan-900 font-semibold before:content-[\'\'] before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:w-1 before:h-4/5 before:bg-cyan-500 before:rounded-full'
                             : 'text-gray-700 hover:bg-cyan-50 hover:text-cyan-800' }}">
                    <div class="flex gap-3 items-center">
                        <span class="iconify w-6 h-6 flex-shrink-0 text-black" data-icon="solar:box-linear"></span>
                        <span class="text-md">Daftar Barang</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories.index') }}"
                   class="relative flex items-center px-3 py-2.5 rounded-lg transition duration-150 ease-in-out group
                          {{ request()->routeIs('admin.categories*')
                             ? 'bg-cyan-50 text-cyan-900 font-semibold before:content-[\'\'] before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:w-1 before:h-4/5 before:bg-cyan-500 before:rounded-full'
                             : 'text-gray-700 hover:bg-cyan-50 hover:text-cyan-800' }}">
                    <div class="flex items-center gap-3">
                        <span class="iconify w-6 h-6 flex-shrink-0 text-black" data-icon="fa6-solid:layer-group"></span>
                        Kategori
                    </div>
                </a>
            </li>
             <li>
                <a href="{{ route('admin.users.index') }}"
                   class="relative flex items-center px-3 py-2.5 rounded-lg transition duration-150 ease-in-out group
                          {{ request()->routeIs('admin.users*')
                             ? 'bg-cyan-50 text-cyan-900 font-semibold before:content-[\'\'] before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:w-1 before:h-4/5 before:bg-cyan-500 before:rounded-full'
                             : 'text-gray-700 hover:bg-cyan-50 hover:text-cyan-800'
                          }}">
                    <div class="flex items-center gap-3">
                        <span class="iconify w-6 h-6 flex-shrink-0" data-icon="material-symbols:manage-accounts-rounded"></span>
                        Manage Account
                    </div>
                </a>
            </li>
        </ul>
    </nav>

    <div class="mt-auto pt-4 border-t border-cyan-200">
    </div>
</aside>
