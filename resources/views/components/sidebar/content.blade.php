<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-4 px-3"
>

    <x-sidebar.link
        title="Dashboard"
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    @if (auth()->user()->role == 'admin')
    <x-sidebar.link
        title="User"
        href="{{ route('user.index') }}"
        :isActive="request()->routeIs('user*')"
    >
        <x-slot name="icon">
            <x-heroicon-o-users class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.dropdown
        title="Data Master"
        :active="Str::startsWith(request()->route()->uri(), ['bejana-tekan','instalasi-hydrant','instalasi-listrik','genset','ketel-uap','penyalur-petir','lain-lain','surat-izin-operator'])"
    >
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Bejana Tekan"
            href="{{ route('bejana-tekan.index') }}"
            :active="request()->routeIs('bejana-tekan*')"
        />
        <x-sidebar.sublink
            title="Instalasi Hydrant"
            href="{{ route('instalasi-hydrant.index') }}"
            :active="request()->routeIs('instalasi-hydrant*')"
        />
        <x-sidebar.sublink
            title="Instalasi Listrik"
            href="{{ route('instalasi-listrik.index') }}"
            :active="request()->routeIs('instalasi-listrik*')"
        />
        <x-sidebar.sublink
            title="Genset"
            href="{{ route('genset.index') }}"
            :active="request()->routeIs('genset*')"
        />
        <x-sidebar.sublink
            title="Ketel Uap"
            href="{{ route('ketel-uap.index') }}"
            :active="request()->routeIs('ketel-uap*')"
        />
        <x-sidebar.sublink
            title="Penyalur Petir"
            href="{{ route('penyalur-petir.index') }}"
            :active="request()->routeIs('penyalur-petir*')"
        />
        <x-sidebar.sublink
            title="Surat Izin Operator"
            href="{{ route('surat-izin-operator.index') }}"
            :active="request()->routeIs('surat-izin-operator*')"
        />
        <x-sidebar.sublink
            title="Lain Lain"
            href="{{ route('lain-lain.index') }}"
            :active="request()->routeIs('lain-lain*')"
        />
    </x-sidebar.dropdown>
    <x-sidebar.dropdown
        title="Archive Data"
        :active="Str::startsWith(request()->route()->uri(), ['ga-archive','vendor-archive'])"
    >
        <x-slot name="icon">
            <x-heroicon-o-document-text class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
        <x-sidebar.sublink
            title="Ga Archive Data"
            href="{{ route('ga-archive.index') }}"
            :active="request()->routeIs('ga-archive*')"
        />  

        <x-sidebar.sublink
            title="Vendor Archive Data"
            href="{{ route('vendor-archive.index') }}"
            :active="request()->routeIs('vendor-archive*')"
        />
    </x-sidebar.dropdown>
    @endif


    <x-sidebar.dropdown
        title="Formulir"
        :active="Str::startsWith(request()->route()->uri(), ['vendor-form'])"
    >
        <x-slot name="icon">
            <x-heroicon-o-clipboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Vendor Form"
            href="{{ route('vendor-form.index') }}"
            :active="request()->routeIs('vendor-form*')"
        />
    </x-sidebar.dropdown>
    <x-sidebar.dropdown
        title="Report"
        :active="Str::startsWith(request()->route()->uri(), ['report'])"
    >
        <x-slot name="icon">
            <x-heroicon-o-newspaper class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Data Master"
            href="{{ route('report.data-master') }}"
            :active="request()->routeIs('report.data-master*')"
        />
        <x-sidebar.sublink
            title="Archive"
            href="{{ route('report.archive') }}"
            :active="request()->routeIs('report.archive*')"
        />
    </x-sidebar.dropdown>

    <x-sidebar.link
        title="Arrangement"
        href="{{ route('profile.edit') }}"
        :isActive="request()->routeIs('profile.edit*')"
    >
        <x-slot name="icon">
            <x-heroicon-o-user class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link
        title="Setting"
        href="{{ route('setting.index') }}"
        :isActive="request()->routeIs('setting*')"
    >
        <x-slot name="icon">
            <x-heroicon-o-cog class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

</x-perfect-scrollbar>
