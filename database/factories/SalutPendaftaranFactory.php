<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SalutPendaftaran>
 */
class SalutPendaftaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date(),
            'agama' => $this->faker->randomElement(['islam','kristen','hindu','buddha','konghucu']),
            'gender' => $this->faker->randomElement(['laki-laki','perempuan']),
            'status' => $this->faker->randomElement(['single','menikah','duda','janda']),
            'nik' => $this->faker->unique()->numerify('################'),
            'provinsi' => $this->faker->state(),
            'kab_kota' => $this->faker->city(),
            'kecamatan' => $this->faker->citySuffix(),
            'desa_kelurahan' => $this->faker->streetName(),
            'kode_pos' => $this->faker->postcode(),
            'alamat' => $this->faker->address(),
            'alamat_lain' => $this->faker->address(),
            'alamat_pengirim_modul' => $this->faker->randomElement(['ya','tidak']),
            'ukuran_almat' => $this->faker->randomElement(['S','M','L','XL','XXL','XXXL']),
            'nama_ibu_kandung' => $this->faker->name(),
            'no_hp' => $this->faker->unique()->numerify('08##############'),
            'no_hp_alternatif' => $this->faker->unique()->numerify('08##############'),
            'email' => $this->faker->unique()->safeEmail(),
            'jalur_program' => $this->faker->randomElement(['RPL','Non-RPL']),
            'file_ijazah' => 'uploads/ijazah/sample.pdf/sample.jpg',
            'no_ijazah' => strtoupper($this->faker->randomElement([
                'DN-' . $this->faker->numerify('##/UNIV/20##/#####'),
                'IJZ/' . $this->faker->lexify('???') . '/' . $this->faker->numerify('20##-#####'),
                'STTB/' . $this->faker->lexify('???') . '/' . $this->faker->numerify('20##/####')
            ])),
            'file_bukti_pembayaran' => 'uploads/bukti-bayar/sample.pdf/sample.jpg',
            'surat_pernyataan' => 'uploads/surat-pernyataan/sample.pdf/sample.jpg',
            'form_tanda_tangan' => 'uploads/surat-pernyataan/sample.pdf/sample.jpg',
            'ipk' => $this->faker->randomFloat(2, 2.0, 4.0),
            'file_foto' => 'uploads/foto/sample.jpg',
            'file_ktp' => 'uploads/ktp/sample.jpg',
            'file_ss_pddikti' => 'uploads/ss-pddikti/sample.jpg',
            'file_transkrip' => 'uploads/transkrip/sample.pdf/sample.jpg',
            'file_rpl_pembelajaran' => 'uploads/rpl-pembelajaran/sample.pdf/sample.jpg',
            'file_rpl_administrasi' => 'uploads/rpl-administrasi/sample.pdf/sample.jpg',
            'file_rpl_ekstrakulikuler' => 'uploads/rpl-ekstrakulikuler/sample.pdf/sample.jpg',
            'file_rpl_prestasi' => 'uploads/rpl-prestasi/sample.pdf/sample.jpg',
            'surat_keterangan_pindah' => 'uploads/surat-keterangan-pindah/sample.pdf/sample.jpg',
            'file_cv' => 'uploads/cv/sample.pdf/sample.jpg',
        ];
    }
}