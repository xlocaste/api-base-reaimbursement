<?php

namespace App\Enums;

enum Kategori: string
{
    case Transportasi = 'Transportasi';
    case Akomodasi = 'Akomodasi';
    case Makan = 'Makan';
    case PeralatanKantor = 'Peralatan Kantor';
    case InternetDanKomunikasi = 'Internet Komunikasi';
    case BiayaMedis = 'Biaya Medis';
    case PelatihanSeminar = 'Pelatihan Seminar';
    case HiburanKlien = 'Hiburan Klien';
    case PengirimanLogistik = 'Pengiriman Logistik';
    case LainLain = 'Lain-lain';
}
