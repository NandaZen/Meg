<?php

class Kendaraan {

    protected $merk; 
    protected $harga;
    protected $warna;

    public function SetMerk($merk){
        $this->merk = $merk;
    }

    public function SetHarga($harga) {
        $this->harga = $harga;
    }

    public function SetWarna($warna){
        $this->warna = $warna;
    }

    public function getMerk(){
        return $this->merk;
    }

    public function getHarga() {
        return $this->harga;
    }

    public function getWarna()  {
        return $this->warna;
    }

}

// Kelas Kereta yang mewarisi Kendaraan
class Kereta extends Kendaraan{
    private $jmlGerbong;
    
    public function setJmlGerbong($jmlGerbong) {
        $this->jmlGerbong = $jmlGerbong;
    }

    // Getter

    public function getJmlGerbong() {
        return $this->jmlGerbong;
    }
}
// Kelas Mobil yang mewarisi Kendaraan
class Mobil extends Kendaraan {
    private $merk_ban;

    // Setter
    public function setMerkBan($merk_ban) {
        $this->merk_ban = $merk_ban;
    }

    // Getter
    public function getMerkBan()   {
        return $this->merk_ban;
    }
}

// Membuat objek dari kelas Kendaraan
$kendaraan = new Kendaraan();
$kendaraan->setMerk("Motor");
$kendaraan->setHarga(20000000);
$kendaraan->setWarna("Merah");
echo "================================== \n";
echo "Ini adalah Nilai Dari Kelas Kendaraan \n";
echo "Merk = " . $kendaraan->getMerk() . " \n";
echo "Harga = " . $kendaraan->getHarga() . " \n";
echo "Warna = " . $kendaraan->getWarna() . " \n";
// Membuat objek dari kelas Kereta
$kereta = new Kereta();
$kereta->setMerk("KAI");
$kereta->setJmlGerbong(15);
$kereta->setWarna("Merah Putih");
echo "================================== \n";
echo "Ini adalah Nilai Dari Kelas Kereta \n";
echo "Merk = " . $kereta->getMerk() . " \n";
echo "Jumlah Gerbong = " . $kereta->getJmlGerbong() . " \n";
echo "Warna = " . $kereta->getWarna() . " \n";
// Membuat objek dari kelas Mobil
$mobil = new Mobil();
$mobil->setMerk("Innova");
$mobil->setHarga(1600000000);
$mobil->setWarna("Hitam");
$mobil->setMerkBan("Michelin");
echo "================================== \n";
echo "Ini adalah Nilai Dari Kelas Mobil \n";
echo "Merk = " . $mobil->getMerk() . " \n";
echo "Harga = " . $mobil->getHarga() . " \n";
echo "Warna = " . $mobil->getWarna() . " \n";
echo "Merk Ban = " . $mobil->getMerkBan() . " \n";

?>