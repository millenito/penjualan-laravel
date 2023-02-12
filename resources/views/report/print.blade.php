<h2>Laporan Transaksi</h2>

<table>
    <tr>
        <th>Transaction</th>
        <th>User</th>
        <th>Total</th>
        <th>Date</th>
        <th>Item</th>
    </tr>
    @foreach ($data as $d)
        <tr>
            <td>{{ $d->document_code }} - {{ $d->document_number }}</td>
            <td>{{ $d->usernya->name }}</td>
            <td>Rp {{ number_format($d->total) }}</td>
            <td>{{ date('j F Y',strtotime($d->created_at)) }}</td>
            <td>
                @foreach ($d->details as $details)
                    {{ $details->product->product_name }} X {{ $details->quantity }}<br>
                @endforeach
                    </td>
        </tr>
    @endforeach
</table>
<style>
table {
    border-collapse: collapse;
    width: 80%;
    margin: auto;
}

  th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
  }

  th {
      background-color: lightgray;
  }
  h2 {
      text-align: center;
      font-family: Arial, sans-serif;
  }
</style>
