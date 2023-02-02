<div class="card">
    <div class="card-body">
        <h4 class="text-center">==AGRILARAS==</h4>
        <table width="100%">
            <tr>
                <td>From</td>
                <td>:</td>
                <td class="float-right">{{date('d-m-Y',strtotime($tgl1))}}</td>
            </tr>
            <tr>
                <td>To</td>
                <td>:</td>
                <td class="float-right">{{date('d-m-Y',strtotime($tgl2))}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr style="3px solid black">
                </td>
            </tr>
            @php
            $total_penjualan =0;
            @endphp
            @foreach ($Penjualan as $p)
            @php
            $total_penjualan += $p->kredit
            @endphp
            <tr>
                <td>{{$p->nm_akun}}</td>
                <td>:</td>
                <td class="float-right">{{number_format($p->kredit,0)}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3">
                    <hr style="3px solid black">
                </td>
            </tr>
            <tr>
                <th>Total Penjualan</th>
                <th>:</th>
                <th class="float-right">{{number_format($total_penjualan,0)}}</th>
            </tr>
            <tr>
                <td colspan="3">
                    &nbsp;
                </td>
            </tr>
            @php
            $total = 0;
            @endphp
            @foreach ($uang as $u)
            @php
            $total += $u->debit - $u->kredit
            @endphp
            <tr>
                <td>{{$u->nm_akun}}</td>
                <td>:</td>
                <td class="float-right">{{number_format($u->debit - $u->kredit,0)}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3">
                    <hr style="3px solid black">
                </td>
            </tr>
            <tr>
                <th>Total Payment</th>
                <th>:</th>
                <th class="float-right">{{number_format($total,0)}}</th>
            </tr>


        </table>
    </div>
</div>