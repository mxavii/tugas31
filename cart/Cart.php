<?php

namespace App;

class Cart
{
    private $harga;

    public function __construct($nama)
    {
        echo "Selamat datang $nama. \n";
    }

    private function harga($barang, $jumlah)
    {
        if ($barang == 'sarung') {
          $harga = 85000;
          $this->keterangan($barang, $jumlah, $harga);
        }
        elseif ($barang == 'kopiah') {
          $harga = 35000;
          $this->keterangan($barang, $jumlah, $harga);
        }
        else {
          echo "Mohon maaf, untuk saat ini $barang belum tersedia di toko kami. \n";
          $harga = 0;
          exit();
        }

        $total = $harga * $jumlah;
        return $total;
    }

    private function keterangan($barang, $jumlah, $harga)
    {
        $this->total = $harga * $jumlah;
        echo "Anda akan membeli $barang dengan harga Rp $harga/pcs sejumlah $jumlah pcs,\n";
        sleep(2);
        echo "dengan total harga Rp $this->total. \n\n";
        sleep(2);
    }

    public function beli($barang, $jumlah)
    {
        $this->harga($barang, $jumlah);
        $this->barang = $barang;
        $this->jumlah = $jumlah;
    }

    public function update($barang2, $jumlah2)
    {
        if ($this->barang == $barang2 &&  $this->jumlah != $jumlah2) {
            echo "Anda telah mengubah jumlah pesanan $this->barang dari $this->jumlah pcs menjadi $jumlah2 pcs.\n\n";
        }
        elseif ($this->barang != $barang2 &&  $this->jumlah == $jumlah2) {
            echo "Anda telah mengubah pesanan $this->barang menjadi $barang2 sejumlah $jumlah2 pcs.\n\n";
        }
        elseif (($this->barang != $barang2 &&  $this->jumlah != $jumlah2)) {
          echo "Anda telah mengubah pesanan $this->barang menjadi $barang2 sejumlah $jumlah2 pcs.\n\n";
        }
        sleep(2);
        $this->harga($barang2, $jumlah2);
    }

    public function bayar($bayar)
    {
      if ($bayar >= $this->total) {
        $sisa = $bayar - $this->total;
        echo "Anda telah membayar sejumlah Rp $bayar,- \n";
        sleep(2);
        echo "Total tagihan anda           Rp $this->total,- \n";
        sleep(2);
        echo "Sisa uang kembalian anda     Rp $sisa,- \n\n";
        sleep(2);
        echo "Terima kasih anda telah berbelanja di toko kami,\nselamat berbelanja kembali.\n";
      }
      else {
        $kurang = $this->total - $bayar;
        echo "Jumlah uang anda Rp $bayar. \n";
        sleep(2);
        echo "Mohon maaf,uang anda masih kurang Rp $kurang \ndari total yang harus dibayar Rp $this->total. \n";
      }
    }
}
