<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rasio BBM - {{$bulan}} {{$tahun}}</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 6pt;
        }
        p {
            font-size: 7pt;
        }
        h2 {
            font-size: 7pt;
        }
        .container {
            width: 100%;
            height: 100%;
            display: block;
        }
        .td-title{
            font-weight: bolder;
        }
        table {
            width: 100%;
            height: auto;
            border-collapse:collapse;
            table-layout: fixed;
            text-align: center;
        }
        td {
            font-size: 6pt;
            padding: 1px;
            border:0.5px solid black;
        }
        .page_break { page-break-before: always; }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 0;">REKAPITULASI BIAYA PER MINGGU BULAN {{$bulan}} {{$tahun}}</h2>
        <h2 style="text-align: right; font-style:italic; margin-top: 0; margin-bottom: 0;">UPDATE: &nbsp; &nbsp; {{ $updateDate }} &nbsp; &nbsp; </h2>
        <h2 style="margin-bottom: 0; margin-top: 0;">BRANCH: 31 LAMPUNG</h2>
        <table>
            <tr>
                <td rowspan="2" class="td-title" style="width: 1.5%">NO</td>
                <td rowspan="2" class="td-title" style="width: 3.5%">PLAT</td>
                <td rowspan="2" colspan="2" class="td-title">TANGGAL & KM TERAKHIR</td>
                @for ($i = 1; $i <= 5; $i++)
                    <td colspan="4" class="td-title">MINGGU KE {{ $i }}</td>
                    <td rowspan="2" class="td-title">RASIO</td>
                @endfor
                <td colspan="4" class="td-title">JUMLAH</td>
            </tr>
            <tr>
                @for ($i = 1; $i <= 5; $i++)
                    <td class="td-title">TGL</td>
                    <td class="td-title">KM</td>
                    <td class="td-title">QTY</td>
                    <td class="td-title">RP</td>
                @endfor
                <td class="td-title">RP</td>
                <td class="td-title">LITER</td>
                <td class="td-title">KM</td>
                <td class="td-title">RASIO</td>
            </tr>
            @php
                $no = 1;
            @endphp
            @foreach ($rasiobbm['rasio_bbm'] as $rb) {{-- per kendaraan --}}
                <tr>
                    @if ($rb['laporan_terbanyak'] > 1)
                        <td rowspan="{{ $rb['laporan_terbanyak'] }}">{{ $no }}</td>
                        <td rowspan="{{ $rb['laporan_terbanyak'] }}">{{ $rb['vehicle_id'] }}</td>
                        <td rowspan="{{ $rb['laporan_terbanyak'] }}" style="width: 3.5%">{{ $rb['tgl_terakhir'] }}</td>
                        <td rowspan="{{ $rb['laporan_terbanyak'] }}">{{ $rb['km_terakhir'] }}</td>
                    @else
                        <td>{{ $no }}</td>
                        <td>{{ $rb['vehicle_id'] }}</td>
                        <td style="width: 3.5%">{{ $rb['tgl_terakhir'] }}</td>
                        <td>{{ $rb['km_terakhir'] }}</td>
                    @endif
                    @for ($i = 0; $i < 5; $i++) {{-- perulangan mingguan, menampilkan laporan pertama tiap minggu --}}
                        <td style="width: 3.5%">
                            @if(isset($rb['rasio'][$i]['listReport'][0]['tgl']))
                                {{ $rb['rasio'][$i]['listReport'][0]['tgl'] }}
                            @endif
                        </td>
                        <td>
                            @if(isset($rb['rasio'][$i]['listReport'][0]['km']))
                                {{ $rb['rasio'][$i]['listReport'][0]['km'] }}
                            @endif
                        </td>
                        <td style="text-align:right;">
                            @if(isset($rb['rasio'][$i]['listReport'][0]['qty']))
                                {{ $rb['rasio'][$i]['listReport'][0]['qty'] }}
                            @endif
                        </td>
                        <td style="text-align:right;">
                            @if(isset($rb['rasio'][$i]['listReport'][0]['rp']))
                                {{ $rb['rasio'][$i]['listReport'][0]['rp'] }}
                            @endif
                        </td>
                        <td style="text-align:right;">
                            @if(isset($rb['rasio'][$i]['listReport'][0]['rasio']))
                                {{ $rb['rasio'][$i]['listReport'][0]['rasio'] }}
                            @endif
                        </td>
                    @endfor
                    @if ($rb['laporan_terbanyak'] > 1)
                        <td style="text-align:right;" rowspan="{{ $rb['laporan_terbanyak'] }}">
                            @if ($rb['total_harga'] != 0)
                                {{ $rb['total_harga'] }}
                            @else
                                -
                            @endif
                        </td>
                        <td style="text-align:right;" rowspan="{{ $rb['laporan_terbanyak'] }}">
                            @if (isset( $rb['total_bbm'] ))
                                {{ $rb['total_bbm'] }}
                            @endif
                        </td>
                        <td style="text-align:right;" rowspan="{{ $rb['laporan_terbanyak'] }}">
                            @if (isset( $rb['total_km'] ))
                                {{ $rb['total_km'] }}
                            @endif
                        </td>
                        <td style="text-align:right;" rowspan="{{ $rb['laporan_terbanyak'] }}">
                            @if (isset( $rb['rasio_bulanan'] ))
                                {{ $rb['rasio_bulanan'] }}
                            @endif
                        </td>
                    @else
                        <td style="text-align:right;">
                            @if ($rb['total_harga'] != 0)
                                {{ $rb['total_harga'] }}
                            @else
                                -
                            @endif
                        </td>
                        <td style="text-align:right;">
                            @if (isset( $rb['total_bbm'] ))
                                {{ $rb['total_bbm'] }}
                            @endif
                        </td>
                        <td style="text-align:right;">
                            @if (isset( $rb['total_km'] ))
                                {{ $rb['total_km'] }}
                            @endif
                        </td>
                        <td style="text-align:right;">
                            @if (isset( $rb['rasio_bulanan'] ))
                                {{ $rb['rasio_bulanan'] }}
                            @endif
                        </td>
                    @endif
                </tr>
                @for ($i = 1; $i < $rb['laporan_terbanyak']; $i++) {{-- menampilkan laporan ke 2 dst per minggu nya--}}
                    <tr>
                        @for ($x = 0; $x < 5; $x++) {{-- perulangan mingguan --}}
                        <td style="width: 3.5%">
                            @if(isset($rb['rasio'][$x]['listReport'][$i]['tgl']))
                                {{ $rb['rasio'][$x]['listReport'][$i]['tgl'] }}
                            @endif
                        </td>
                        <td>
                            @if(isset($rb['rasio'][$x]['listReport'][$i]['km']))
                                {{ $rb['rasio'][$x]['listReport'][$i]['km'] }}
                            @endif
                        </td>
                        <td style="text-align:right;">
                            @if(isset($rb['rasio'][$x]['listReport'][$i]['qty']))
                                {{ $rb['rasio'][$x]['listReport'][$i]['qty'] }}
                            @endif
                        </td>
                        <td style="text-align:right;">
                            @if(isset($rb['rasio'][$x]['listReport'][$i]['rp']))
                                {{ $rb['rasio'][$x]['listReport'][$i]['rp'] }}
                            @endif
                        </td>
                        <td style="text-align:right;">
                            @if(isset($rb['rasio'][$x]['listReport'][$i]['rasio']))
                                {{ $rb['rasio'][$x]['listReport'][$i]['rasio'] }}
                            @endif
                        </td>
                        @endfor
                    </tr>
                @endfor
                @php
                    $no++;
                @endphp
            @endforeach
            <td colspan="4"></td>
            @for ($i = 0; $i < 5; $i++)
                <td colspan="2" style="font-style:italic; font-weight:bolder;">Total</td>
                @if (isset($rasiobbm['total_mingguan'][$i]['total_mingguan_bbm']))
                    <td style="font-style:italic; font-weight:bolder;">{{$rasiobbm['total_mingguan'][$i]['total_mingguan_bbm']}}</td>
                @else
                    <td style="font-style:italic; font-weight:bolder;">0</td>
                @endif
                @if (isset($rasiobbm['total_mingguan'][$i]['total_mingguan_harga']))
                <td style="font-style:italic; font-weight:bolder;">{{$rasiobbm['total_mingguan'][$i]['total_mingguan_harga']}}</td>
                @else
                    <td style="font-style:italic; font-weight:bolder;">0.00</td>
                @endif
                <td></td>
            @endfor
            @if (isset($rasiobbm['total_semua_harga']))
                    <td style="font-style:italic; font-weight:bolder;width= 100%;">{{$rasiobbm['total_semua_harga']}}</td>
            @else
                <td style="font-style:italic; font-weight:bolder;">0</td>
            @endif
            @if (isset($rasiobbm['total_semua_bbm']))
                    <td style="font-style:italic; font-weight:bolder;">{{$rasiobbm['total_semua_bbm']}}</td>
            @else
                <td style="font-style:italic; font-weight:bolder;">0</td>
            @endif
            @if (isset($rasiobbm['total_semua_harga']))
                    <td style="font-style:italic; font-weight:bolder;">{{$rasiobbm['total_semua_km']}}</td>
            @else
                <td style="font-style:italic; font-weight:bolder;">0</td>
            @endif
            <td></td>
        </table>
        <p style="margin-bottom: 0; margin-top: 0;">ts/ga dept/18</p>
        <p style="text-align: right; padding-right: 75px; padding-bottom: 100px; margin-top: 0;">Acknowledge by,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Approved by,</p>
        <p style="text-align: right; padding-right: 75px; margin-top: 0; margin-bottom: 0;">
            Tri Sugito&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Imam Alkarim&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Ismatul Umi Siti Roziqoh&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Nova Safarini&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Harry Djauhari
        </p>
        <p style="text-align: right; padding-right: 75px; margin-top: 0;">
            Admin GA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Leader Admin PGA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;
            Admin Finance&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Accounting&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;
            Branch Head&nbsp;
        </p>
        <div class="page_break">
            <h3>Catatan BBM TLO</h3>
            @if (isset($rasiobbm['rasio_bbm']))
                @foreach ($rasiobbm['rasio_bbm'] as $RB)
                    <h3 style="margin-bottom: 0;">{{ $RB['vehicle_id'] }}</h3>
                    @if (isset($RB['rasio']))
                        @foreach ($RB['rasio'] as $Rasio)
                            @if (isset($Rasio['listReport']))
                                @foreach ($Rasio['listReport'] as $lR)
                                    @if (isset($lR['list_klaim']))
                                        @foreach ($lR['list_klaim'] as $lK)
                                            <p style="margin-bottom: 0; margin-top: 0;">{{ $lR['tgl'] }} | Report Finance ID: 
                                                <a href="http://localhost:8000/laporanKlaim/cari?vehicleID={{ $RB['vehicle_id'] }}&kategori=report_finance_id&cari_laporanKlaim={{ $lK['report_finance_id'] }}" target="_blank">
                                                    {{ $lK['report_finance_id'] }}
                                                </a> | Mengisi {{ $lK['liter_klaim'] }} {{ $lK['remark_klaim'] }} pada {{ $lK['tgl_klaim'] }}. | TLO untuk Report ID: 
                                                <a href="http://localhost:8000/laporan/cari?vehicleID={{ $RB['vehicle_id'] }}&kategori=report_id&cari_laporan={{ $lK['report_id_terkait'] }}" target="_blank">
                                                    {{ $lK['report_id_terkait'] }}
                                                </a> | Kegiatan TLO: {{ $lK['remark_terkait'] }}
                                            </p>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</body>
</html>