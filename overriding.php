<?php

class Hewan {
    protected $nama_panggilan;

    public function __construct( $nama_panggilan ) {
        $this->nama_panggilan = $nama_panggilan;
    }

    public function bersuara() : void {

        echo $this->nama_panggilan. ", Hewan bersuara \n";
    }
}

class Kucing extends Hewan {
    public function bersuara () : void {
    echo $this->nama_panggilan . " si kucing, bersuara Meow Meow Meow
    \n";
    }
    }
    // Membuat objek Hewan
    $ikan_wader = new Hewan("Wader");
    $ikan_wader->bersuara();
    // Membuat objek Kucing
    $kucing_anggora = new Kucing("Tama");
    $kucing_anggora->bersuara();

?>