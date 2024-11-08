<?php

namespace App\Enums;

enum Kategori: string
{
    case Transportasi = 'transportasi';
    case Akomodasi = 'akomodasi';
    case Makan = 'makan';
    case PeralatanKantor = 'peralatan_kantor';
    case InternetDanKomunikasi = 'internet_komunikasi';
    case BiayaMedis = 'biaya_medis';
    case PelatihanSeminar = 'pelatihan_seminar';
    case HiburanKlien = 'hiburan_klien';
    case PengirimanLogistik = 'pengiriman_logistik';
    case LainLain = 'lain_lain';
}
