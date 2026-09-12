<x-filament-panels::page>
    <div x-data="{ tab: 'general' }">
        <x-filament::tabs label="Tab data masjid">
            <x-filament::tabs.item alpine-active="tab === 'general'" x-on:click="tab = 'general'">
                Informasi Umum
            </x-filament::tabs.item>
            <x-filament::tabs.item alpine-active="tab === 'address'" x-on:click="tab = 'address'">
                Alamat & Kontak
            </x-filament::tabs.item>
            <x-filament::tabs.item alpine-active="tab === 'description'" x-on:click="tab = 'description'">
                Deskripsi & Foto
            </x-filament::tabs.item>
        </x-filament::tabs>

        <div x-show="tab === 'general'" class="mt-6">
            <form wire:submit="saveGeneral">
                {{ $this->formGeneral }}

                <div class="mt-6">
                    <x-filament::button type="submit">
                        Simpan
                    </x-filament::button>
                </div>
            </form>
        </div>

        <div x-show="tab === 'address'" class="mt-6">
            <form wire:submit="saveAddress">
                {{ $this->formAddress }}

                <div class="mt-6">
                    <x-filament::button type="submit">
                        Simpan
                    </x-filament::button>
                </div>
            </form>
        </div>

        <div x-show="tab === 'description'" class="mt-6">
            <form wire:submit="saveDescription">
                {{ $this->formDescription }}

                <div class="mt-6">
                    <x-filament::button type="submit">
                        Simpan
                    </x-filament::button>
                </div>
            </form>
        </div>
    </div>
</x-filament-panels::page>
