<?php

// Abstract class
abstract class Kendaraan {
    protected $nama;
    public function __construct($nama) {
        $this->nama = $nama;
    }
    // Abstract method (harus diimplementasikan oleh subclass)
    abstract public function suara();
    public function getNama() {
        return $this->nama;
    }
}
    // Subclass Mobil
class Mobil extends Kendaraan {
    public function suara() {
        return "Broom Broom Stuu Stuu Stuu!";
    }
    }
    // Subclass Motor
    class Motor extends Kendaraan {
    public function suara() {
        return "Vroom Vroom!";
    }
}
// Implementasi Polymorphism
$mobil = new Mobil("Toyota Alphard");
$motor = new Motor("Yamaha Mio");
echo $mobil->getNama() . " berbunyi: " . $mobil->suara() . "\n";
echo $motor->getNama() . " berbunyi: " . $motor->suara();

?>