<?php

// Interface pertama: Mesin
interface Mesin {
    public function nyalakanMesin();
    public function matikanMesin();
    }
    // Interface kedua: Transportasi
    interface Transportasi {
    public function jalankan();
    public function berhenti();
    }
// Kelas Mobil mengimplementasikan dua interface
class Mobil implements Mesin, Transportasi {
    public function nyalakanMesin() {
    echo "Mesin mobil dinyalakan.\n";
    }
    public function matikanMesin() {
    echo "Mesin mobil dimatikan.\n";
    }
    public function jalankan() {
    echo "Mobil mulai berjalan.\n";
    }
    public function berhenti() {
    echo "Mobil berhenti.\n";
    }
    }
    // Kelas Motor mengimplementasikan dua interface
    class Motor implements Mesin, Transportasi {
    public function nyalakanMesin() {
    echo "Mesin motor dinyalakan.\n";
    }
    public function matikanMesin() {
    echo "Mesin motor dimatikan.\n";
    }
    public function jalankan() {
    echo "Motor mulai berjalan.\n";
    }
    public function berhenti() {
    echo "Motor berhenti.\n";
    }
    }
    // Membuat objek Mobil
    $mobil = new Mobil();
    $mobil->nyalakanMesin();
    $mobil->jalankan();
    $mobil->berhenti();
    $mobil->matikanMesin();
    // Membuat objek Motor
    $motor = new Motor();
    $motor->nyalakanMesin();
    $motor->jalankan();
    $motor->berhenti();
    $motor->matikanMesin();
?>