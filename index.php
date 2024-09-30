<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>No 1</h2>
    <form method=POST>
        <label>Pengecekan String Atau Number : </label><br>
        <input type="text" name="text" required>
        <button name="kirim">Kirim</button>
    </form>

    <!-- No 1 -->
    <?php
    if (isset($_POST['kirim'])) {
        $string = $_POST['text'];
        $string = preg_replace("/[^0-9]/", "", $string);
    
    if (!empty($string)) {
        echo "Teks ini Mengandung Angka: " . $string;
    } else {
        echo "Teks Tidak Mengandung Angka";
    }
}

    ?>

    <h2>No 2</h2>
    <form method=POST>
        <label>Cek Gaji : </label><br>
        <input type="number" name="number" required>
        <button name="gaji">gaji</button>
    </form>

    <!-- no 2 -->
    <?php
    if(isset($_POST['gaji'])) {
        $number = $_POST['number']; 
        $jamlebih = $number - 8; 
        $bonus = 50000;
        if ($jamlebih == 1) {
            echo "Lama Kerja : " . $number . "<br>";
            echo "Jam Lebih : " . $jamlebih . "<br>";
            echo "Jumlah Kompensasi : " . $bonus . "<br>";    
        }else if ($jamlebih > 1) {
            $next = $number - 9; 
            $next2 = 25000 * $next; 
            $hasil = $bonus + $next2; 
            echo "Lama Kerja : " . $number . "<br>";
            echo "Jam Lebih : " . $jamlebih . "<br>";
            echo "Jumlah Kompensasi : " . $hasil . "<br>";  
        }else {
            echo "Lama Kerja : " . $number . "<br>";
            echo "Jam Lebih : " . $jamlebih . "<br>";
        }
    }
    ?>

    <h2>No 3</h2>
    <?php
    for ($x=1; $x<=12; $x+=2) {
        echo $x ."x 5 =" .($x*5)."<br>";
    }
    
    ?>

    <h2>No 4</h2>
    <?php
    for ($x=10; $x>=1; $x--) {
        echo $x."x 1 =".($x*1)."<br>";
    }

    for ($x=10; $x>=1; $x--) {
        echo $x."x 2 =".($x*2)."<br>";
    }
?>

    <h2>No 5</h2>
    <?php
    $array1 = [1, 2, 3, 4, 5];
    $array2 = [4, 5, 6, 7, 8];
    $common_elements = array_intersect($array1, $array2);
    $unique_elements = array_merge(array_diff($array1, $array2), array_diff($array2, $array1));
    $common_elements_str = implode(', ', $common_elements);
    $unique_elements_str = implode(', ', $unique_elements);
    $array1_str = implode(', ', $array1);
    $array2_str = implode(', ', $array2);
    echo $array1_str . "<br>";
    echo $array2_str . "<br>";
    echo "Bilangan yang ada di kedua variabel: $common_elements_str" . "<br>";
    echo "Bilangan yang tidak ada di kedua variabel: $unique_elements_str";
    ?>

    <h2>No 6</h2>
    <?php
    $student = [
        [
            'nama' => 'Andi',
            'nilai' => [80, 78, 82, 78, 88]
        ],
        [
            'nama' => 'Boni',
            'nilai' => [86, 70, 80, 85, 81]
        ],
        [
            'nama' => 'Dani',
            'nilai' => [83, 91, 70, 73, 81]
        ],        [
            'nama' => 'Eko',
            'nilai' => [89, 85, 84, 86, 88]
        ],
    ];

    foreach ($student as $s) {
        $nilai = $s['nilai'];
        
        $sum = array_sum($nilai);
        
        $count = count($nilai);
        
        $average = $sum / $count;

        echo  $s['nama'] . " = " . $average . "<br>";
    }
    ?>

    <h2>No 7</h2>
    <form method=POST>
        <label>Nama 1 : </label> 
        <input type="text" name="nama1"><br><br>
        <label>Nama 2 : </label>
        <input type="text" name="nama2"><br>
        <button name="tombol">kirim</button>
    </form>
    <?php
    if(isset($_POST['tombol'])) {
        $nama1 = $_POST['nama1'];
        $nama2 = $_POST['nama2'];
        $selisih = strlen($nama1) - strlen($nama2);
        $selisih2 = strlen($nama2) - strlen($nama1);
        if (strlen($nama1) > strlen($nama2)) {
            echo $nama1 . " memilih jumlah karakter lebih banyak dari " . $nama2 . " dengan selisih " . $selisih . " Karakter";
        }else {
            echo $nama2 . " memilih jumlah karakter lebih banyak dari " . $nama1 . " dengan selisih " . $selisih2 . " Karakter";
        }
    };
    ?>

    <h2>No 8</h2>
    <?php

    $array = [80, 90, 75, 100, 85, 100, 66];
    $angkaDicari = 100;
    $array_str = implode(', ', $array);

    function hitungJumlahAngka($array, $angkaDicari) {
        $jumlah = 0;
        foreach ($array as $elemen) {
            if ($elemen == $angkaDicari) {
                $jumlah++;
            }
        }
        return $jumlah;
    }

    echo $array_str . "<br>";
    echo "Angka $angkaDicari muncul sebanyak " . hitungJumlahAngka($array, $angkaDicari) . " kali.";
    ?>

    <h2>No 9</h2>
    <?php
    function hitungPecahanUang($jumlah) {
        $pecahan = [100000, 50000, 20000, 10000, 5000, 2000, 1000, 500, 100];
        $hasil = [];

        foreach ($pecahan as $nilai) {
            if ($jumlah >= $nilai) {
                $jumlahLembar = intdiv($jumlah, $nilai); 
                $hasil[$nilai] = $jumlahLembar;
                $jumlah %= $nilai;
            }
        }

        return $hasil;
    }

    $jumlah = 140500;
    echo "Uang : " . $jumlah . "<br>";
    foreach (hitungPecahanUang($jumlah) as $pecahan => $jumlahLembar) {
        echo "Pecahan Rp " . $pecahan . ": " . $jumlahLembar . " lembar" . "<br>";
    }
    ?>

    <h3>No 10</h3>
    <?php
       $usia = [12, 15, 17, 20, 25, 30, 35, 40, 45 , 50];
       $convert = implode(',', $usia);

       function umur($usia) {
        $jumlah2 = 0;
        foreach ($usia as $variable) {
            if ($variable >= 17) {
                $jumlah2++;
            }
        }
        return $jumlah2;
       }

       $anak = count($usia) - umur($usia);
    
       echo "List Usia : " . $convert . "<br>";
       echo "Jumlah Kategori Dewasa : " . umur($usia) . "<br>";
       echo "Jumlah Kategori Anak : " . $anak;
    ?>




</body>
</html>



