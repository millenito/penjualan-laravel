<x-volt-app title="Laporan Transaksi">
    {!! form()->open()->post()->action(route('report.print'))->horizontal() !!}

    <x-volt-panel title="Laporan" icon="user-plus">
    {!! form()->datepicker('date')->label('Tanggal') !!}
    </x-volt-panel>

    {!! form()->action(form()->submit(__('Submit')), form()->link(__('Cancel'), route('products'))) !!}
    {!! form()->close() !!}
</x-volt-app>
