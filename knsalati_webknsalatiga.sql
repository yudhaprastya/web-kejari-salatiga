-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2025 at 03:16 AM
-- Server version: 10.4.32-MariaDB-log
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knsalati_webknsalatiga`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(5) UNSIGNED NOT NULL,
  `user_id` int(5) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `views` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `user_id`, `judul`, `isi`, `gambar`, `tanggal`, `views`, `created_at`) VALUES
(4, 1, 'test tambah update', '<p>test tambah updated</p>', '1750486034_033ab68249a6e4e32309.png', '2025-06-10 00:00:00', 2, '2025-06-13 00:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `slug` text NOT NULL,
  `tugas` text NOT NULL,
  `fungsi` text NOT NULL,
  `nama_kepala` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `struktural` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `nama`, `slug`, `tugas`, `fungsi`, `nama_kepala`, `image`, `struktural`) VALUES
(2, 'Pembinaan', 'pembinaan', 'Pembinaan mempunyai tugas melakukan perencanaan program kerja dan anggaran, pengelolaan ketatausahaan kepegawaian, kesejahteraan pegawai, keuangan, perlengkapan, organisasi dan tatalaksana, pengelolaan teknis atas barang milik negara, pengelolaan data dan statistik kriminal, pelaksanaan evaluasi dan penguatan program reformasi birokrasi serta pemberian dukungan pelayanan teknis dan administrasi bagi seluruh satuan kerja diLingkungan Kejaksaan Negeri yang bersangkutan dalam rangka memperlancar pelaksanaan tugas.', 'melakukan koordinasi, integrasi dan sinkronisasi serta membina kerjasama seluruh satuan kerja di Lingkungan Kejaksaan Negeri di bidang administrasi;melakukan pembinaan organisasi dan tatalaksana urusan ketatausahaan dan mengelola keuangan, kepegawaian, perlengkapan dan milik negara yang menjadi tanggung jawabnya;melakukan pembinaan dan peningkatan kemampuan, keterampilan dan integritas kepribadian aparat Kejaksaan di daerah hukumnya;melaksanakan pengelolaan data dan statistik kriminal serta penerapan dan pengembangan teknologi informasi di Lingkungan Kejaksaan Negeri; pelaksanaan program reformasi birokrasi.', 'RAMLAH HASYIM PAREMA, S.H.', 'kasubagbin.png', 'Urusan Tata Usaha, Kepegawaian, Keuangan dan Penerimaan Negara Bukan Pajak: mempunyai tugas melakukan urusan ketatausahaan, kepegawaian, peningkatan integritas dan kepribadian serta kesejahteraan pegawai, melakukan urusan keuangan dan pengelolaan Penerimaan Negara Bukan Pajak;Urusan Perlengkapan, Data Statistik Kriminal dan Teknologi Informasi dan Perpustakaan</strong>: mempunyai tugas melakukan urusan perlengkapan dan kerumahtanggaan, serta melakukan urusan pengelolaan data statistik kriminal, penerapan dan pengembangan teknologi informasi, perpustakaan, dokumentasi hukum'),
(3, 'Intelijen', 'intel', 'Intelijen mempunyai tugas melaksanakan penyiapan, perumusan rencana dan program kerja serta laporan pelaksanaannya, perencanaan, pengkajian, pelaksanaan, pengadministrasian, pengendalian, penilaian dan pelaporan kebijakan teknis, kegiatan intelijen, operasi intelijen, pengawalan dan pengamanan pemerintahan dan pembangunan, administrasi intelijen, dan pemberian dukungan teknis secara intelijen kepada bidang lain, perencanaan, pelaksanaan, dan pelaporan pemetaan, perencanaan, pengelolaan dan pelaporan teknologi informasi, perencanaan, pelaksanaan, pengadministrasian, dan pelaporan kegiatan bidang penerangan hukum, penyusunan, penyajian, pengadministrasian, pendistribusian, dan pengarsipan laporan berkala, laporan insidentil, perkiraan keadaan intelijen, hasil pelaksanaan rencana kerja dan program kerja, kegiatan intelijen dan operasi intelijen, pengawalan dan pengamanan pemerintahan dan pembangunan proyek yang bersifat strategis, perencanaan, pengelolaan, dan pelaporan bank data intelijen dan pengamanan informasi, pengendalian penyelenggaraan administrasi intelijen, pemeliharaan perangkat intelijen, perencanaan, dan pelaksanaan koordinasi dan/atau kerja sama dengan pemerintah daerah, Badan Usaha Milik Daerah, instansi, dan organisasi, pemberian bimbingan dan pembinaan teknis intelijen dan administrasi intelijen, dan penyiapan bahan evaluasi kinerja fungsional Sandiman yang berkaitan dengan bidang ideologi, politik, pertahanan, keamanan, sosial, budaya, kemasyarakatan, ekonomi, keuangan, pengamanan pembangunan strategis, teknologi intelijen, produksi intelijen, dan penerangan hukum.', 'Penyiapan bahan perumusan rencana dan program kerja serta laporan pelaksanaannya;Perencanaan, pengkajian, pelaksanaan, pengadministrasian, pengendalian, penilaian dan pelaporan pelaksanaan kebijakan teknis, kegiatan intelijen, operasi intelijen, administrasi intelijen, pengawalan dan pengamanan pemerintahan dan pembangunan proyek yang bersifat strategis baik nasional maupun daerah di daerah hukumnya serta penerangan hukum guna menghasilkan data dan informasi sebagai bahan masukan bagi pimpinan untukperumusan kebijakan dan pengambilan keputusan;Pengendalian dan penilaian terhadap pelaksanaan kebijakan teknis, kegiatan intelijen, operasi intelijen, administrasi intelijen, pengawalan dan pengamanan pemerintahan dan pembangunan proyek yang bersifat strategis baik nasional maupun daerah, serta penerangan hukum yang dilaksanakan oleh Cabang Kejaksaan Negeri di daerah hukumnya;Perencanaan dan pelaksanaan pemetaan potensi ancaman, gangguan, hambatan dan tantangan di bidang ideologi, politik dan pertahanan keamanan, sosial, budaya dan kemasyarakatan, ekonomi dan keuangan serta pengamanan pembangunan strategis berdasarkan data dan informasi yang berasal dari satuan kerja di Lingkungan Kejaksaan Negeri dan Cabang Kejaksaan Negeri di daerah hukumnya;Perencanaan, pelaksanaan, pengadministrasian, pengendalian dan pelaporan pemberian dukungan teknis secara intelijen kepada bidang lain di daerah hukumnya berdasarkan prinsip koordinasi;Penyusunan, penyajian dan pendistribusian serta pengarsipan laporan berkala dan laporan insidentil;Penyusunan, penyajian dan pendistribusian perkiraan keadaan intelijen di bidang ideologi, politik dan pertahanan keamanan, sosial, budaya dan kemasyarakatan, ekonomi dan keuangan, serta pengamanan pembangunan strategis;Pengadministrasian, pendistribusian dan pengarsipan produk intelijen baik yang berasal dari satuan kerja di Lingkungan Kejaksaan Negeri maupun Cabang Kejaksaan Negeri di daerah hukumnya;Penyiapan bahan evaluasi dan pelaporan serta pendistribusian hasil pelaksanaan rencana kerja dan program kerja, kegiatan intelijen dan operasi intelijen serta administrasi intelijen baik yang dilaksanakan oleh satuan kerja di Lingkungan Kejaksaan Negeri maupun Cabang Kejaksaan Negeri di daerah hukumnya;Pengelolaan bank data intelijen dan pengendalian penyelenggaraan administrasi intelijen baik yang dilaksanakan oleh satuan kerja di Lingkungan Kejaksaan Negeri maupun Cabang Kejaksaan Negeri;Penyiapan bahan analisa kebutuhan pengembangan sumber daya manusia intelijen dan teknologi intelijen;Perencanaan dan pelaksanaan koordinasi dan/atau kerja sama dengan pemerintah daerah, Badan Usaha Milik Daerah, instansi, dan organisasi lainnya;Pemberian bimbingan dan pembinaan teknis intelijen dan administrasi intelijen kepada Cabang Kejaksaan Negeri didaerah hukumnya;Perencanaan, pengelolaan, dan pemeliharaan peralatan intelijen;Penyiapan bahan evaluasi dan penilaian terhadap kinerja fungsional sandiman.', 'ERWIN RIONALDY KOLOWAY, S.H., M.H.', 'kasi_intel.png', 'Subseksi Ideologi, Politik, Pertahanan Keamanan, Sosial, Budaya, Kemasyarakatan, dan Teknologi Informasi: mempunyai tugas melakukan penyiapan bahan penyusunan rencana dan program kerja serta laporan pelaksanaannya, perencanaan, pengkajian, pelaksanaan, pengadministrasian, pengendalian, penilaian dan pelaporan kebijakan teknis, kegiatan intelijen, operasi intelijen, administrasi intelijen, dan pemberian dukungan teknis secara intelijen kepada bidang lain, perencanaan, pelaksanaan, dan pelaporan pemetaan, penyusunan, penyajian, pengadministrasian, pendistribusian, dan pengarsipan laporan berkala, laporan insidentil, perkiraan keadaan intelijen, hasil pelaksanaan rencana kerja dan program kerja, kegiatan intelijen dan operasi intelijen, pengendalian penyelenggaraan administrasi intelijen, pengawalan dan pengamanan pemerintahan dan pembangunan proyek yang bersifat strategis, perencanaan, pelaksanaan, dan pelaporan pemetaan, perencanaan, pengelolaan dan pelaporan teknologi informasi, perencanaan, pengelolaan, dan pelaporan bank data intelijen dan pengamanan informasi, pemeliharaan perangkat intelijen, perencanaan, pelaksanaan, pengadministrasian, dan pelaporan kegiatan bidang penerangan hukum, perencanaan, dan pelaksanaan koordinasi dan/atau kerja sama dengan pemerintah daerah, Badan Usaha Milik Daerah, instansi, dan organisasi, pemberian bimbingan dan pembinaan teknis intelijen dan administrasi intelijen yang berkaitan dengan bidang ideologi, politik, pertahanan, keamanan, sosial, budaya dan kemasyarakatan, serta penyiapan bahan evaluasi kinerja fungsional Sandiman;Subseksi Ekonomi, Keuangan, dan Pengamanan Pembangunan Strategis</strong>: mempunyai tugas melakukan penyiapan bahan penyusunan rencana dan program kerja serta laporan pelaksanaannya, perencanaan, pengkajian, pelaksanaan, pengadministrasian, pengendalian, penilaian dan pelaporan kebijakan teknis, kegiatan intelijen, operasi intelijen, pengawalan dan pengamanan pemerintahan dan pembangunan, administrasi intelijen, dan pemberian dukungan teknis secara intelijen kepada bidang lain, perencanaan, pelaksanaan, dan pelaporan pemetaan, penyusunan, penyajian, pengadministrasian, pendistribusian, dan pengarsipan laporan berkala, laporan insidentil, perkiraan keadaan intelijen, hasil pelaksanaan rencana kerja dan program kerja, kegiatan intelijen dan operasi intelijen, pengawalan dan pengamanan pemerintahan dan pembangunan proyek yang bersifat strategis, pengendalian penyelenggaraan administrasi intelijen, perencanaan, dan pelaksanaan koordinasi dan/atau kerja sama dengan pemerintah daerah, Badan Usaha Milik Daerah, instansi, dan organisasi, pemberian bimbingan dan pembinaan teknis intelijen dan administrasi intelijen yang berkaitan dengan bidang ekonomi, keuangan, dan pengamanan pembangunan strategis.'),
(4, 'Tindak Pidana Umum', 'pidum', 'Seksi Tindak Pidana Umum mempunyai tugas melaksanakan dan mengendalikan penanganan perkara tindak pidana umum yang meliputi prapenuntutan, pemeriksaan tambahan, penuntutan, penetapan hakim dan putusan pengadilan, pengawasan terhadap pelaksanaan pidana bersyarat, pidana pengawasan, pengawasan terhadap pelaksanaan putusan lepas bersyarat dan tindakan hukum lainnya.', 'Penyiapan bahan penyusunan rencana dan program kerja;Analisis dan penyiapan pertimbangan hukum penanganan perkara tindak pidana umum;Pelaksanaan dan pengendalian penanganan perkara tahap prapenuntutan, pemeriksaan tambahan, penuntutan, pelaksanaan penetapan hakim dan putusan pengadilan yang telah mempunyai kekuatan hukum tetap, eksaminasi serta pengawasan terhadap pelaksanaan pidana bersyarat, pidana pengawasan, pengawasan terhadap pelaksanaan keputusan pembebasan bersyarat dan kebijakan dan serta tindakan hukum lainnya;Penyiapan pelaksanaan koordinasi dan kerja sama dalam penanganan perkara tindak pidana umum;Pengelolaan dan penyajian data dan informasi;Penyiapan pelaksanaan bimbingan teknis penanganan perkara tindak pidana umum di daerah hukumnya;Pelaksanaan pemantauan, evaluasi dan penyusunan laporan penanganan perkara tindak pidana umum.', 'ARDHANA RISWATI P, S.H., M.H.', 'kasi_pidum.png', 'Subseksi Prapenuntutan: mempunyai tugas melakukan penyiapan bahan penyusunan rencana dan program kerja, analisis dan pemberian pertimbangan hukum, pelaksanaan penanganan perkara, koordinasi dan kerja sama, pengelolaan, penyajian data dan informasi, pemberian bimbingan teknis, pemantauan, evaluasi, dan penyusunan laporan penanganan perkara tindak pidana terhadap orang dan harta benda pada tahap prapenuntutan;Subseksi Penuntutan, Eksekusi, dan Eksaminasi</strong>: mempunyai tugas melakukan penyiapan bahan penyusunan rencana dan program kerja, analisis dan pemberian pertimbangan hukum, pelaksanaan penanganan perkara, koordinasi dan kerja sama, pengelolaan, penyajian data dan informasi, pemberian bimbingan teknis, pemantauan, evaluasi, dan penyusunan laporan penanganan perkara tindak pidana terhadap orang dan harta benda pada tahap penuntutan serta melakukan penyiapan bahan penyusunan rencana dan program kerja, analisis dan pemberian pertimbangan hukum, koordinasi dan kerja sama, pengelolaan, penyajian data dan informasi, pemberian bimbingan teknis, pemantauan, evaluasi, dan penyusunan laporan penanganan perkara tindak pidana terhadap orang dan harta benda tahap eksekusi dan eksaminasi.'),
(5, 'Tindak Pidana Khusus', 'pidsus', 'Seksi Tindak Pidana Lhusus mempunyai tugas melakukan pengelolaan laporan dan pengaduan masyarakat, penyelidikan, penyidikan, pelacakan aset dan pengelolaan barang bukti, prapenuntutan, pemeriksaan tambahan, praperadilan, penuntutan dan persidangan, perlawanan, upaya hukum, pelaksanaan penetapan hakim dan putusan pengadilan yang telah mempunyai kekuatan hukum tetap, pengawasan terhadap pelaksanaan pemidanaan bersyarat, putusan pidana pengawasan, keputusan lepas bersyarat, dan eksaminasi dalam penanganan perkara tindak pidana khusus di wilayah hukum Kejaksaan Negeri.', 'Penyiapan bahan penyusunan rencana dan program kerja;Pelaksanaan penegakan hukum di bidang tindak pidana khusus di Kejaksaan Negeri;Koordinasi dan sinkronisasi pelaksanaan kebijakan di bidang tindak pidana khusus di Kejaksaan Negeri;Pelaksanaan hubungan kerja dengan instansi atau lembaga baik di dalam negeri maupun di luar negeri di Kejaksaan Negeri;Pemantauan, analisis, evaluasi dan pelaporan pelaksanaan kegiatan di bidang tindak pidana khusus di Kejaksaan Negeri.', 'DIMAZ ATMADI BRATA A, S.H., M.H.', 'kasi_pidsus.png', 'Subseksi Penyidikan: melakukan penyiapan bahan penyusunan program dan rencana kerja, penyiapan bahan perumusan kebijakan teknis dan administrasi, penyiapan pelaksanaan dan pengendalian, pemberian bimbingan teknis, penyampaian pertimbangan, pendapat dan saran, koordinasi dan kerja sama, pengelolaan data dan penyajian informasi, pemantauan dan evaluasi serta penyusunan laporan dalam rangka pengelolaan laporan dan pengaduan masyarakat, penyelidikan dan penyidikan serta pelacakan aset dan pengelolaan barang bukti perkara tindak pidana korupsi dan tindak pidana pencucian uang di wilayah hukum Kejaksaan Negeri.;Subseksi Penuntutan, Upaya Hukum Luar Biasa dan Eksekusi</strong>: melakukan penyiapan bahan penyusunan program dan rencana kerja, penyiapan bahan perumusan kebijakan teknis dan administrasi, penyiapan pelaksanaan dan pengendalian, pemberian bimbingan teknis, penyampaian pertimbangan, pendapat dan saran, koordinasi dan kerja sama, pengelolaan data dan penyajian informasi, pemantauan dan evaluasi serta penyusunan laporan pelaksanaan tindakan prapenuntutan, pemeriksaan tambahan, praperadilan, penuntutan dan persidangan, perlawanan, pelaksanaan penetapan hakim, upaya hukum biasa, pelaksanaan putusan pengadilan yang telah mempunyai kekuatan hukum tetap, pengawasan terhadap pelaksanaan pidana bersyarat, putusan pidana pengawasan dan lepas bersyarat, upaya hukum luar biasa, permohonan grasi, amnesti dan abolisi dalam penanganan perkara tindak pidana korupsi dan tindak pidana pencucian uang, tindak pidana perpajakan dan tindak pidana pencucian uang, serta tindak pidana kepabeanan, cukai, dan tindak pidana pencucian uang di wilayah hukum Kejaksaan Negeri.'),
(6, 'Perdata & Tata Usaha Negara', 'datun', 'Seksi Perdata & Tata Usaha Negara mempunyai tugas melakukan pemantauan, analisis, evaluasi, dan pelaporan di bidang perdata dan tata usaha negara.', 'Penyiapan bahan penyusunan rencana dan program kerja;Pelaksanaan penegakan hukum, bantuan hukum, pertimbangan hukum, dan tindakan hukum lain, serta pelayanan hukum di bidang perdata dan tata usaha negara;Koordinasi dan sinkronisasi pelaksanaan kebijakan di bidang perdata dan tata usaha negara;Pelaksanaan hubungan kerja dengan instansi atau lembaga baik di dalam negeri maupun di luar negeri;Pemantauan, analisis, evaluasi, dan pelaporan pelaksanaan penegakan hukum, bantuan hukum, pertimbangan hukum, dan tindakan hukum lain, serta pelayanan hukum di bidang perdata dan tata usaha negara.', 'NANA ROSITA SARI, S.H., M.H.', 'kasi_datun.png', 'Subseksi Perdata dan Tata Usaha Negara: mempunyai tugas melakukan pemberian bantuan hukum di bidang perdata dan forum arbitrase, penegakan hukum, dan pemberian jasa hukum di bidang tata usaha negara.;Subseksi Pertimbangan Hukum: mempunyai tugas melakukan pemberian pertimbangan hukum, tindakan hukum lain, dan pelayanan hukum di bidang perdata.'),
(7, 'Pengelolaan Barang Bukti & Barang Rampasan', 'pb3r', 'Seksi Pengelolaan Barang Bukti & Barang Rampasan mempunyai tugas melakukan pengelolaan barang bukti dan barang rampasan yang berasal dari tindak pidana umum dan pidana khusus.', 'Penyiapan bahan penyusunan rencana dan program kerja;Analisis dan penyiapan pertimbangan hukum pengelolaan barang bukti dan barang rampasan;Pengelolaan barang bukti dan barang rampasan meliputi pencatatan, penelitian barang bukti, penyimpanan dan pengklasifikasian barang bukti, penitipan, pemeliharaan, pengamanan, penyediaan dan pengembalian barang bukti sebelum dan setelah sidang serta penyelesaian barang rampasan;Penyiapan pelaksanaan koordinasi dan kerja sama dalam pengelolaan barang buki dan barang rampasan;Pengelolaan dan penyajian data dan informasi;Pelaksanaan pemantauan, evaluasi dan penyusunan laporan pengelolaan barang bukti dan barang rampasan.', 'IMAM RAHMAT SAPUTRA, S.H. M.H.', 'kasi_bb.png', '-'),
(8, 'Kajari', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id` int(5) UNSIGNED NOT NULL,
  `layanan_id` int(5) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `nama_petugas` varchar(100) NOT NULL,
  `tipe_identitas` varchar(15) NOT NULL,
  `nomor_identitas` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(25) DEFAULT NULL,
  `plat_kendaraan` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto_diri` varchar(255) DEFAULT NULL,
  `foto_identitas` varchar(255) DEFAULT NULL,
  `nomor` int(5) NOT NULL,
  `status` enum('waiting','called','done') NOT NULL DEFAULT 'waiting',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id`, `layanan_id`, `tanggal`, `nama_petugas`, `tipe_identitas`, `nomor_identitas`, `nama`, `no_hp`, `plat_kendaraan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `foto_diri`, `foto_identitas`, `nomor`, `status`, `created_at`) VALUES
(2, 1, '2025-07-15', 'Test petugas', 'ktp', '327071908990061', 'Yudha', '08215271', 'G 2839 JI', 'L', 'Ternate', '1999-08-19', 'Salatiga', '', '1752541548_5472b2a7f7ee5f872db8.jpg', 0, 'done', '2025-07-15 08:05:48'),
(3, 2, '2025-08-13', 'test', 'ktp', '33239221343', 'test', '08239823932', '', 'L', 'jeijierjr', '2025-08-14', '', '6099_tamu_2025-08-13_2.jpg', NULL, 1, 'done', '2025-08-13 04:52:35'),
(4, 1, '2025-08-13', 'test', 'ktp', '002323231212', 'mkewmkedm', '', '', 'L', 'ternate', '2025-08-13', '', '6142_tamu_2025-08-13_1.jpg', NULL, 2, 'done', '2025-08-13 04:54:16'),
(5, 1, '2025-08-13', 'hgygyu', 'ktp', '88768665865', 'biyhgbiyg', '', '', 'L', '', '0000-00-00', '', '7427_tamu_2025-08-13_1.jpg', NULL, 3, 'called', '2025-08-13 08:00:35'),
(6, 1, '2025-08-14', 'behbwhefe', 'ktp', '271722912812812', 'wehkbhew', '', '', 'L', '271722912812812', '0000-00-00', '', '', NULL, 2, 'waiting', '2025-08-14 08:20:55'),
(7, 1, '2025-08-15', 'fwnjnfjene', 'ktp', '23311413414', 'wnejfnje', '', '', 'L', '', '0000-00-00', '', '', NULL, 1, 'done', '2025-08-15 07:31:34'),
(8, 1, '2025-08-15', 'jwijeiwew', 'ktp', '1231231', 'wenjdewjnje', '', '', 'L', '', '0000-00-00', '', '', NULL, 2, 'done', '2025-08-15 07:38:51'),
(9, 1, '2025-08-15', 'nneidenje', 'ktp', '9939101901921', 'dlwnjedwe', '', '', 'L', '', '0000-00-00', '', '', NULL, 3, 'called', '2025-08-15 07:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sidang`
--

CREATE TABLE `jadwal_sidang` (
  `id` int(5) UNSIGNED NOT NULL,
  `terdakwa` text NOT NULL,
  `no_perkara` varchar(100) NOT NULL,
  `agenda` text NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `kategori` enum('pidum','pidsus') NOT NULL DEFAULT 'pidum',
  `tanggal` date NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_sidang`
--

INSERT INTO `jadwal_sidang` (`id`, `terdakwa`, `no_perkara`, `agenda`, `tempat`, `kategori`, `tanggal`, `created_at`) VALUES
(1, 'AYU ARISTA ZAHARA Binti AGUS BUDI SANTOSO', '6/Pid.Sus/2024/PN Slt', 'tuntutan pu', 'PN Salatiga', 'pidsus', '2024-04-02', '2025-06-21 20:00:47'),
(5, 'jirrjwif', 'fneifje', 'uhruehfu', 'fouewrhuo', 'pidum', '2025-06-30', '2025-06-29 16:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `jaksa`
--

CREATE TABLE `jaksa` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jaksa`
--

INSERT INTO `jaksa` (`id`, `nama`, `nip`, `status`, `created_at`) VALUES
(1, 'SUTAN TAKDIR, S.H.', '678690', 0, '2025-06-22 15:13:53'),
(2, 'FAISAL ARIF, S.H., M.H.', '182031414', 1, '2025-06-22 15:13:53'),
(3, 'ANA TACHIA, S.H., M.Hum', '0', 1, '2025-06-25 23:34:47'),
(4, 'ASRI DWI UTAMI, S.H., M.H.', '0', 0, '2025-06-25 23:34:47'),
(5, 'M. BAYU AJI N, S.H.', '0', 0, '2025-06-25 23:35:38'),
(6, 'DIMAZ ATMADI B.A, S.H, M.H', '0', 1, '2025-06-25 23:35:38'),
(7, 'Test', '2182783071', 1, '2025-07-02 01:29:38'),
(8, 'ASRI DWI UTAMI, S.H., M.H.', '0', 1, '2025-07-02 09:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `jaksa_sidang`
--

CREATE TABLE `jaksa_sidang` (
  `id` int(5) UNSIGNED NOT NULL,
  `jaksa_id` int(5) NOT NULL,
  `jadwal_sidang_id` int(5) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jaksa_sidang`
--

INSERT INTO `jaksa_sidang` (`id`, `jaksa_id`, `jadwal_sidang_id`, `created_at`) VALUES
(1, 1, 1, '2025-06-26 00:01:35'),
(2, 2, 1, '2025-06-26 00:16:18'),
(10, 3, 5, '2025-06-29 17:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `nama`, `created_at`) VALUES
(1, 'PTSP', '2025-07-12 23:21:09'),
(2, 'Pengambilan Tilang', '2025-07-12 23:21:09'),
(3, 'Pengambilan/Pengantaran Barang Bukti Gratis', '2025-07-12 23:21:38'),
(4, 'Pelayanan Hukum Gratis', '2025-07-12 23:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `layanan_pengambilan_barang_bukti`
--

CREATE TABLE `layanan_pengambilan_barang_bukti` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_pemohon` varchar(255) NOT NULL,
  `nama_terpidana` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `tanda_pengenal` varchar(255) NOT NULL,
  `perkara` varchar(255) NOT NULL,
  `barang_bukti` varchar(255) NOT NULL,
  `surat_kuasa` varchar(255) NOT NULL,
  `bukti_kepemilikan` varchar(255) NOT NULL,
  `nomor_registrasi` varchar(30) NOT NULL,
  `status` enum('waiting','on_process','done') NOT NULL DEFAULT 'waiting',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-05-26-034213', 'App\\Database\\Migrations\\CreateBeritaTable', 'default', 'App', 1749452558, 1),
(2, '2025-05-26-034241', 'App\\Database\\Migrations\\CreateJadwalSidangTable', 'default', 'App', 1749452558, 1),
(3, '2025-05-26-034314', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1749452558, 1),
(4, '2025-05-26-034320', 'App\\Database\\Migrations\\CreateRolesTable', 'default', 'App', 1749452558, 1),
(5, '2025-05-26-034342', 'App\\Database\\Migrations\\CreateLayananPengambilanBarangBuktiTable', 'default', 'App', 1749452558, 1),
(7, '2025-06-22-075854', 'App\\Database\\Migrations\\CreateJaksaTable', 'default', 'App', 1750579239, 2),
(8, '2025-06-24-033727', 'App\\Database\\Migrations\\CreateJaksaSidangTable', 'default', 'App', 1750736469, 3),
(9, '2025-07-12-161150', 'App\\Database\\Migrations\\CreateLayananTable', 'default', 'App', 1752336924, 4),
(10, '2025-05-26-165406', 'App\\Database\\Migrations\\CreateBukuTamuTable', 'default', 'App', 1752513326, 5),
(11, '2025-07-17-041015', 'App\\Database\\Migrations\\CreatePelaporanTable', 'default', 'App', 1752726630, 6),
(12, '2025-07-17-155722', 'App\\Database\\Migrations\\CreateBidangTable', 'default', 'App', 1752768061, 7);

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `identitas` text NOT NULL,
  `kronologi` text NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `status` enum('pending','proses','selesai') NOT NULL DEFAULT 'pending',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `nama`, `email`, `nik`, `no_hp`, `alamat`, `identitas`, `kronologi`, `bukti`, `status`, `created_at`) VALUES
(1, 'edjfmjen', 'yudhamanage@gmail.com', '2320912901', '0823823023', 'njfnejfnewjnfjewrnf', '1754070169_7411fa49357f0db3bffa.png;', 'dendjnejnjedde', '1754070169_30e86755cc79c3d0e772.png', 'pending', '2025-08-02 00:42:49'),
(2, 'rbehrbejfn', 'yudhamanage@gmail.com', '93120901290', '0828398291', 'bkhrwhkfbwk', '1754070360_e6a2ab5966f7daaa3467.png;1754070360_af0bd93d1a517998107c.png;1754070360_5196c14dba31a136668f.png;', 'kronologinya gatau apa', '1754070360_d5d25e90b455ec7dba25.png', 'pending', '2025-08-02 00:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`) VALUES
(1, 'admin', '2025-06-14 01:34:33'),
(2, 'bin', '2025-06-14 01:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(5) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `role_id`, `created_at`) VALUES
(1, 'adminknsalatiga', 'Admin KN Salatiga', '$2y$10$XpBQ7FWJ3TabLrbuREKN5ulAXMphReXkqVqpxDwjpffyIjHuVOaZW', 1, '2025-06-12 02:05:34'),
(8, 'test', 'test', '$2y$10$NkER0pXoaBED4aLPlG9FnefgJjPb1PXwQGjCwGGcLIfFYatXhIwiG', 1, '2025-06-19 23:28:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jaksa`
--
ALTER TABLE `jaksa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jaksa_sidang`
--
ALTER TABLE `jaksa_sidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan_pengambilan_barang_bukti`
--
ALTER TABLE `layanan_pengambilan_barang_bukti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jaksa`
--
ALTER TABLE `jaksa`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jaksa_sidang`
--
ALTER TABLE `jaksa_sidang`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `layanan_pengambilan_barang_bukti`
--
ALTER TABLE `layanan_pengambilan_barang_bukti`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
