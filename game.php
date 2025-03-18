<?php

//interface untuk logging
interface Logger {
    public function log($message);
}

//trait untuk waktu saat ini
trait Timestamp {
    //getter
    public function getCurrentTime() {
        return date("Y-m-d H:i:s");
    }
}

//abstract class Megah
abstract class Megah {
    public static function run(){

    }
}

//class utama yang mewarisi Application dan menggunakan Logger
class Tes extends Megah implements Logger {
    use Timestamp;

    // konstruktor
    const VERSION = "1.0.0";

    //statik
    public static function run() {
        self::showBanner();
        $instance = new self();
        $instance->log(   " versi " . self::VERSION . " berjalan.");
        $instance->displayInfo();
    }

    //statik untuk menampilkan banner
    private static function showBanner() {
        $ascii = "

 ___    ___  _______   ________      _       ___    ___ 
|   \  /   ||  _____| /   _____|    / \     |   |  |   | 
|    \/    ||  |____ |   |  ___    / _ \    |   |__|   | 
|  |\_/|   ||  _____||   | |_  |  / /_\ \   |    __    | 
|  |   |   ||  |____ |   \__/  | /  ___  \  |   |  |   | 
|__|   |___||_______| \_______/ /__/   \__\ |___|  |___| 

";
        echo $ascii . PHP_EOL;
    }

    //metode untuk menampilkan 
    public function log($message) {
        echo "[" . $this->getCurrentTime() . "] LOG: " . $message . PHP_EOL;
    }

    private function displayInfo() {
        echo "============================================================================" . PHP_EOL;
        echo " 🎮Welcome! our precious Players!🎮\n ⚠️This game contain blood content, play wisely!⚠️ " . PHP_EOL;
        echo "============================================================================" . PHP_EOL;
        echo " Versi: " . self::VERSION . PHP_EOL;
        echo " Dibuat oleh: Megahnanda Sucimuliani Pasolo" . PHP_EOL;
        echo "============================================================================" . PHP_EOL;

        $this->main();
    }

    private function main(){
    
        //loop utama untuk memilih Character
        do {
            //memilih Character
            echo "\nPilih Karakter:\n";
            echo "1. Warrior (Hp 90, Attack: 25)\n";
            echo "2. Mage (HP: 150, Attack: 20)\n";
            echo "3. Rogue (HP: 110, Attack: 23)\n";
            //menampilkan opsi pilihan
            echo "Masukkan pilihan (1/2/3): ";
            //menerima inputan dari pemain
            $choice = trim(fgets(STDIN));
    
        //menyesuaikan opsi pilihan pengguna
        switch ($choice) {
            case '1':
                $player = new Character("Warrior", 90, 25);
                break;
            case '2':
                $player = new Character("Mage", 150, 20);
                break;
            case '3':
                $player = new Character("Rogue", 110, 23);
                break;
            //jika pengguna memilih pilihan yg tidak sesuai dengan opsi
            default:
                echo "Pilihan tidak valid! Keluar dari game.\n";
                exit();
        }
    
        //memberikan deskripsi pilihan pengguna
        echo "Kamu memilih: {$player->name} (HP: {$player->hp}, Attack: {$player->attack})\n\n";
    
        //loop untuk menjalankan permainan
        while ($player->hp > 0) {
            //array Monster yang akan muncul dalam peramainan
            $monsters = [
                new Monster("Goblin", 50, 10),
                new Monster("Orc", 70, 12),
                new Monster("Dragon", 100, 15)
            ];
            
            //menampilkan Monster yg akan muncul secara acak
            $monster = $monsters[array_rand($monsters)];
            echo "Monster muncul! {$monster->name} (HP: {$monster->hp}, Attack: {$monster->attack})\n";
            
            //loop permainan
            while ($monster->hp > 0 && $player->hp > 0) {
                echo "Serang monster? (y/n): ";
                $input = trim(fgets(STDIN));
                
                //jika pengguna memilih untuk melawan
                if ($input == 'y') {
                    $player->attack($monster);
                    
                    //memberikan keterangan berapa banyak hp Monster & Character setelah diserang
                    if ($monster->hp > 0) {
                        $monster->attack($player);
                        echo "HP kamu tersisa: {$player->hp}\n";
                    
                    //jika pengguna berhasil melawan Monster hingga hp Monster 0
                    } else {
                        echo "Kamu menang melawan {$monster->name}!\n";
                        $player->exp += 20;
                        $player->gold += 10;
                        echo "EXP: {$player->exp}, Gold: {$player->gold}\n\n";
                        
                        //mekanisme bonus HP dan harta karun
                        if (rand(1, 100) <= 60) { // 60% kemungkinan mendapatkan buah penyembuh
                            $hpBoost = rand(20, 40);
                            $player->hp += $hpBoost;
                            echo "Kamu menemukan buah penyembuh! HP bertambah {$hpBoost}. HP sekarang: {$player->hp}\n";
                        }
                        
                        //
                        if (rand(1, 100) <= 50) { // 50% kemungkinan mendapatkan harta karun
                            $goldBonus = rand(10, 50);
                            $expBonus = rand(10, 30);
                            $player->gold += $goldBonus;
                            $player->exp += $expBonus;
                            echo "Kamu menemukan harta karun! Gold +{$goldBonus}, EXP +{$expBonus}\n";
                        }
                    }
                } else {
                    echo "Kamu melarikan diri!\n";
                    break;
                }
            }
            
            if ($player->hp <= 0) {
                echo "HP kamu habis!\n";
                break;
            }
        }
    
        echo "Total Gold: {$player->gold}\n";
        echo "Total EXP: {$player->exp}\n";
        
        echo "Apakah kamu ingin melanjutkan permainan? (y/n): ";
        $continue = trim(fgets(STDIN));
    } while (strtolower($continue) == 'y');
    
    echo "Terima kasih telah bermain!\n";    
    }
}

//menggunakan class objek Character
class Character {

    //atribut Character
    public $name;
    public $hp;
    public $attack;
    public $gold = 0;
    public $exp = 0;
    
    //konstruktor untuk memberikan keterangan atribut awal Character
    public function __construct($name, $hp, $attack) {
        $this->name = $name;
        $this->hp = $hp;
        $this->attack = $attack;
    }
    
    //metode untuk menyerang monster
    public function attack($target) {
        echo "{$this->name} menyerang {$target->name} dengan kekuatan {$this->attack}!\n";
        $target->hp -= $this->attack;
    }
}
//menggunakan class objek Monster
class Monster {

    //atribut Monster
    public $name;
    public $hp;
    public $attack;
    
    //konstruktor untuk memberikan keterangan atribut awal Monster
    public function __construct($name, $hp, $attack) {
        $this->name = $name;
        $this->hp = $hp;
        $this->attack = $attack;
    }
    //metode untuk menyerang balik ke Character
    public function attack($target) {
        echo "{$this->name} menyerang balik {$target->name} dengan kekuatan {$this->attack}!\n";
        $target->hp -= $this->attack;
    }
}
// Jalankan aplikasi
Tes::run();

?>
