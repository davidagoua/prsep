<x-filament-panels::page>
<div class="flex justify-end  w-full">
    @if($ptba->status == 10)
    <div class="p-3  rounded text-white" style="background-color: #43add7">
        <span>En cours d'arbitrage</span>
    </div>
    @endif
</div>
<div>
    {{ $this->table }}
</div>
</x-filament-panels::page>
