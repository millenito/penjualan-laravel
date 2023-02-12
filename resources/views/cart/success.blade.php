<x-volt-app title="Sukses">

    {!! form()->open()->post()->action(route('products'))->horizontal() !!}
    <x-volt-panel title="Sukses">

        <div class="field"><label>Nomor Transaksi</label>
            <input type="text" name="cn_no" value=" {{ session('tx_header') }} " readonly="readonly">
        </div>

    </x-volt-panel>

    {!! form()->link('Kembali','products') !!}
    {!! form()->close() !!}

</x-volt-app>
