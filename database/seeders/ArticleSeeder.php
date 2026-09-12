<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            ['judul' => 'Keutamaan Sholat Berjamaah di Masjid', 'konten' => '<p>Sholat berjamaah memiliki keutamaan 27 derajat dibanding sholat sendirian. Selain pahala yang berlipat, sholat berjamaah juga mempererat ukhuwah antar jamaah.</p><p>Rasulullah SAW senantiasa menganjurkan umatnya untuk sholat berjamaah di masjid, terutama bagi kaum laki-laki yang mampu.</p>', 'published_at' => '2026-07-10'],
            ['judul' => 'Tips Menjaga Kebersihan Masjid', 'konten' => '<p>Kebersihan masjid adalah tanggung jawab bersama seluruh jamaah, bukan hanya pengurus DKM. Beberapa hal sederhana seperti melepas alas kaki dengan rapi dan membuang sampah pada tempatnya sangat membantu.</p><p>Pengurus DKM juga perlu menjadwalkan piket kebersihan rutin agar masjid selalu nyaman digunakan.</p>', 'published_at' => '2026-07-18'],
            ['judul' => 'Sejarah Singkat Masjid Al-Ikhlas', 'konten' => '<p>Masjid Al-Ikhlas berdiri sejak tahun 1994 atas swadaya masyarakat setempat. Awalnya hanya berupa musala kecil, kini telah berkembang menjadi masjid jami yang melayani ratusan jamaah.</p><p>Perjalanan panjang ini tidak lepas dari peran para tokoh masyarakat dan donatur yang terus mendukung pembangunan masjid.</p>', 'published_at' => '2026-07-25'],
            ['judul' => 'Adab Masuk dan Keluar Masjid', 'konten' => '<p>Islam mengajarkan adab-adab tertentu saat memasuki dan meninggalkan masjid, seperti mendahulukan kaki kanan saat masuk dan membaca doa yang dianjurkan.</p><p>Menjaga adab ini mencerminkan penghormatan kita terhadap rumah Allah.</p>', 'published_at' => '2026-08-01'],
            ['judul' => 'Manfaat Kajian Rutin bagi Jamaah', 'konten' => '<p>Kajian rutin membantu jamaah menambah ilmu agama sekaligus mempererat silaturahmi. Banyak masjid mengadakan kajian mingguan dengan tema yang beragam.</p><p>Konsistensi mengikuti kajian terbukti meningkatkan kualitas ibadah sehari-hari.</p>', 'published_at' => '2026-08-08'],
            ['judul' => 'Peran DKM dalam Memakmurkan Masjid', 'konten' => '<p>Dewan Kemakmuran Masjid (DKM) memiliki peran penting mulai dari pengelolaan keuangan, perawatan fasilitas, hingga penyelenggaraan kegiatan keagamaan.</p><p>DKM yang aktif dan transparan akan meningkatkan kepercayaan jamaah untuk turut berkontribusi.</p>', 'published_at' => '2026-08-15'],
            ['judul' => 'Panduan Zakat Fitrah untuk Jamaah', 'konten' => '<p>Zakat fitrah wajib ditunaikan oleh setiap muslim menjelang Idul Fitri. Masjid biasanya menjadi tempat penyaluran zakat fitrah bagi jamaah sekitar.</p><p>Pastikan zakat disalurkan tepat waktu agar bisa diterima oleh mustahik sebelum sholat Ied.</p>', 'published_at' => '2026-08-22'],
            ['judul' => 'Menghidupkan Malam Jumat dengan Ibadah', 'konten' => '<p>Malam Jumat memiliki keutamaan tersendiri dalam Islam. Banyak masjid mengisinya dengan kegiatan tadarus, sholawat, dan kajian singkat.</p><p>Menghidupkan malam Jumat dapat menjadi kebiasaan baik yang mempererat kedekatan dengan Allah.</p>', 'published_at' => '2026-08-29'],
            ['judul' => 'Pentingnya Pendidikan Al-Qur\'an Sejak Dini', 'konten' => '<p>Taman Pendidikan Al-Qur\'an (TPA) di masjid berperan besar dalam menanamkan kecintaan anak-anak terhadap Al-Qur\'an sejak usia dini.</p><p>Dukungan orang tua dan pengajar yang konsisten sangat menentukan keberhasilan program ini.</p>', 'published_at' => '2026-09-05'],
            ['judul' => 'Menyambut Tahun Baru Hijriyah dengan Muhasabah', 'konten' => '<p>Tahun baru Hijriyah menjadi momen yang tepat untuk melakukan muhasabah atau introspeksi diri atas amal yang telah dilakukan.</p><p>Banyak masjid mengadakan tabligh akbar untuk menyambut momen ini bersama jamaah.</p>', 'published_at' => '2026-09-10'],
            ['judul' => '(Draft) Rencana Renovasi Kubah Masjid', 'konten' => '<p>Draft artikel mengenai rencana renovasi kubah masjid tahun depan, masih menunggu persetujuan DKM sebelum dipublikasikan.</p>', 'published_at' => null],
            ['judul' => '(Draft) Program Beasiswa Santri Binaan Masjid', 'konten' => '<p>Draft artikel tentang program beasiswa yang sedang disusun, belum final dan belum siap dipublikasikan.</p>', 'published_at' => null],
        ];

        foreach ($articles as $article) {
            Article::create([
                'judul' => $article['judul'],
                'slug' => Str::slug($article['judul']),
                'konten' => $article['konten'],
                'published_at' => $article['published_at'],
            ]);
        }
    }
}
