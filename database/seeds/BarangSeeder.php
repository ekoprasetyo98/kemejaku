<?php

use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // for ($i=0; $i < 2; $i++) { 
            # code...
            DB::table('barangs')->insert([
                'nama_barang'=>'Kemeja 6',
                'gambar'=>'kemeja3.jpg',
                'harga'=>40000,
                'stok'=>5,
                'keterangan'=>'Ukuran S, M, L, XL',
                
            ]);
        // }
    }
}
