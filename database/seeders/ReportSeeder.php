<?php

namespace Database\Seeders;

use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    public function run()
    {
        $users = User::where('role', 'operator')->inRandomOrder()->first(); //random user dengan role operator
        
        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8414DA',
            'departure_date' => '2023-10-02',
            'departure_time' => '10:29:00',
            'arrival_date' => '2023-10-02',
            'arrival_time' => '11:04:00',
            'km_before' => '237966',
            'km_after' => '237967',
            'fuel' => 52.98,
            'fuel_cost' => 360264,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8246OA',
            'departure_date' => '2023-10-02',
            'departure_time' => '08:43:00',
            'arrival_date' => '2023-10-02',
            'arrival_time' => '09:01:00',
            'km_before' => '198796',
            'km_after' => '198797',
            'fuel' => 51.49,
            'fuel_cost' => 350132,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-10-02',
            'departure_time' => '09:02:00',
            'arrival_date' => '2023-10-02',
            'arrival_time' => '09:31:00',
            'km_before' => '201147',
            'km_after' => '201148',
            'fuel' => 66.18,
            'fuel_cost' => 450024,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-02',
            'departure_time' => '14:00:00',
            'arrival_date' => '2023-10-02',
            'arrival_time' => '17:30:00',
            'km_before' => '102076',
            'km_after' => '102115',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.MBK, Belanja',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-10-02',
            'departure_time' => '09:37:00',
            'arrival_date' => '2023-10-02',
            'arrival_time' => '16:15:00',
            'km_before' => '118653',
            'km_after' => '118659',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Budi Berlian',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-02',
            'departure_time' => '15:48:00',
            'arrival_date' => '2023-10-02',
            'arrival_time' => '16:08:00',
            'km_before' => '66456',
            'km_after' => '66462',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Budi Berlian',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-02',
            'departure_time' => '05:00:00',
            'arrival_date' => '2023-10-02',
            'arrival_time' => '07:00:00',
            'km_before' => '66402',
            'km_after' => '66441',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bandara Radin Intan',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-02',
            'departure_time' => '14:45:00',
            'arrival_date' => '2023-10-02',
            'arrival_time' => '15:00:00',
            'km_before' => '66441',
            'km_after' => '66456',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bandarlampung',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8246OA',
            'departure_date' => '2023-10-02',
            'departure_time' => '10:15:00',
            'arrival_date' => '2023-10-02',
            'arrival_time' => '14:30:00',
            'km_before' => '198797',
            'km_after' => '198897',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.SIP - site (tukar kend. BE8414DA) by Tio',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8414DA',
            'departure_date' => '2023-10-02',
            'departure_time' => '11:35:00',
            'arrival_date' => '2023-10-03',
            'arrival_time' => '16:05:00',
            'km_before' => '237967',
            'km_after' => '238442',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Tukar Kendaraan di tol (Rest Area) BE8246OA u/ ke PT.SIP - site by Agus & Ozi',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-02',
            'departure_time' => '13:35:00',
            'arrival_date' => '2023-10-02',
            'arrival_time' => '16:40:00',
            'km_before' => '232150',
            'km_after' => '232199',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.PSMI, BW, KLA',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8414DA',
            'departure_date' => '2023-10-03',
            'departure_time' => '16:31:00',
            'arrival_date' => '2023-10-03',
            'arrival_time' => '16:54:00',
            'km_before' => '238442',
            'km_after' => '238446',
            'fuel' => 44.1,
            'fuel_cost' => 299928,
            'remark' => 'Solar SPBU 21-353-10',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8246OA',
            'departure_date' => '2023-10-03',
            'departure_time' => '09:35:00',
            'arrival_date' => '2023-10-03',
            'arrival_time' => '10:00:00',
            'km_before' => '198904',
            'km_after' => '198905',
            'fuel' => 10.71,
            'fuel_cost' => 72828,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-03',
            'departure_time' => '13:40:00',
            'arrival_date' => '2023-10-03',
            'arrival_time' => '14:45:00',
            'km_before' => '102115',
            'km_after' => '102140',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'BCA Natar + BSI',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8140DY',
            'departure_date' => '2023-10-03',
            'departure_time' => '10:10:00',
            'arrival_date' => '2023-10-03',
            'arrival_time' => '14:40:00',
            'km_before' => '252018',
            'km_after' => '252063',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT. JPPI',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-03',
            'departure_time' => '10:01:00',
            'arrival_date' => '2023-10-03',
            'arrival_time' => '15:25:00',
            'km_before' => '232199',
            'km_after' => '232251',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.KLA, LIP, PSMI, GMP (Dalam Kota)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8492DG',
            'departure_date' => '2023-10-03',
            'departure_time' => '14:10:00',
            'arrival_date' => '2023-10-03',
            'arrival_time' => '15:15:00',
            'km_before' => '203575',
            'km_after' => '203600',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.Agritama Mitra Sejati',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8918OB',
            'departure_date' => '2023-10-03',
            'departure_time' => '11:30:00',
            'arrival_date' => '2023-10-03',
            'arrival_time' => '18:30:00',
            'km_before' => '64072',
            'km_after' => '64410',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.GPM - site',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8246OA',
            'departure_date' => '2023-10-03',
            'departure_time' => '18:25:00',
            'arrival_date' => '2023-10-05',
            'arrival_time' => '22:45:00',
            'km_before' => '198905',
            'km_after' => '199517',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.PSMI',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-10-03',
            'departure_time' => '10:30:00',
            'arrival_date' => '2023-10-05',
            'arrival_time' => '13:00:00',
            'km_before' => '201148',
            'km_after' => '201694',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Mr.Sarono, Mr.Iswahyono, Mr.Juni (kemb 05/10/23) by Ardian',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8145DY',
            'departure_date' => '2023-10-03',
            'departure_time' => '14:25:00',
            'arrival_date' => '2023-10-07',
            'arrival_time' => '13:22:00',
            'km_before' => '263975',
            'km_after' => '264283',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.GMP - site (kembali tgl. 07/10/23)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8183OB',
            'departure_date' => '2023-10-04',
            'departure_time' => '14:50:00',
            'arrival_date' => '2023-10-04',
            'arrival_time' => '15:10:00',
            'km_before' => '154864',
            'km_after' => '154864',
            'fuel' => 20.58,
            'fuel_cost' => 139944,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8918OB',
            'departure_date' => '2023-10-04',
            'departure_time' => '08:20:00',
            'arrival_date' => '2023-10-04',
            'arrival_time' => '08:37:00',
            'km_before' => '64410',
            'km_after' => '64411',
            'fuel' => 35.83,
            'fuel_cost' => 243644,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8918OB',
            'departure_date' => '2023-10-04',
            'departure_time' => '08:45:00',
            'arrival_date' => '2023-10-04',
            'arrival_time' => '17:30:00',
            'km_before' => '64411',
            'km_after' => '64602',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.GMP, KOP GMP - site',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-04',
            'departure_time' => '07:00:00',
            'arrival_date' => '2023-10-04',
            'arrival_time' => '17:05:00',
            'km_before' => '232251',
            'km_after' => '232601',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT. SGC - Site',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-04',
            'departure_time' => '13:58:00',
            'arrival_date' => '2023-10-04',
            'arrival_time' => '16:10:00',
            'km_before' => '102161',
            'km_after' => '102195',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Belanja',
        ]);
        
        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-04',
            'departure_time' => '14:20:00',
            'arrival_date' => '2023-10-04',
            'arrival_time' => '15:25:00',
            'km_before' => '66503',
            'km_after' => '66530',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bengkel Dinamor / Berkah',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8140DY',
            'departure_date' => '2023-10-04',
            'departure_time' => '08:40:00',
            'arrival_date' => '2023-10-04',
            'arrival_time' => '10:30:00',
            'km_before' => '252063',
            'km_after' => '252100',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bengkel Luar',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-04',
            'departure_time' => '09:25:00',
            'arrival_date' => '2023-10-04',
            'arrival_time' => '11:15:00',
            'km_before' => '66462',
            'km_after' => '66503',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Tanjungkarang - Teluk',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8414DA',
            'departure_date' => '2023-10-04',
            'departure_time' => '07:00:00',
            'arrival_date' => '2023-10-04',
            'arrival_time' => '16:10:00',
            'km_before' => '238448',
            'km_after' => '238638',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.GMP Factory',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-04',
            'departure_time' => '09:50:00',
            'arrival_date' => '2023-10-04',
            'arrival_time' => '11:40:00',
            'km_before' => '102146',
            'km_after' => '102161',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bank BCA + Megasari + Fitrinof',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8140DY',
            'departure_date' => '2023-10-04',
            'departure_time' => '13:25:00',
            'arrival_date' => '2023-10-04',
            'arrival_time' => '14:40:00',
            'km_before' => '252100',
            'km_after' => '252121',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Belanja keperluan, BRI',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-10-04',
            'departure_time' => '10:05:00',
            'arrival_date' => '2023-10-04',
            'arrival_time' => '16:40:00',
            'km_before' => '118660',
            'km_after' => '118975',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.Kirana Permata, PT.GPM',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8140DY',
            'departure_date' => '2023-10-05',
            'departure_time' => '08:45:00',
            'arrival_date' => '2023-10-05',
            'arrival_time' => '10:20:00',
            'km_before' => '252121',
            'km_after' => '252159',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.Trijaya Tirta Dharma',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-05',
            'departure_time' => '13:50:00',
            'arrival_date' => '2023-10-05',
            'arrival_time' => '15:15:00',
            'km_before' => '102195',
            'km_after' => '102232',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bank BCA Kedaton',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8414DA',
            'departure_date' => '2023-10-05',
            'departure_time' => '08:45:00',
            'arrival_date' => '2023-10-05',
            'arrival_time' => '15:05:00',
            'km_before' => '238638',
            'km_after' => '238740',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'CV.Ismaya dan Belanja',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-05',
            'departure_time' => '10:35:00',
            'arrival_date' => '2023-10-05',
            'arrival_time' => '15:50:00',
            'km_before' => '232601',
            'km_after' => '232666',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.BW (Dalam Kota)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8183OB',
            'departure_date' => '2023-10-05',
            'departure_time' => '11:30:00',
            'arrival_date' => '2023-10-05',
            'arrival_time' => '19:00:00',
            'km_before' => '154865',
            'km_after' => '155171',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.GPM',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-06',
            'departure_time' => '09:21:00',
            'arrival_date' => '2023-10-06',
            'arrival_time' => '09:45:00',
            'km_before' => '102232',
            'km_after' => '102239',
            'fuel' => 15,
            'fuel_cost' => 150000,
            'remark' => 'Solar SPBU 24-353-56 + Toko Megasari Natar',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-10-06',
            'departure_time' => '09:05:00',
            'arrival_date' => '2023-10-06',
            'arrival_time' => '09:18:00',
            'km_before' => '201694',
            'km_after' => '201695',
            'fuel' => 54.8,
            'fuel_cost' => 372640,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8246OA',
            'departure_date' => '2023-10-06',
            'departure_time' => '08:53:00',
            'arrival_date' => '2023-10-06',
            'arrival_time' => '09:01:00',
            'km_before' => '199517',
            'km_after' => '199518',
            'fuel' => 55.15,
            'fuel_cost' => 375020,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-06',
            'departure_time' => '08:31:00',
            'arrival_date' => '2023-10-06',
            'arrival_time' => '08:45:00',
            'km_before' => '232666',
            'km_after' => '232666',
            'fuel' => 55.15,
            'fuel_cost' => 375020,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-06',
            'departure_time' => '14:16:00',
            'arrival_date' => '2023-10-06',
            'arrival_time' => '15:20:00',
            'km_before' => '231750',
            'km_after' => '231751',
            'fuel' => 62.51,
            'fuel_cost' => 425068,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8414DA',
            'departure_date' => '2023-10-06',
            'departure_time' => '15:37:00',
            'arrival_date' => '2023-10-06',
            'arrival_time' => '16:15:00',
            'km_before' => '238853',
            'km_after' => '238853',
            'fuel' => 19.07,
            'fuel_cost' => 129676,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-10-06',
            'departure_time' => '15:15:00',
            'arrival_date' => '2023-10-06',
            'arrival_time' => '17:07:00',
            'km_before' => '201695',
            'km_after' => '201736',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bengkel Luar',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-06',
            'departure_time' => '14:15:00',
            'arrival_date' => '2023-10-06',
            'arrival_time' => '15:30:00',
            'km_before' => '66531',
            'km_after' => '66549',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Belanja',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8246OA',
            'departure_date' => '2023-10-06',
            'departure_time' => '14:00:00',
            'arrival_date' => '2023-10-06',
            'arrival_time' => '20:00:00',
            'km_before' => '199516',
            'km_after' => '199641',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Lampung Timur',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8414DA',
            'departure_date' => '2023-10-06',
            'departure_time' => '10:07:00',
            'arrival_date' => '2023-10-06',
            'arrival_time' => '15:30:00',
            'km_before' => '238741',
            'km_after' => '238853',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'CV.Bima Equipment',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8918OB',
            'departure_date' => '2023-10-06',
            'departure_time' => '10:00:00',
            'arrival_date' => '2023-10-06',
            'arrival_time' => '10:53:00',
            'km_before' => '64602',
            'km_after' => '64604',
            'fuel' => 14.7,
            'fuel_cost' => 99960,
            'remark' => 'Cuci Steam + SPBU',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-06',
            'departure_time' => '09:06:00',
            'arrival_date' => '2023-10-06',
            'arrival_time' => '15:15:00',
            'km_before' => '232667',
            'km_after' => '232716',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.Pelindo',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8183OB',
            'departure_date' => '2023-10-06',
            'departure_time' => '09:20:00',
            'arrival_date' => '2023-10-06',
            'arrival_time' => '17:00:00',
            'km_before' => '155172',
            'km_after' => '155314',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Kopkar Dwi Karya (Lampung Tengah)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-10-09',
            'departure_time' => '14:10:00',
            'arrival_date' => '2023-10-09',
            'arrival_time' => '15:15:00',
            'km_before' => '201736',
            'km_after' => '201752',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Beli Solar Dexlite Forklif & Belanja u/ kep. Kantor',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8183OB',
            'departure_date' => '2023-10-09',
            'departure_time' => '08:20:00',
            'arrival_date' => '2023-10-09',
            'arrival_time' => '08:36:00',
            'km_before' => '155314',
            'km_after' => '155315',
            'fuel' => 44.72,
            'fuel_cost' => 304096,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8145DY',
            'departure_date' => '2023-10-09',
            'departure_time' => '09:30:00',
            'arrival_date' => '2023-10-09',
            'arrival_time' => '09:45:00',
            'km_before' => '264283',
            'km_after' => '264284',
            'fuel' => 51.47,
            'fuel_cost' => 349996,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8977DH',
            'departure_date' => '2023-10-09',
            'departure_time' => '09:50:00',
            'arrival_date' => '2023-10-09',
            'arrival_time' => '14:00:00',
            'km_before' => '264555',
            'km_after' => '264557',
            'fuel' => 50.88,
            'fuel_cost' => 346000,
            'remark' => 'Solar SPBU 24-353-56 + Steam',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-09',
            'departure_time' => '14:55:00',
            'arrival_date' => '2023-10-09',
            'arrival_time' => '16:45:00',
            'km_before' => '66549',
            'km_after' => '66575',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Cintex Teluk Betung',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8140DY',
            'departure_date' => '2023-10-09',
            'departure_time' => '13:25:00',
            'arrival_date' => '2023-10-09',
            'arrival_time' => '15:55:00',
            'km_before' => '252160',
            'km_after' => '252167',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Cuci Steam',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-09',
            'departure_time' => '12:00:00',
            'arrival_date' => '2023-10-09',
            'arrival_time' => '17:30:00',
            'km_before' => '231751',
            'km_after' => '231850',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'BRI Bandar Jaya',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-09',
            'departure_time' => '10:13:00',
            'arrival_date' => '2023-10-09',
            'arrival_time' => '15:15:00',
            'km_before' => '232716',
            'km_after' => '232791',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.Hexindo, Bw, PSMI',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-09',
            'departure_time' => '09:35:00',
            'arrival_date' => '2023-10-09',
            'arrival_time' => '10:40:00',
            'km_before' => '102239',
            'km_after' => '102258',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Belanja',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8183OB',
            'departure_date' => '2023-10-09',
            'departure_time' => '09:25:00',
            'arrival_date' => '2023-10-09',
            'arrival_time' => '18:45:00',
            'km_before' => '155315',
            'km_after' => '155421',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bank BRI Bandar Jaya',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8414DA',
            'departure_date' => '2023-10-09',
            'departure_time' => '09:25:00',
            'arrival_date' => '2023-10-09',
            'arrival_time' => '18:45:00',
            'km_before' => '238854',
            'km_after' => '238960',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'BRI Bandar Jaya',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8246OA',
            'departure_date' => '2023-10-09',
            'departure_time' => '10:15:00',
            'arrival_date' => '2023-10-09',
            'arrival_time' => '16:00:00',
            'km_before' => '199641',
            'km_after' => '200299',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.SIP SMRE + MSJA',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-10',
            'departure_time' => '13:30:00',
            'arrival_date' => '2023-10-10',
            'arrival_time' => '16:30:00',
            'km_before' => '232791',
            'km_after' => '232027',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.PSMI',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-10',
            'departure_time' => '09:50:00',
            'arrival_date' => '2023-10-10',
            'arrival_time' => '17:30:00',
            'km_before' => '66584',
            'km_after' => '66643',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bank BCA dan Percetakan',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8414DA',
            'departure_date' => '2023-10-10',
            'departure_time' => '09:38:00',
            'arrival_date' => '2023-10-10',
            'arrival_time' => '16:15:00',
            'km_before' => '238961',
            'km_after' => '239067',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bank BRI Bandar Jaya',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8977DH',
            'departure_date' => '2023-10-10',
            'departure_time' => '09:45:00',
            'arrival_date' => '2023-10-10',
            'arrival_time' => '16:00:00',
            'km_before' => '264557',
            'km_after' => '264601',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'RS Immanuel + Bengkel Ismaya',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8183OB',
            'departure_date' => '2023-10-10',
            'departure_time' => '09:40:00',
            'arrival_date' => '2023-10-10',
            'arrival_time' => '16:00:00',
            'km_before' => '155421',
            'km_after' => '155537',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bank BRI Bandar Jaya',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-10',
            'departure_time' => '09:35:00',
            'arrival_date' => '2023-10-10',
            'arrival_time' => '19:00:00',
            'km_before' => '102258',
            'km_after' => '102473',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'KOP Dwi Karya, Mr.Dicky, GMP, KLA, PSMI, LIP',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-10',
            'departure_time' => '08:55:00',
            'arrival_date' => '2023-10-10',
            'arrival_time' => '09:35:00',
            'km_before' => '66575',
            'km_after' => '66584',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bank BCA + Samsat Mall Chandra Natar',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-10',
            'departure_time' => '09:10:00',
            'arrival_date' => '2023-10-10',
            'arrival_time' => '17:00:00',
            'km_before' => '231850',
            'km_after' => '232143',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Mr.Zainal Abidin',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-10-10',
            'departure_time' => '10:10:00',
            'arrival_date' => '2023-10-10',
            'arrival_time' => '16:10:00',
            'km_before' => '201752',
            'km_after' => '202020',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.GMP',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8183OB',
            'departure_date' => '2023-10-11',
            'departure_time' => '08:25:00',
            'arrival_date' => '2023-10-11',
            'arrival_time' => '08:50:00',
            'km_before' => '155537',
            'km_after' => '155538',
            'fuel' => 21.46,
            'fuel_cost' => 145928,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-11',
            'departure_time' => '08:55:00',
            'arrival_date' => '2023-10-11',
            'arrival_time' => '09:25:00',
            'km_before' => '232143',
            'km_after' => '232143',
            'fuel' => 42.65,
            'fuel_cost' => 290020,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8246OA',
            'departure_date' => '2023-10-11',
            'departure_time' => '16:15:00',
            'arrival_date' => '2023-10-11',
            'arrival_time' => '23:45:00',
            'km_before' => '200299',
            'km_after' => '200407',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bank BRI Bandar Jaya',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8414DA',
            'departure_date' => '2023-10-11',
            'departure_time' => '14:38:00',
            'arrival_date' => '2023-10-11',
            'arrival_time' => '23:50:00',
            'km_before' => '239068',
            'km_after' => '239174',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bank BRI Bandar Jaya',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8492DG',
            'departure_date' => '2023-10-11',
            'departure_time' => '14:00:00',
            'arrival_date' => '2023-10-11',
            'arrival_time' => '16:52:00',
            'km_before' => '203626',
            'km_after' => '203675',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bengkel Luar Ismaya',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8145DY',
            'departure_date' => '2023-10-11',
            'departure_time' => '10:48:00',
            'arrival_date' => '2023-10-11',
            'arrival_time' => '15:11:00',
            'km_before' => '264284',
            'km_after' => '264324',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.AMS, SIP, BW, PSMI (Dalam Kota)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8492DG',
            'departure_date' => '2023-10-11',
            'departure_time' => '10:45:00',
            'arrival_date' => '2023-10-11',
            'arrival_time' => '11:55:00',
            'km_before' => '203600',
            'km_after' => '203626',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.AMS',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-11',
            'departure_time' => '11:00:00',
            'arrival_date' => '2023-10-11',
            'arrival_time' => '11:42:00',
            'km_before' => '66644',
            'km_after' => '66660',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Griyacom Bandarlampung',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-11',
            'departure_time' => '10:44:00',
            'arrival_date' => '2023-10-11',
            'arrival_time' => '14:25:00',
            'km_before' => '232827',
            'km_after' => '232885',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.AMS',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-11',
            'departure_time' => '10:00:00',
            'arrival_date' => '2023-10-11',
            'arrival_time' => '13:50:00',
            'km_before' => '102473',
            'km_after' => '102528',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Belanja + Cetak Sticker',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-11',
            'departure_time' => '09:30:00',
            'arrival_date' => '2023-10-11',
            'arrival_time' => '16:00:00',
            'km_before' => '232144',
            'km_after' => '232246',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.Malindo',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8977DH',
            'departure_date' => '2023-10-11',
            'departure_time' => '09:25:00',
            'arrival_date' => '2023-10-11',
            'arrival_time' => '16:05:00',
            'km_before' => '264602',
            'km_after' => '264639',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'RS Immanuel',
        ]);
        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8183OB',
            'departure_date' => '2023-10-11',
            'departure_time' => '09:00:00',
            'arrival_date' => '2023-10-11',
            'arrival_time' => '16:30:00',
            'km_before' => '155538',
            'km_after' => '155865',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.Natarang Mining',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-12',
            'departure_time' => '08:40:00',
            'arrival_date' => '2023-10-12',
            'arrival_time' => '08:46:00',
            'km_before' => '102528',
            'km_after' => '102529',
            'fuel' => 29.41,
            'fuel_cost' => 294100,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8492DG',
            'departure_date' => '2023-10-12',
            'departure_time' => '15:18:00',
            'arrival_date' => '2023-10-12',
            'arrival_time' => '15:45:00',
            'km_before' => '203675',
            'km_after' => '203676',
            'fuel' => 54.42,
            'fuel_cost' => 370056,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-12',
            'departure_time' => '15:58:00',
            'arrival_date' => '2023-10-12',
            'arrival_time' => '16:10:00',
            'km_before' => '66691',
            'km_after' => '66692',
            'fuel' => 25,
            'fuel_cost' => 250000,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-12',
            'departure_time' => '13:26:00',
            'arrival_date' => '2023-10-12',
            'arrival_time' => '14:45:00',
            'km_before' => '102538',
            'km_after' => '102547',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Rio Motor (Natar)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8414DA',
            'departure_date' => '2023-10-12',
            'departure_time' => '10:34:00',
            'arrival_date' => '2023-10-12',
            'arrival_time' => '16:20:00',
            'km_before' => '239174',
            'km_after' => '239281',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bank BRI Bandar Jaya',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-12',
            'departure_time' => '10:22:00',
            'arrival_date' => '2023-10-12',
            'arrival_time' => '11:15:00',
            'km_before' => '102529',
            'km_after' => '102537',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bank BCA Natar',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-12',
            'departure_time' => '13:50:00',
            'arrival_date' => '2023-10-12',
            'arrival_time' => '14:00:00',
            'km_before' => '66683',
            'km_after' => '66691',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'BSI Natar',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-12',
            'departure_time' => '09:43:00',
            'arrival_date' => '2023-10-12',
            'arrival_time' => '15:00:00',
            'km_before' => '232885',
            'km_after' => '232948',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.GGP, JCI, BEM, PSMI (Dalam Kota)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-12',
            'departure_time' => '09:22:00',
            'arrival_date' => '2023-10-12',
            'arrival_time' => '11:30:00',
            'km_before' => '66660',
            'km_after' => '66683',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Griyacom Bandarlampung',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8977DH',
            'departure_date' => '2023-10-12',
            'departure_time' => '09:25:00',
            'arrival_date' => '2023-10-12',
            'arrival_time' => '15:40:00',
            'km_before' => '264639',
            'km_after' => '264706',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.Pelindo',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8918OB',
            'departure_date' => '2023-10-12',
            'departure_time' => '07:30:00',
            'arrival_date' => '2023-10-12',
            'arrival_time' => '19:30:00',
            'km_before' => '64604',
            'km_after' => '64861',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'CCM Kalianda',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8246OA',
            'departure_date' => '2023-10-12',
            'departure_time' => '08:42:00',
            'arrival_date' => '2023-10-12',
            'arrival_time' => '10:15:00',
            'km_before' => '200407',
            'km_after' => '200423',
            'fuel' => 63.24,
            'fuel_cost' => 430032,
            'remark' => 'Solar SPBU 24-353-56 & Bengkel Graha',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8145DY',
            'departure_date' => '2023-10-12',
            'departure_time' => '13:24:00',
            'arrival_date' => '2023-10-12',
            'arrival_time' => '16:20:00',
            'km_before' => '264324',
            'km_after' => '264371',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Vektor Sticker + Beli Serbuk',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-12',
            'departure_time' => '11:00:00',
            'arrival_date' => '2023-10-14',
            'arrival_time' => '18:00:00',
            'km_before' => '232246',
            'km_after' => '232699',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.PSMI + Retail',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-10-12',
            'departure_time' => '10:36:00',
            'arrival_date' => '2023-10-13',
            'arrival_time' => '15:51:00',
            'km_before' => '202020',
            'km_after' => '202027',
            'fuel' => 38.97,
            'fuel_cost' => 264996,
            'remark' => 'Solar SPBU 24-353-56 + Budi Berlian (kembali 13/10/23)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-10-12',
            'departure_time' => '07:00:00',
            'arrival_date' => '2023-10-12',
            'arrival_time' => '17:20:00',
            'km_before' => '118976',
            'km_after' => '119272',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.MBK Bunga Mayang',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-10-13',
            'departure_time' => '08:35:00',
            'arrival_date' => '2023-10-13',
            'arrival_time' => '17:57:00',
            'km_before' => '119272',
            'km_after' => '119569',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.ILP',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8918OB',
            'departure_date' => '2023-10-13',
            'departure_time' => '13:40:00',
            'arrival_date' => '2023-10-13',
            'arrival_time' => '14:35:00',
            'km_before' => '64861',
            'km_after' => '64868',
            'fuel' => 26.47,
            'fuel_cost' => 179996,
            'remark' => 'Solar SPBU 24-353-56 + Budi Berlian',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8183OB',
            'departure_date' => '2023-10-13',
            'departure_time' => '08:15:00',
            'arrival_date' => '2023-10-13',
            'arrival_time' => '16:00:00',
            'km_before' => '155865',
            'km_after' => '155867',
            'fuel' => 30.14,
            'fuel_cost' => 204952,
            'remark' => 'Solar SPBU 24-353-56 + Cuci Steam',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8414DA',
            'departure_date' => '2023-10-13',
            'departure_time' => '09:10:00',
            'arrival_date' => '2023-10-13',
            'arrival_time' => '10:10:00',
            'km_before' => '239281',
            'km_after' => '239282',
            'fuel' => 41.93,
            'fuel_cost' => 285124,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8145DY',
            'departure_date' => '2023-10-13',
            'departure_time' => '14:05:00',
            'arrival_date' => '2023-10-13',
            'arrival_time' => '17:20:00',
            'km_before' => '264371',
            'km_after' => '264408',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bengkel Luar (Ismaya Teknik)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-13',
            'departure_time' => '11:00:00',
            'arrival_date' => '2023-10-13',
            'arrival_time' => '11:30:00',
            'km_before' => '66692',
            'km_after' => '66706',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Vektor Sticker',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-13',
            'departure_time' => '10:55:00',
            'arrival_date' => '2023-10-13',
            'arrival_time' => '17:00:00',
            'km_before' => '102547',
            'km_after' => '102643',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.Santori/Anak Tuha - Lampung Tengah',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8246OA',
            'departure_date' => '2023-10-13',
            'departure_time' => '08:45:00',
            'arrival_date' => '2023-10-14',
            'arrival_time' => '16:00:00',
            'km_before' => '200424',
            'km_after' => '201006',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT. LIPI & KUD Sinar Jaya',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-13',
            'departure_time' => '08:40:00',
            'arrival_date' => '2023-10-13',
            'arrival_time' => '17:50:00',
            'km_before' => '232948',
            'km_after' => '233246',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.ILP',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8977DH',
            'departure_date' => '2023-10-13',
            'departure_time' => '12:50:00',
            'arrival_date' => '2023-10-13',
            'arrival_time' => '16:56:00',
            'km_before' => '264706',
            'km_after' => '264724',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'RS Advent',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8414DA',
            'departure_date' => '2023-10-13',
            'departure_time' => '10:15:00',
            'arrival_date' => '2023-10-16',
            'arrival_time' => '04:30:00',
            'km_before' => '239282',
            'km_after' => '239306',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bengkel Graha',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-14',
            'departure_time' => '07:30:00',
            'arrival_date' => '2023-10-14',
            'arrival_time' => '18:25:00',
            'km_before' => '66706',
            'km_after' => '66947',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'CCM Kalianda',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8918OB',
            'departure_date' => '2023-10-14',
            'departure_time' => '07:45:00',
            'arrival_date' => '2023-10-14',
            'arrival_time' => '21:25:00',
            'km_before' => '64868',
            'km_after' => '65128',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'CCM Kalianda',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-16',
            'departure_time' => '10:20:00',
            'arrival_date' => '2023-10-16',
            'arrival_time' => '11:20:00',
            'km_before' => '232699',
            'km_after' => '232709',
            'fuel' => 67.33,
            'fuel_cost' => 457844,
            'remark' => 'Solar SPBU 24-353-56 & Bengkel Graha Natar',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-10-16',
            'departure_time' => '09:38:00',
            'arrival_date' => '2023-10-16',
            'arrival_time' => '10:16:00',
            'km_before' => '119569',
            'km_after' => '119570',
            'fuel' => 58.82,
            'fuel_cost' => 400000,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-16',
            'departure_time' => '08:22:00',
            'arrival_date' => '2023-10-16',
            'arrival_time' => '11:30:00',
            'km_before' => '233246',
            'km_after' => '233255',
            'fuel' => 57.37,
            'fuel_cost' => 390116,
            'remark' => 'Solar SPBU 24-353-56 & Bengkel Graha',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8246OA',
            'departure_date' => '2023-10-16',
            'departure_time' => '14:13:00',
            'arrival_date' => '2023-10-16',
            'arrival_time' => '15:00:00',
            'km_before' => '201006',
            'km_after' => '201007',
            'fuel' => 55.89,
            'fuel_cost' => 380052,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-16',
            'departure_time' => '13:00:00',
            'arrival_date' => '2023-10-16',
            'arrival_time' => '16:20:00',
            'km_before' => '233256',
            'km_after' => '233285',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT SID KUD (Dalam Kota)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-10-16',
            'departure_time' => '13:50:00',
            'arrival_date' => '2023-10-16',
            'arrival_time' => '16:35:00',
            'km_before' => '119570',
            'km_after' => '119610',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT PSMI (Dalam Kota)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-16',
            'departure_time' => '13:50:00',
            'arrival_date' => '2023-10-16',
            'arrival_time' => '16:20:00',
            'km_before' => '232709',
            'km_after' => '232752',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'RS Immanuel',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-16',
            'departure_time' => '13:30:00',
            'arrival_date' => '2023-10-16',
            'arrival_time' => '16:15:00',
            'km_before' => '66947',
            'km_after' => '66976',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Fajar Agung, Toko Siliwangi',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8977DH',
            'departure_date' => '2023-10-16',
            'departure_time' => '12:15:00',
            'arrival_date' => '2023-10-16',
            'arrival_time' => '15:15:00',
            'km_before' => '264725',
            'km_after' => '264794',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'RS Immanuel',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-10-16',
            'departure_time' => '11:15:00',
            'arrival_date' => '2023-10-16',
            'arrival_time' => '21:50:00',
            'km_before' => '202027',
            'km_after' => '202223',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Lampung Timur (Retail)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-16',
            'departure_time' => '13:25:00',
            'arrival_date' => '2023-10-16',
            'arrival_time' => '17:20:00',
            'km_before' => '102643',
            'km_after' => '102786',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Belanja u/ keperluan kantor',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8977DH',
            'departure_date' => '2023-10-16',
            'departure_time' => '15:30:00',
            'arrival_date' => '2023-10-16',
            'arrival_time' => '15:00:00',
            'km_before' => '264794',
            'km_after' => '264800',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Budi Berlian',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8414DA',
            'departure_date' => '2023-10-16',
            'departure_time' => '18:08:00',
            'arrival_date' => '2023-10-25',
            'arrival_time' => '15:35:00',
            'km_before' => '239306',
            'km_after' => '240631',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bank BRI Krui (kembali 25/10/23), by Agus',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8183OB',
            'departure_date' => '2023-10-16',
            'departure_time' => '18:10:00',
            'arrival_date' => '2023-10-25',
            'arrival_time' => '15:45:00',
            'km_before' => '155867',
            'km_after' => '157127',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bank BRI Krui (kembali 25/10/23), by Riyan',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-17',
            'departure_time' => '09:05:00',
            'arrival_date' => '2023-10-17',
            'arrival_time' => '09:14:00',
            'km_before' => '66976',
            'km_after' => '66977',
            'fuel' => 26.11,
            'fuel_cost' => 261100,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-10-17',
            'departure_time' => '09:30:00',
            'arrival_date' => '2023-10-17',
            'arrival_time' => '10:20:00',
            'km_before' => '202223',
            'km_after' => '202224',
            'fuel' => 26.29,
            'fuel_cost' => 178772,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-17',
            'departure_time' => '08:53:00',
            'arrival_date' => '2023-10-17',
            'arrival_time' => '09:00:00',
            'km_before' => '102706',
            'km_after' => '102707',
            'fuel' => 22.01,
            'fuel_cost' => 220100,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-10-17',
            'departure_time' => '16:15:00',
            'arrival_date' => '2023-10-17',
            'arrival_time' => '16:20:00',
            'km_before' => '119801',
            'km_after' => '119802',
            'fuel' => 33.83,
            'fuel_cost' => 230044,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8977DH',
            'departure_date' => '2023-10-17',
            'departure_time' => '15:30:00',
            'arrival_date' => '2023-10-17',
            'arrival_time' => '16:10:00',
            'km_before' => '264801',
            'km_after' => '264802',
            'fuel' => 46.33,
            'fuel_cost' => 315044,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-17',
            'departure_time' => '14:40:00',
            'arrival_date' => '2023-10-17',
            'arrival_time' => '15:00:00',
            'km_before' => '102707',
            'km_after' => '102713',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Budi Berlian',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-17',
            'departure_time' => '13:48:00',
            'arrival_date' => '2023-10-17',
            'arrival_time' => '14:40:00',
            'km_before' => '66977',
            'km_after' => '66986',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bank BCA - Natar',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8145DY',
            'departure_date' => '2023-10-17',
            'departure_time' => '10:00:00',
            'arrival_date' => '2023-10-17',
            'arrival_time' => '11:30:00',
            'km_before' => '264408',
            'km_after' => '264432',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'RS Immanuel',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-17',
            'departure_time' => '09:54:00',
            'arrival_date' => '2023-10-17',
            'arrival_time' => '14:33:00',
            'km_before' => '233285',
            'km_after' => '233333',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.PSMI, BEN (Dalam Kota)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-17',
            'departure_time' => '09:00:00',
            'arrival_date' => '2023-10-17',
            'arrival_time' => '17:41:00',
            'km_before' => '232732',
            'km_after' => '232915',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'KOP Kar Dwi Karya',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-10-17',
            'departure_time' => '08:45:00',
            'arrival_date' => '2023-10-17',
            'arrival_time' => '15:15:00',
            'km_before' => '119610',
            'km_after' => '119801',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.GMP (Site)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8246OA',
            'departure_date' => '2023-10-17',
            'departure_time' => '10:10:00',
            'arrival_date' => '2023-10-21',
            'arrival_time' => '13:30:00',
            'km_before' => '201008',
            'km_after' => '201814',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT. SIP SMRE, MSJA, Retail (kembali 21/10/23)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-18',
            'departure_time' => '08:35:00',
            'arrival_date' => '2023-10-18',
            'arrival_time' => '09:40:00',
            'km_before' => '232916',
            'km_after' => '232922',
            'fuel' => 28.6,
            'fuel_cost' => 194480,
            'remark' => 'Solar SPBU 24-353-56 & Bengkel Budi Berlian',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-18',
            'departure_time' => '13:09:00',
            'arrival_date' => '2023-10-18',
            'arrival_time' => '17:34:00',
            'km_before' => '233333',
            'km_after' => '233448',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Retail Lampung Tengah',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-10-18',
            'departure_time' => '14:45:00',
            'arrival_date' => '2023-10-18',
            'arrival_time' => '16:40:00',
            'km_before' => '202224',
            'km_after' => '202257',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Prima Diesel',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-18',
            'departure_time' => '13:40:00',
            'arrival_date' => '2023-10-18',
            'arrival_time' => '16:15:00',
            'km_before' => '66986',
            'km_after' => '67018',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bayar Listrik - Tanjung Karang',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-18',
            'departure_time' => '09:45:00',
            'arrival_date' => '2023-10-18',
            'arrival_time' => '16:10:00',
            'km_before' => '102713',
            'km_after' => '102793',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.KLA, PLN & Belanja u/ keperluan kantor',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-10-18',
            'departure_time' => '06:50:00',
            'arrival_date' => '2023-10-18',
            'arrival_time' => '16:40:00',
            'km_before' => '119202',
            'km_after' => '120203',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.Prima Alumga & PT.SIP',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-18',
            'departure_time' => '09:45:00',
            'arrival_date' => '2023-10-19',
            'arrival_time' => '16:20:00',
            'km_before' => '232922',
            'km_after' => '233309',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.PSMI, Mrs.Srinida (kembali 19/10/23)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8977DH',
            'departure_date' => '2023-10-18',
            'departure_time' => '09:10:00',
            'arrival_date' => '2023-10-24',
            'arrival_time' => '16:00:00',
            'km_before' => '264802',
            'km_after' => '265546',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.GPM Site (kembali 24/10/23)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8492DG',
            'departure_date' => '2023-10-18',
            'departure_time' => '08:45:00',
            'arrival_date' => '2023-10-24',
            'arrival_time' => '15:05:00',
            'km_before' => '203676',
            'km_after' => '203687',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Budi Berlian',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8140DY',
            'departure_date' => '2023-10-19',
            'departure_time' => '11:40:00',
            'arrival_date' => '2023-10-19',
            'arrival_time' => '14:15:00',
            'km_before' => '252167',
            'km_after' => '252197',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Toko Megasari Natar',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-19',
            'departure_time' => '10:32:00',
            'arrival_date' => '2023-10-19',
            'arrival_time' => '14:24:00',
            'km_before' => '233448',
            'km_after' => '233494',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.GMP, GGP (Dalam Kota)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-10-19',
            'departure_time' => '08:27:00',
            'arrival_date' => '2023-10-20',
            'arrival_time' => '14:40:00',
            'km_before' => '120204',
            'km_after' => '120217',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bengkel Graha Natar',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-10-19',
            'departure_time' => '09:35:00',
            'arrival_date' => '2023-10-21',
            'arrival_time' => '16:30:00',
            'km_before' => '202250',
            'km_after' => '202597',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.GMP',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8145DY',
            'departure_date' => '2023-10-19',
            'departure_time' => '09:45:00',
            'arrival_date' => '2023-10-21',
            'arrival_time' => '14:40:00',
            'km_before' => '264432',
            'km_after' => '264711',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.GMP',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-10-20',
            'departure_time' => '14:50:00',
            'arrival_date' => '2023-10-20',
            'arrival_time' => '15:35:00',
            'km_before' => '120217',
            'km_after' => '120218',
            'fuel' => 51.48,
            'fuel_cost' => 350064,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8918OB',
            'departure_date' => '2023-10-20',
            'departure_time' => '16:25:00',
            'arrival_date' => '2023-10-20',
            'arrival_time' => '17:20:00',
            'km_before' => '65154',
            'km_after' => '65161',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Pertamina (tidak jadi isi BBM)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-20',
            'departure_time' => '09:45:00',
            'arrival_date' => '2023-10-20',
            'arrival_time' => '10:15:00',
            'km_before' => '233310',
            'km_after' => '233310',
            'fuel' => 49.5,
            'fuel_cost' => 336600,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-20',
            'departure_time' => '14:55:00',
            'arrival_date' => '2023-10-20',
            'arrival_time' => '15:55:00',
            'km_before' => '67060',
            'km_after' => '67072',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Toko Fitrinof',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8918OB',
            'departure_date' => '2023-10-20',
            'departure_time' => '14:00:00',
            'arrival_date' => '2023-10-20',
            'arrival_time' => '16:00:00',
            'km_before' => '65128',
            'km_after' => '65154',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.AMS (Dalam Kota)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-20',
            'departure_time' => '13:30:00',
            'arrival_date' => '2023-10-20',
            'arrival_time' => '13:45:00',
            'km_before' => '67051',
            'km_after' => '67060',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bengkel Graha',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-20',
            'departure_time' => '10:50:00',
            'arrival_date' => '2023-10-20',
            'arrival_time' => '12:00:00',
            'km_before' => '67026',
            'km_after' => '67051',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Cahaya Elektrindo + Percetakan',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-20',
            'departure_time' => '14:10:00',
            'arrival_date' => '2023-10-21',
            'arrival_time' => '14:00:00',
            'km_before' => '233311',
            'km_after' => '233561',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Retail Mr.Edi Sugiran',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-20',
            'departure_time' => '09:45:00',
            'arrival_date' => '2023-10-20',
            'arrival_time' => '10:25:00',
            'km_before' => '67018',
            'km_after' => '67026',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bank BCA',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-20',
            'departure_time' => '09:25:00',
            'arrival_date' => '2023-10-20',
            'arrival_time' => '16:35:00',
            'km_before' => '233495',
            'km_after' => '233598',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.SIP, BW (Dalam Kota)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-20',
            'departure_time' => '09:00:00',
            'arrival_date' => '2023-10-20',
            'arrival_time' => '14:30:00',
            'km_before' => '102793',
            'km_after' => '102859',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.JCI, KUD KS, Weslin',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-10-23',
            'departure_time' => '11:00:00',
            'arrival_date' => '2023-10-23',
            'arrival_time' => '14:20:00',
            'km_before' => '202597',
            'km_after' => '202599',
            'fuel' => 42.68,
            'fuel_cost' => 290224,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8918OB',
            'departure_date' => '2023-10-23',
            'departure_time' => '15:00:00',
            'arrival_date' => '2023-10-23',
            'arrival_time' => '15:30:00',
            'km_before' => '65161',
            'km_after' => '65162',
            'fuel' => 27.96,
            'fuel_cost' => 190128,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-23',
            'departure_time' => '05:10:00',
            'arrival_date' => '2023-10-23',
            'arrival_time' => '10:50:00',
            'km_before' => '233561',
            'km_after' => '233567',
            'fuel' => 28.2,
            'fuel_cost' => 191760,
            'remark' => 'Solar SPBU 24-353-56 & Cuci Steam',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8246OA',
            'departure_date' => '2023-10-23',
            'departure_time' => '08:55:00',
            'arrival_date' => '2023-10-23',
            'arrival_time' => '09:05:00',
            'km_before' => '201814',
            'km_after' => '201815',
            'fuel' => 49.27,
            'fuel_cost' => 335036,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8145DY',
            'departure_date' => '2023-10-23',
            'departure_time' => '09:40:00',
            'arrival_date' => '2023-10-23',
            'arrival_time' => '11:45:00',
            'km_before' => '264711',
            'km_after' => '264713',
            'fuel' => 52.21,
            'fuel_cost' => 355028,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-23',
            'departure_time' => '08:45:00',
            'arrival_date' => '2023-10-23',
            'arrival_time' => '08:55:00',
            'km_before' => '233599',
            'km_after' => '233599',
            'fuel' => 32.8,
            'fuel_cost' => 233040,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-23',
            'departure_time' => '08:35:00',
            'arrival_date' => '2023-10-23',
            'arrival_time' => '08:40:00',
            'km_before' => '102859',
            'km_after' => '102860',
            'fuel' => 19,
            'fuel_cost' => 190000,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-10-23',
            'departure_time' => '14:20:00',
            'arrival_date' => '2023-10-23',
            'arrival_time' => '16:07:00',
            'km_before' => '120218',
            'km_after' => '120247',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'SIP Perwakilan',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-23',
            'departure_time' => '10:05:00',
            'arrival_date' => '2023-10-23',
            'arrival_time' => '16:11:00',
            'km_before' => '233599',
            'km_after' => '233673',
            'fuel' => NULL,
            'fuel_cost' =>NULL,
            'remark' => 'PT.PSMI',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-23',
            'departure_time' => '10:00:00',
            'arrival_date' => '2023-10-23',
            'arrival_time' => '13:15:00',
            'km_before' => '67072',
            'km_after' => '67106',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Rajabasa (Survey Rumah Dinas)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-23',
            'departure_time' => '10:00:00',
            'arrival_date' => '2023-10-23',
            'arrival_time' => '13:50:00',
            'km_before' => '102860',
            'km_after' => '102919',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.Westlin, GGP, BCA',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8918OB',
            'departure_date' => '2023-10-24',
            'departure_time' => '14:03:00',
            'arrival_date' => '2023-10-24',
            'arrival_time' => '16:30:00',
            'km_before' => '65162',
            'km_after' => '65199',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.PSMI, GMP (Dalam Kota)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1055ES',
            'departure_date' => '2023-10-24',
            'departure_time' => '13:35:00',
            'arrival_date' => '2023-10-24',
            'arrival_time' => '15:30:00',
            'km_before' => '260832',
            'km_after' => '260864',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Barokah, Prima Diesel',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-24',
            'departure_time' => '13:50:00',
            'arrival_date' => '2023-10-24',
            'arrival_time' => '14:40:00',
            'km_before' => '102919',
            'km_after' => '102927',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bank BCA Natar',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-10-24',
            'departure_time' => '09:05:00',
            'arrival_date' => '2023-10-24',
            'arrival_time' => '15:30:00',
            'km_before' => '120247',
            'km_after' => '120409',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Retail (Bandar Jaya + Lamteng)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-24',
            'departure_time' => '08:45:00',
            'arrival_date' => '2023-10-24',
            'arrival_time' => '23:42:00',
            'km_before' => '233673',
            'km_after' => '234029',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Retail Lampung Utara',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-24',
            'departure_time' => '10:45:00',
            'arrival_date' => '2023-10-25',
            'arrival_time' => '17:20:00',
            'km_before' => '233568',
            'km_after' => '233984',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.PSMI & Berkah Bubut',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-10-24',
            'departure_time' => '10:30:00',
            'arrival_date' => '2023-10-25',
            'arrival_time' => '12:30:00',
            'km_before' => '202599',
            'km_after' => '203012',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'KUD Sinar Jaya Oki',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8246OA',
            'departure_date' => '2023-10-24',
            'departure_time' => '11:00:00',
            'arrival_date' => '2023-10-27',
            'arrival_time' => '16:30:00',
            'km_before' => '201815',
            'km_after' => '202410',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.Sinar Mas',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8145DY',
            'departure_date' => '2023-10-24',
            'departure_time' => '09:45:00',
            'arrival_date' => '2023-10-27',
            'arrival_time' => '14:45:00',
            'km_before' => '264713',
            'km_after' => '265043',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.GMP',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-25',
            'departure_time' => '15:25:00',
            'arrival_date' => '2023-10-25',
            'arrival_time' => '15:30:00',
            'km_before' => '102927',
            'km_after' => '102928',
            'fuel' => 13.01,
            'fuel_cost' => 130100,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-10-25',
            'departure_time' => '14:05:00',
            'arrival_date' => '2023-10-25',
            'arrival_time' => '15:15:00',
            'km_before' => '203012',
            'km_after' => '203021',
            'fuel' => 46.33,
            'fuel_cost' => 315044,
            'remark' => 'Solar SPBU 24-353-56 & Bengkel Graha Natar',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-25',
            'departure_time' => '09:15:00',
            'arrival_date' => '2023-10-25',
            'arrival_time' => '10:05:00',
            'km_before' => '234029',
            'km_after' => '234030',
            'fuel' => 36.76,
            'fuel_cost' => 249968,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8977DH',
            'departure_date' => '2023-10-25',
            'departure_time' => '08:20:00',
            'arrival_date' => '2023-10-25',
            'arrival_time' => '09:15:00',
            'km_before' => '265546',
            'km_after' => '265547',
            'fuel' => 68.87,
            'fuel_cost' => 468316,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-10-25',
            'departure_time' => '10:19:00',
            'arrival_date' => '2023-10-25',
            'arrival_time' => '15:39:00',
            'km_before' => '120409',
            'km_after' => '120465',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.PSMI, TBL, BNI (Dalam Kota)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1055ES',
            'departure_date' => '2023-10-25',
            'departure_time' => '09:35:00',
            'arrival_date' => '2023-10-25',
            'arrival_time' => '15:30:00',
            'km_before' => '260864',
            'km_after' => '260938',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.JPPI',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8492DG',
            'departure_date' => '2023-10-25',
            'departure_time' => '10:00:00',
            'arrival_date' => '2023-10-27',
            'arrival_time' => '13:37:00',
            'km_before' => '265547',
            'km_after' => '266109',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Retail',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8414DA',
            'departure_date' => '2023-10-26',
            'departure_time' => '09:35:00',
            'arrival_date' => '2023-10-26',
            'arrival_time' => '10:00:00',
            'km_before' => '240631',
            'km_after' => '240632',
            'fuel' => 54.43,
            'fuel_cost' => 300016,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8183OB',
            'departure_date' => '2023-10-26',
            'departure_time' => '09:00:00',
            'arrival_date' => '2023-10-26',
            'arrival_time' => '09:45:00',
            'km_before' => '157127',
            'km_after' => '157140',
            'fuel' => 59.99,
            'fuel_cost' => 407930,
            'remark' => 'Solar SPBU 24-351-73 Pramuka',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-26',
            'departure_time' => '08:40:00',
            'arrival_date' => '2023-10-26',
            'arrival_time' => '09:34:00',
            'km_before' => '233984',
            'km_after' => '233985',
            'fuel' => 54.43,
            'fuel_cost' => 370124,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-10-26',
            'departure_time' => '14:00:00',
            'arrival_date' => '2023-10-26',
            'arrival_time' => '13:10:00',
            'km_before' => '120465',
            'km_after' => '120488',
            'fuel' => 25.13,
            'fuel_cost' => 170884,
            'remark' => 'Solar SPBU 24-351-74 Pagar Alam',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-26',
            'departure_time' => '14:03:00',
            'arrival_date' => '2023-10-26',
            'arrival_time' => '15:25:00',
            'km_before' => '67107',
            'km_after' => '67130',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Cahaya Elektrindo',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-10-26',
            'departure_time' => '08:50:00',
            'arrival_date' => '2023-10-26',
            'arrival_time' => '15:20:00',
            'km_before' => '203021',
            'km_after' => '203207',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.GMP',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8918OB',
            'departure_date' => '2023-10-26',
            'departure_time' => '07:40:00',
            'arrival_date' => '2023-10-26',
            'arrival_time' => '15:20:00',
            'km_before' => '65199',
            'km_after' => '65564',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.SIP (SBYM)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-26',
            'departure_time' => '11:00:00',
            'arrival_date' => '2023-10-26',
            'arrival_time' => '15:10:00',
            'km_before' => '102928',
            'km_after' => '102968',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'BCA Belanja',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-26',
            'departure_time' => '11:40:00',
            'arrival_date' => '2023-10-26',
            'arrival_time' => '15:19:00',
            'km_before' => '234030',
            'km_after' => '234069',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.PSMI, GMP (Dalam Kota)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8492DG',
            'departure_date' => '2023-10-26',
            'departure_time' => '14:00:00',
            'arrival_date' => '2023-10-26',
            'arrival_time' => '14:36:00',
            'km_before' => '203687',
            'km_after' => '203695',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bengel Berkah',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8183OB',
            'departure_date' => '2023-10-26',
            'departure_time' => '10:00:00',
            'arrival_date' => '2023-10-27',
            'arrival_time' => '11:00:00',
            'km_before' => '157140',
            'km_after' => '157444',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Mr.Sumarno & Eko Santoso',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8918OB',
            'departure_date' => '2023-10-27',
            'departure_time' => '09:34:00',
            'arrival_date' => '2023-10-27',
            'arrival_time' => '10:22:00',
            'km_before' => '65565',
            'km_after' => '65565',
            'fuel' => 17.8,
            'fuel_cost' => 300016,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8183OB',
            'departure_date' => '2023-10-27',
            'departure_time' => '13:40:00',
            'arrival_date' => '2023-10-27',
            'arrival_time' => '15:30:00',
            'km_before' => '157444',
            'km_after' => '157478',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Teluk Betung (Toko Baut)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-27',
            'departure_time' => '14:50:00',
            'arrival_date' => '2023-10-27',
            'arrival_time' => '16:45:00',
            'km_before' => '233986',
            'km_after' => '233987',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bengkel Berkah + Prima Diesel',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8918OB',
            'departure_date' => '2023-10-27',
            'departure_time' => '11:12:00',
            'arrival_date' => '2023-10-27',
            'arrival_time' => '11:48:00',
            'km_before' => '65565',
            'km_after' => '65579',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Samsat Mall Chandra',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-27',
            'departure_time' => '09:54:00',
            'arrival_date' => '2023-10-27',
            'arrival_time' => '16:00:00',
            'km_before' => '67131',
            'km_after' => '67200',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Toko Megasari + Super Star',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-10-27',
            'departure_time' => '08:15:00',
            'arrival_date' => '2023-10-27',
            'arrival_time' => '17:04:00',
            'km_before' => '120488',
            'km_after' => '120791',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.SIL, ILP',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-27',
            'departure_time' => '09:45:00',
            'arrival_date' => '2023-10-27',
            'arrival_time' => '15:20:00',
            'km_before' => '102968',
            'km_after' => '103023',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.SIP, AMS, BCA, Belanja',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-10-29',
            'departure_time' => '10:40:00',
            'arrival_date' => '2023-10-29',
            'arrival_time' => '20:00:00',
            'km_before' => '234069',
            'km_after' => '234115',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'RS Immanuel',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8977DH',
            'departure_date' => '2023-10-30',
            'departure_time' => '08:36:00',
            'arrival_date' => '2023-10-30',
            'arrival_time' => '10:55:00',
            'km_before' => '266109',
            'km_after' => '266111',
            'fuel' => 65.64,
            'fuel_cost' => 446352,
            'remark' => 'Solar SPBU 24-353-56 + Cuci Steam',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8145DY',
            'departure_date' => '2023-10-30',
            'departure_time' => '10:00:00',
            'arrival_date' => '2023-10-30',
            'arrival_time' => '10:47:00',
            'km_before' => '265043',
            'km_after' => '265044',
            'fuel' => 39.71,
            'fuel_cost' => 270028,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8246OA',
            'departure_date' => '2023-10-30',
            'departure_time' => '09:15:00',
            'arrival_date' => '2023-10-30',
            'arrival_time' => '09:55:00',
            'km_before' => '202410',
            'km_after' => '202411',
            'fuel' => 56.63,
            'fuel_cost' => 385084,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-30',
            'departure_time' => '13:30:00',
            'arrival_date' => '2023-10-30',
            'arrival_time' => '17:50:00',
            'km_before' => '103023',
            'km_after' => '103056',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Media Variasi Antasari',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-10-30',
            'departure_time' => '13:50:00',
            'arrival_date' => '2023-10-30',
            'arrival_time' => '15:20:00',
            'km_before' => '203207',
            'km_after' => '203244',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.PSMI, PT.SIP (Dalam Kota)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8977DH',
            'departure_date' => '2023-10-30',
            'departure_time' => '11:15:00',
            'arrival_date' => '2023-10-30',
            'arrival_time' => '16:05:00',
            'km_before' => '266111',
            'km_after' => '266142',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'RS.Immanuel & Media Variasi',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-30',
            'departure_time' => '09:30:00',
            'arrival_date' => '2023-10-30',
            'arrival_time' => '12:00:00',
            'km_before' => '234018',
            'km_after' => '234041',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'RS.Immanuel',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8183OB',
            'departure_date' => '2023-10-30',
            'departure_time' => '09:25:00',
            'arrival_date' => '2023-10-30',
            'arrival_time' => '13:25:00',
            'km_before' => '157470',
            'km_after' => '157521',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'RS.Urip',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8977DH',
            'departure_date' => '2023-10-30',
            'departure_time' => '09:25:00',
            'arrival_date' => '2023-10-30',
            'arrival_time' => '10:45:00',
            'km_before' => '203690',
            'km_after' => '203729',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'RS.Immanuel',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-10-30',
            'departure_time' => '06:44:00',
            'arrival_date' => '2023-10-30',
            'arrival_time' => '14:45:00',
            'km_before' => '120795',
            'km_after' => '121103',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.GPM',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8414DA',
            'departure_date' => '2023-10-30',
            'departure_time' => '11:35:00',
            'arrival_date' => '2023-11-1',
            'arrival_time' => '10:20:00',
            'km_before' => '240632',
            'km_after' => '241060',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Lampung Utara / Supriyanto, Kadek Asta',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8183OB',
            'departure_date' => '2023-10-31',
            'departure_time' => '08:15:00',
            'arrival_date' => '2023-10-31',
            'arrival_time' => '09:00:00',
            'km_before' => '157521',
            'km_after' => '157525',
            'fuel' => 36.64,
            'fuel_cost' => 249152,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-31',
            'departure_time' => '09:10:00',
            'arrival_date' => '2023-10-31',
            'arrival_time' => '09:20:00',
            'km_before' => '103056',
            'km_after' => '103057',
            'fuel' => 18,
            'fuel_cost' => 180000,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-10-31',
            'departure_time' => '15:25:00',
            'arrival_date' => '2023-10-31',
            'arrival_time' => '15:50:00',
            'km_before' => '121103',
            'km_after' => '121104',
            'fuel' => 66.17,
            'fuel_cost' => 449956,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-10-31',
            'departure_time' => '09:50:00',
            'arrival_date' => '2023-10-31',
            'arrival_time' => '16:32:00',
            'km_before' => '103057',
            'km_after' => '103327',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.Prima Alumga',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1055ES',
            'departure_date' => '2023-10-31',
            'departure_time' => '09:30:00',
            'arrival_date' => '2023-10-31',
            'arrival_time' => '15:07:00',
            'km_before' => '260939',
            'km_after' => '261014',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.LIP, SUL, GMP, PSMI (Dalam Kota)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-10-31',
            'departure_time' => '13:28:00',
            'arrival_date' => '2023-10-31',
            'arrival_time' => '14:55:00',
            'km_before' => '67201',
            'km_after' => '67211',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Samsat Mall Chandra Natar',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-10-31',
            'departure_time' => '10:15:00',
            'arrival_date' => '2023-11-1',
            'arrival_time' => '14:20:00',
            'km_before' => '203244',
            'km_after' => '203614',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Mr.Sumarno / Gede Kasa',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8145DY',
            'departure_date' => '2023-10-31',
            'departure_time' => '09:05:00',
            'arrival_date' => '2023-11-1',
            'arrival_time' => '16:45:00',
            'km_before' => '265044',
            'km_after' => '265423',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.GMP - Site (kembali 1/1/23, by Wahyu)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-10-31',
            'departure_time' => '08:30:00',
            'arrival_date' => '2023-11-1',
            'arrival_time' => '16:30:00',
            'km_before' => '234041',
            'km_after' => '234437',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.SIP, SBYM',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8246OA',
            'departure_date' => '2023-10-31',
            'departure_time' => '10:00:00',
            'arrival_date' => '2023-11-3',
            'arrival_time' => '14:00:00',
            'km_before' => '202411',
            'km_after' => '202977',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.PSMI, Retail',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8977DH',
            'departure_date' => '2023-10-31',
            'departure_time' => '09:50:00',
            'arrival_date' => '2023-11-7',
            'arrival_time' => '15:10:00',
            'km_before' => '266143',
            'km_after' => '266793',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT.ILP',
        ]);

        //seeder starter 
        // (untuk pemenuhan export, seeder dibawah ini wajib ada per mobil, 
        // 1 report pengisian bbm terakhir dan 1 report untuk km terakhir)
        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8977DH',
            'departure_date' => '2023-09-11',
            'departure_time' => '07:50:00',
            'arrival_date' => '2023-09-11',
            'arrival_time' => '08:10:00',
            'km_before' => '262666',
            'km_after' => '262667',
            'fuel' => 60.59,
            'fuel_cost' => 412012,
            'remark' => 'Solar SPBU 24-353-56',
        ]);
        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8977DH',
            'departure_date' => '2023-09-12',
            'departure_time' => '15:50:00',
            'arrival_date' => '2023-10-8',
            'arrival_time' => '15:00:00',
            'km_before' => '262717',
            'km_after' => '264555',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT. GPM - site, kembali tgl. 08/10/23 by, Surono',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-09-13',
            'departure_time' => '07:02:00',
            'arrival_date' => '2023-09-13',
            'arrival_time' => '08:00:00',
            'km_before' => '231157',
            'km_after' => '231158',
            'fuel' => 16.85,
            'fuel_cost' => 114580,
            'remark' => 'Solar SPBU 24-353-56',
        ]);
        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8493DG',
            'departure_date' => '2023-09-15',
            'departure_time' => '07:02:00',
            'arrival_date' => '2023-10-6',
            'arrival_time' => '15:38:00',
            'km_before' => '231743',
            'km_after' => '231750',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Budi Berlian, cek rem kembali tgl. 06/10/23',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8246OA',
            'departure_date' => '2023-09-25',
            'departure_time' => '07:02:00',
            'arrival_date' => '2023-09-25',
            'arrival_time' => '08:00:00',
            'km_before' => '198258',
            'km_after' => '198282',
            'fuel' => 39.71,
            'fuel_cost' => 270028,
            'remark' => 'Solar SPBU 24-353-56 & Bengkel Graha',
        ]);
        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8246OA',
            'departure_date' => '2023-09-27',
            'departure_time' => '07:02:00',
            'arrival_date' => '2023-09-27',
            'arrival_time' => '20:38:00',
            'km_before' => '198300',
            'km_after' => '198796',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'KUD Sinar Jaya & KUD Tunas Harapan',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8140DY',
            'departure_date' => '2023-09-25',
            'departure_time' => '07:02:00',
            'arrival_date' => '2023-09-25',
            'arrival_time' => '07:40:00',
            'km_before' => '251938',
            'km_after' => '251939',
            'fuel' => 14.71,
            'fuel_cost' => 100000,
            'remark' => 'Solar SPBU 24-353-56',
        ]);
        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8140DY',
            'departure_date' => '2023-09-27',
            'departure_time' => '07:02:00',
            'arrival_date' => '2023-09-27',
            'arrival_time' => '12:38:00',
            'km_before' => '251989',
            'km_after' => '252018',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'RS Immanuel',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8145DY',
            'departure_date' => '2023-09-26',
            'departure_time' => '09:02:00',
            'arrival_date' => '2023-09-26',
            'arrival_time' => '09:20:00',
            'km_before' => '263899',
            'km_after' => '263900',
            'fuel' => 47.95,
            'fuel_cost' => 326060,
            'remark' => 'Solar SPBU 24-353-56',
        ]);
        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8145DY',
            'departure_date' => '2023-09-27',
            'departure_time' => '07:02:00',
            'arrival_date' => '2023-10-2',
            'arrival_time' => '15:38:00',
            'km_before' => '263960',
            'km_after' => '263974',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bengkel budi Berlian kembali tgl. 02/10/23',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1606DC',
            'departure_date' => '2023-09-29',
            'departure_time' => '09:02:00',
            'arrival_date' => '2023-09-29',
            'arrival_time' => '09:20:00',
            'km_before' => '66401',
            'km_after' => '66402',
            'fuel' => 25,
            'fuel_cost' => 250000,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8492DG',
            'departure_date' => '2023-06-26',
            'departure_time' => '10:12:00',
            'arrival_date' => '2023-06-26',
            'arrival_time' => '10:20:00',
            'km_before' => '202280',
            'km_after' => '202281',
            'fuel' => 52.88,
            'fuel_cost' => 359584,
            'remark' => 'Solar SPBU 24-353-56',
        ]);
        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8492DG',
            'departure_date' => '2023-09-24',
            'departure_time' => '09:51:00',
            'arrival_date' => '2023-09-24',
            'arrival_time' => '12:00:00',
            'km_before' => '203551',
            'km_after' => '203575',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'RS Immanuel',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8414DA',
            'departure_date' => '2023-08-28',
            'departure_time' => '10:12:00',
            'arrival_date' => '2023-08-28',
            'arrival_time' => '10:20:00',
            'km_before' => '235828',
            'km_after' => '235829',
            'fuel' => 41.92,
            'fuel_cost' => 285056,
            'remark' => 'Solar SPBU 24-353-56',
        ]);
        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8414DA',
            'departure_date' => '2023-09-6',
            'departure_time' => '09:51:00',
            'arrival_date' => '2023-09-30',
            'arrival_time' => '12:00:00',
            'km_before' => '236083',
            'km_after' => '237966',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT. GMP - site kembali tgl. 30/09/23 (by, Maman)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8431OB',
            'departure_date' => '2023-09-29',
            'departure_time' => '10:12:00',
            'arrival_date' => '2023-09-29',
            'arrival_time' => '10:17:00',
            'km_before' => '118652',
            'km_after' => '118653',
            'fuel' => 41.18,
            'fuel_cost' => 280024,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1055ES',
            'departure_date' => '2023-09-25',
            'departure_time' => '11:12:00',
            'arrival_date' => '2023-09-25',
            'arrival_time' => '11:20:00',
            'km_before' => '260682',
            'km_after' => '260690',
            'fuel' => 33.84,
            'fuel_cost' => 338400,
            'remark' => 'Solar SPBU 24-353-56 & Natar',
        ]);
        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1055ES',
            'departure_date' => '2023-09-29',
            'departure_time' => '10:00:00',
            'arrival_date' => '2023-09-29',
            'arrival_time' => '17:00:00',
            'km_before' => '260770',
            'km_after' => '260832',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT. Theo Broma',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8751DA',
            'departure_date' => '2023-09-29',
            'departure_time' => '11:12:00',
            'arrival_date' => '2023-09-29',
            'arrival_time' => '11:30:00',
            'km_before' => '232111',
            'km_after' => '232112',
            'fuel' => 36.58,
            'fuel_cost' => 248744,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8918OB',
            'departure_date' => '2023-09-29',
            'departure_time' => '08:15:00',
            'arrival_date' => '2023-09-29',
            'arrival_time' => '08:40:00',
            'km_before' => '64071',
            'km_after' => '64072',
            'fuel' => 33.83,
            'fuel_cost' => 230044,
            'remark' => 'Solar SPBU 24-353-56',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-09-26',
            'departure_time' => '11:12:00',
            'arrival_date' => '2023-09-26',
            'arrival_time' => '11:20:00',
            'km_before' => '200350',
            'km_after' => '200351',
            'fuel' => 62.34,
            'fuel_cost' => 423912,
            'remark' => 'Solar SPBU 24-353-56',
        ]);
        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8260DL',
            'departure_date' => '2023-09-26',
            'departure_time' => '11:40:00',
            'arrival_date' => '2023-09-30',
            'arrival_time' => '14:25:00',
            'km_before' => '200351',
            'km_after' => '201147',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'PT. SIP SMRE + GABA (kembali tgl. 30/09/23)',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-09-27',
            'departure_time' => '13:00:00',
            'arrival_date' => '2023-09-27',
            'arrival_time' => '13:05:00',
            'km_before' => '102066',
            'km_after' => '102067',
            'fuel' => 15,
            'fuel_cost' => 150000,
            'remark' => 'Solar SPBU 24-353-56',
        ]);
        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE1664DB',
            'departure_date' => '2023-09-29',
            'departure_time' => '10:00:00',
            'arrival_date' => '2023-09-29',
            'arrival_time' => '10:45:00',
            'km_before' => '102067',
            'km_after' => '102075',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Bank BCA Natar',
        ]);

        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8183OB',
            'departure_date' => '2023-08-11',
            'departure_time' => '15:04:00',
            'arrival_date' => '2023-08-11',
            'arrival_time' => '15:11:00',
            'km_before' => '154784',
            'km_after' => '154785',
            'fuel' => 33.83,
            'fuel_cost' => 230044,
            'remark' => 'Solar SPBU 24-353-56',
        ]);
        Report::create([
            'users_id' => $users->id,
            'vehicle_id' => 'BE8183OB',
            'departure_date' => '2023-09-30',
            'departure_time' => '10:00:00',
            'arrival_date' => '2023-10-4',
            'arrival_time' => '16:45:00',
            'km_before' => '154836',
            'km_after' => '154864',
            'fuel' => NULL,
            'fuel_cost' => NULL,
            'remark' => 'Budi Berlian kembali tgl. 04/10/23',
        ]);
    }
}