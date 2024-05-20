<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Bahan Bakar</title>
    <style>
        body,
        html {
            height: 100%;
            background-image: url(https://www.shell.co.uk/shell-service-stations/_jcr_content/root/metadata.coreimg.jpeg/1694195546495/shell-station--new.jpeg);
            background-size: cover;
        }    
    </style>
</head>
<body style="text-align: center; color: white;">
    <?php
class Shell {
    public $total,
    $jumlah,
    $jenis,
    $harga,
    $ppn = 0.1;

    function __construct($jumlah, $jenis)
    {
        switch ($jenis){
            case "supershell":
                $this->harga = 15420;
                break;
            case "shellvpower":
                $this->harga = 16130;
                break;
            case "shellvpowerdiesel":
                $this->harga = 18310;
                break;
            case "shellvpowernitro":
                $this->harga = 16510;
                break;
        }

        $this->total = $this->harga * $jumlah - ($this->harga * $jumlah * $this->ppn);
    }
}

class Beli extends Shell {
        public function __construct($jumlah, $jenis)
        {
        parent::__construct($jumlah, $jenis);
    }
}


if(isset($_POST['beli'])) {
    $jumlah = $_POST['inputLiter'];
    $jenis = $_POST['bensin'];
    $shell = new Beli($jumlah, $jenis);
    echo "<br>";
    echo "---------------------------------------------------------- <br>";
    echo "Total Yang Harus Anda Bayar Adalah " . "Rp." . $shell->total . "<br>Dengan Jumlah $jumlah Liter<br>Dengan Tipe Bensin $jenis <br>";
    echo "----------------------------------------------------------";
}

?>
<form action="" method="POST">
        <h1 style="color: white;">Masukan Jumlah Liter</h1>
        <input type="text" placeholder="Masukan Jumlah Liter" name="inputLiter" id="inputLiter" required>
        <h2 style="color: white;">Pilih Tipe Bahan Bakar</h2>
        <div class="btn">
            <select name="bensin" id="bensin">
                <option value="supershell">Super Shell</option>
                <option value="shellvpower">Shell V Power</option>
                <option value="shellvpowerdiesel">Shell V Power Diesel</option>
                <option value="shellvpowernitro">Shell V Power Nitro</option>
            </select>
            <button  type="submit" name="beli">Beli</button>
        </div>
    </form>
</body>
</html>