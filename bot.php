<?php
/*
copyright @ medantechno.com
2017

*/

require_once('./line_class.php');
require_once('./ayat.php');


$channelAccessToken = 'IdlkQfmkBO3fhyVkTKSXVIeuVB4/B0S2l/s6721+VMDlvFe0tdGDeAU8VANe7l1WCuHSK/JYEIGsRRW7JR9Cyya5Cxrsg1mbC2LT8WQV5+hMlhgytSdgE3mmrMcJEoaSDCsGAMCg2XQwLdKqHlvEuAdB04t89/1O/w1cDnyilFU=';
$channelSecret = 'd755d104a6ca58d99d02ea7d1ef49acd';
$client = new LINEBotTiny($channelAccessToken, $channelSecret);

//var_dump($client->parseEvents());

$servername = "localhost:3306";
$username = "kuliverc_kp";
$password = "kpdelima";
$database = "kuliverc_kpdelima";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    error_log("Connection failed: " . mysqli_connect_error());
}

//$_SESSION['userId']=$client->parseEvents()[0]['source']['userId'];

/*
{
  "replyToken": "nHuyWiB7yP5Zw52FIkcQobQuGDXCTA",
  "type": "message",
  "timestamp": 1462629479859,
  "source": {
    "type": "user",
    "userId": "U206d25c2ea6bd87c17655609a1c37cb8"
  },
  "message": {
    "id": "325708",
    "type": "text",
    "text": "Hello, world"
  }
}
*/

$userId = $client->parseEvents()[0]['source']['userId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp = $client->parseEvents()[0]['timestamp'];

$message = $client->parseEvents()[0]['message'];
$messageid = $client->parseEvents()[0]['message']['id'];

$profil = $client->profil($userId);

$pesan_datang = $message['text'];

//pesan bergambar
if ($message['type'] == 'text') {
    $pesan_datang = strtolower($pesan_datang);
    if (strpos($pesan_datang, 'cek ultah') === 0) {

        $sql = "SELECT nama_lengkap, MONTH (ttl) bulan, DAY(ttl) tanggal  FROM jemaat where month(ttl) = ";
        $bulan = "";
        if (strpos($pesan_datang, '1') !== false && strpos($pesan_datang, '11') === false && strpos($pesan_datang, '12') === false || strpos($pesan_datang, 'januari') !== false) {
            $sql .= '1';
            $bulan = "januari";
        } else if (strpos($pesan_datang, '2') !== false && strpos($pesan_datang, '11') === false && strpos($pesan_datang, '12') === false || strpos($pesan_datang, 'februari') !== false) {
            $sql .= '2';
            $bulan = "februari";
        } else if (strpos($pesan_datang, '3') !== false || strpos($pesan_datang, 'maret') !== false) {
            $sql .= '3';
            $bulan = "maret";
        } else if (strpos($pesan_datang, '4') !== false || strpos($pesan_datang, 'april') !== false) {
            $sql .= '4';
            $bulan = "april";
        } else if (strpos($pesan_datang, '5') !== false || strpos($pesan_datang, 'mei') !== false) {
            $sql .= '5';
            $bulan = "mei";
        } else if (strpos($pesan_datang, '6') !== false || strpos($pesan_datang, 'juni') !== false) {
            $sql .= '6';
            $bulan = "juni";
        } else if (strpos($pesan_datang, '7') !== false || strpos($pesan_datang, 'juli') !== false) {
            $sql .= '7';
            $bulan = "juli";
        } else if (strpos($pesan_datang, '8') !== false || strpos($pesan_datang, 'agustus') !== false) {
            $sql .= '8';
            $bulan = "agustus";
        } else if (strpos($pesan_datang, '9') !== false || strpos($pesan_datang, 'september') !== false) {
            $sql .= '9';
            $bulan = "september";
        } else if (strpos($pesan_datang, '10') !== false || strpos($pesan_datang, 'oktober') !== false) {
            $sql .= '10';
            $bulan = "oktober";
        } else if (strpos($pesan_datang, '11') !== false || strpos($pesan_datang, 'november') !== false) {
            $sql .= '11';
            $bulan = "november";
        } else if (strpos($pesan_datang, '12') !== false || strpos($pesan_datang, 'desember') !== false) {
            $sql .= '12';
            $bulan = "desember";
        }

        if ($bulan === "") {
            $balas = array(
                'replyToken' => $replyToken,
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "Hallo " . $profil->displayName . "!\nSepertinya ada kesalahan penulisan. Ketik \"cek ultah\" diikuti bulan\nContoh : \"cek ultah 1\" atau \"cek ultah januari\""
                    )
                )
            );
        } else if ($bulan != "") {
            $sql .= " order by tanggal";
            $result = $conn->query($sql);

            $jemaat = "";
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $jemaat .= $row['tanggal'] . " " . $row['nama_lengkap'] . "\n";
                }
                $balas = array(
                    'replyToken' => $replyToken,
                    'messages' => array(
                        array(
                            'type' => 'text',
                            'text' => "Hallo " . $profil->displayName . "!\nIni data jemaat yang berulang tahun di bulan " . ucwords($bulan) . " : \n" . $jemaat
                        )
                    )
                );
            } else {
                $balas = array(
                    'replyToken' => $replyToken,
                    'messages' => array(
                        array(
                            'type' => 'text',
                            'text' => "Hallo " . $profil->displayName . "!\nTidak ada jemaat yang berulang tahun di bulan " . ucwords($bulan)
                        )
                    )
                );
            }
        }

    } else if (strpos($pesan_datang, 'cek jemaat') === 0) {
        $nama = str_replace("cek jemaat", "", $pesan_datang);
        if (strlen($nama) > 0) {
            $nama = str_replace(" ", "", $nama);
            $sql = "SELECT nama_lengkap, phone, nama_panggilan, year(ttl) tahunlahir, 
month(ttl) bulanlahir, day(ttl) tanggallahir, alamat, hobby, socialmedia, pekerjaan, pj,
 usher, kolektan, pemusik, socmed, liturgos, singer, multimedia FROM jemaat where nama_lengkap like '%" . $nama . "%' or nama_lengkap like '" . $nama . "%' or nama_lengkap like '%" . $nama . "' or nama_panggilan like '%" . $nama . "%' or nama_panggilan like '" . $nama . "%' or nama_panggilan like '%" . $nama . "'";

            $result = $conn->query($sql);
            $jemaat = "";
            if ($result->num_rows > 0) {
                $get_sub = array();

                while ($row = $result->fetch_assoc()) {
                    $jemaat = "Nama : " . $row['nama_lengkap'] . "\nPanggilan : " . $row['nama_panggilan'] .
                        "\nNo HP : " . $row['phone'] . "\nDOB : " . $row['tanggallahir'] . "-" . $row['bulanlahir'] . "-" . $row['tahunlahir'] .
                        "\nHobby : " . $row['hobby'] .
                        "\nSocial media : " . $row['socialmedia'] .
                        "\nAlamat : " . $row['alamat'] .
                        "\nStatus : " . $row["pekerjaan"] .
                        "\nPelayanan : "
                        . ($row['pj'] == 1 ? "\n- PJ" : "")
                        . ($row['liturgos'] == 1 ? "\n- Liturgos" : "")
                        . ($row['singer'] == 1 ? "\n- Singer" : "")
                        . ($row['usher'] == 1 ? "\n- Usher" : "")
                        . ($row['kolektan'] == 1 ? "\n- Kolektan" : "")
                        . ($row['multimedia'] == 1 ? "\n- Multimedia" : "")
                        . ($row['socmed'] == 1 ? "\n- Social Media" : "");

                    $temp = array(
                        'type' => 'text',
                        'text' => "" . $jemaat . ""
                    );

                    array_push($get_sub, $temp);
                }
                $balas = array(
                    'replyToken' => $replyToken,
                    'messages' => $get_sub
                );
            } else {
                $balas = array(
                    'replyToken' => $replyToken,
                    'messages' => array(
                        array(
                            'type' => 'text',
                            'text' => "Hallo " . $profil->displayName . "!\nTidak ada jemaat yang bernama " . $nama
                        )
                    )
                );
            }
        } else {
            $sql = "SELECT nama_lengkap from jemaat order by nama_lengkap";
            $result = $conn->query($sql);

            $jemaat = "";
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $jemaat .= $row['nama_lengkap'] . "\n";
                }
                $balas = array(
                    'replyToken' => $replyToken,
                    'messages' => array(
                        array(
                            'type' => 'text',
                            'text' => "Hallo " . $profil->displayName . "!\nIni data seluruh jemaat : \n" . $jemaat
                        )
                    )
                );
            }
        }
    } else if (strpos($pesan_datang, 'cek hobi') === 0) {
        $nama = str_replace("cek hobi", "", $pesan_datang);
        if (strlen($nama) > 0) {
            $nama = str_replace(" ", "", $nama);
            $sql = "SELECT nama_lengkap, phone, nama_panggilan, year(ttl) tahunlahir, 
month(ttl) bulanlahir, day(ttl) tanggallahir, alamat, hobby, socialmedia, pekerjaan, pj,
 usher, kolektan, pemusik, socmed, liturgos, singer, multimedia FROM jemaat where hobby like '%" . $nama . "%' or hobby like '" . $nama . "%' or hobby like '%" . $nama . "'";

            $result = $conn->query($sql);
            $jemaat = "";
            if ($result->num_rows > 0) {
                $get_sub = array();

                while ($row = $result->fetch_assoc()) {
                    $jemaat = "Nama : " . $row['nama_lengkap'] . "\nPanggilan : " . $row['nama_panggilan'] .
                        "\nNo HP : " . $row['phone'] .
                        "\nHobby : " . $row['hobby'] .
                        "\nSocial media : " . $row['socialmedia'];

                    $temp = array(
                        'type' => 'text',
                        'text' => "" . $jemaat . ""
                    );

                    array_push($get_sub, $temp);
                }
                $balas = array(
                    'replyToken' => $replyToken,
                    'messages' => $get_sub
                );
            } else {
                $balas = array(
                    'replyToken' => $replyToken,
                    'messages' => array(
                        array(
                            'type' => 'text',
                            'text' => "Hallo " . $profil->displayName . "!\nTidak ada jemaat yang memiliki hobi " . $nama
                        )
                    )
                );
            }
        }

    } else if ($pesan_datang == 'cek pemusik') {
        $sql = "SELECT nama_lengkap, phone FROM jemaat where pemusik = 1";
        $result = $conn->query($sql);

        $jemaat = "";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $jemaat .= $row['nama_lengkap'] . "   " . $row['phone'] . "\n";
            }
            $balas = array(
                'replyToken' => $replyToken,
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "Hallo  " . $profil->displayName . "!\nIni data jemaat yang melayani di bidang musik : \n" . $jemaat
                    )
                )
            );
        } else {
            $balas = array(
                'replyToken' => $replyToken,
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "Hallo " . $profil->displayName . "!\nTidak ada jemaat yang mau melayani di bidang musik"
                    )
                )
            );
        }
    } else if ($pesan_datang == 'cek pj') {
        $sql = "SELECT nama_lengkap, phone FROM jemaat where pj = 1";
        $result = $conn->query($sql);

        $jemaat = "";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $jemaat .= $row['nama_lengkap'] . "   " . $row['phone'] . "\n";
            }
            $balas = array(
                'replyToken' => $replyToken,
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "Hallo  " . $profil->displayName . "!\nIni data jemaat yang melayani sebagai PJ Kebaktian : \n" . $jemaat
                    )
                )
            );
        } else {
            $balas = array(
                'replyToken' => $replyToken,
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "Hallo " . $profil->displayName . "!\nTidak ada jemaat yang melayani sebagai PJ Kebaktian"
                    )
                )
            );
        }
    } else if ($pesan_datang == 'cek socmed') {
        $sql = "SELECT nama_lengkap, phone FROM jemaat where socmed = 1";
        $result = $conn->query($sql);

        $jemaat = "";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $jemaat .= $row['nama_lengkap'] . "   " . $row['phone'] . "\n";
            }
            $balas = array(
                'replyToken' => $replyToken,
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "Hallo  " . $profil->displayName . "!\nIni data jemaat yang melayani sebagai Tim SocMed : \n" . $jemaat
                    )
                )
            );
        } else {
            $balas = array(
                'replyToken' => $replyToken,
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "Hallo " . $profil->displayName . "!\nTidak ada jemaat yang melayani sebagai Tim SocMed"
                    )
                )
            );
        }
    } else if ($pesan_datang == 'cek usher') {
        $sql = "SELECT nama_lengkap, phone FROM jemaat where usher = 1";
        $result = $conn->query($sql);

        $jemaat = "";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $jemaat .= $row['nama_lengkap'] . "   " . $row['phone'] . "\n";
            }
            $balas = array(
                'replyToken' => $replyToken,
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "Hallo " . $profil->displayName . "!\nIni data jemaat yang melayani di bidang Usher : \n" . $jemaat
                    )
                )
            );
        } else {
            $balas = array(
                'replyToken' => $replyToken,
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "Hallo " . $profil->displayName . "!\nTidak ada jemaat yang mau melayani di bidang usher"
                    )
                )
            );
        }
    } else if ($pesan_datang == 'cek multimedia' || $pesan_datang == 'cek multi') {
        $sql = "SELECT nama_lengkap, phone FROM jemaat where multimedia = 1";
        $result = $conn->query($sql);

        $jemaat = "";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $jemaat .= $row['nama_lengkap'] . "   " . $row['phone'] . "\n";
            }
            $balas = array(
                'replyToken' => $replyToken,
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "Hallo " . $profil->displayName . "!\nIni data jemaat yang melayani di bidang multimedia : \n" . $jemaat
                    )
                )
            );
        } else {
            $balas = array(
                'replyToken' => $replyToken,
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "Hallo " . $profil->displayName . "!\nTidak ada jemaat yang mau melayani di bidang multimedia"
                    )
                )
            );
        }
    } else if ($pesan_datang == 'cek singer') {
        $sql = "SELECT nama_lengkap, phone FROM jemaat where singer = 1";
        $result = $conn->query($sql);

        $jemaat = "";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $jemaat .= $row['nama_lengkap'] . "   " . $row['phone'] . "\n";
            }
            $balas = array(
                'replyToken' => $replyToken,
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "Hallo " . $profil->displayName . "!\nIni data jemaat yang melayani di bidang singer : \n" . $jemaat
                    )
                )
            );
        } else {
            $balas = array(
                'replyToken' => $replyToken,
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "Hallo " . $profil->displayName . "!\nTidak ada jemaat yang mau melayani di bidang singer"
                    )
                )
            );
        }
    } else if ($pesan_datang == 'cek kolektan') {
        $sql = "SELECT nama_lengkap, phone FROM jemaat where kolektan = 1";
        $result = $conn->query($sql);

        $jemaat = "";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $jemaat .= $row['nama_lengkap'] . "   " . $row['phone'] . "\n";
            }
            $balas = array(
                'replyToken' => $replyToken,
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "Hallo " . $profil->displayName . "!\nIni data jemaat yang melayani di bidang kolektan : \n" . $jemaat
                    )
                )
            );
        } else {
            $balas = array(
                'replyToken' => $replyToken,
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "Hallo " . $profil->displayName . "!\nTidak ada jemaat yang mau melayani di bidang kolektan"
                    )
                )
            );
        }
    } else if ($pesan_datang == 'cek liturgos') {
        $sql = "SELECT nama_lengkap, phone FROM jemaat where liturgos = 1";
        $result = $conn->query($sql);

        $jemaat = "";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $jemaat .= $row['nama_lengkap'] . "   " . $row['phone'] . "\n";
            }
            $balas = array(
                'replyToken' => $replyToken,
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "Hallo " . $profil->displayName . "!\nIni data jemaat yang melayani di bidang liturgos : \n" . $jemaat
                    )
                )
            );
        } else {
            $balas = array(
                'replyToken' => $replyToken,
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "Hallo " . $profil->displayName . "!\nTidak ada jemaat yang mau melayani di bidang liturgos"
                    )
                )
            );
        }
    } else if ($pesan_datang == 'cek form') {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => "http://bit.ly/jemaatkpd5"
                )
            )
        );
    } else if ($pesan_datang == 'cek ayat') {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => "Hallo " . $profil->displayName . "!\nIni ayat untuk kamu\n\n" . $ayats[rand(0, sizeof($ayats) - 1)] . "\n\nTetap semangat melayani Tuhan!"
                )
            )
        );

    } else if (strpos($pesan_datang, 'apakah ') === 0) {
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => strlen(str_replace(" ", "", $pesan_datang)) % 3 == 0 ? "Tidak" : "Ya"
                )
            )
        );

    } else if (strpos($pesan_datang, 'anjir') !== false ||
        strpos($pesan_datang, 'bangsat') !== false ||
        strpos($pesan_datang, 'anjing') !== false ||
        strpos($pesan_datang, 'kampret') !== false ||
        strpos($pesan_datang, 'babi') !== false ||
        (strpos($pesan_datang, ' njir') !== false || strpos($pesan_datang, 'njir') === 0) ||
        (strpos($pesan_datang, ' njing') !== false || strpos($pesan_datang, 'njing') === 0) ||
        (strpos($pesan_datang, ' jing') !== false || strpos($pesan_datang, 'jing') === 0) ||
        (strpos($pesan_datang, ' jir') !== false || strpos($pesan_datang, 'jir') === 0) ||
        (strpos($pesan_datang, ' nyet') !== false || strpos($pesan_datang, 'nyet') === 0) ||
        strpos($pesan_datang, 'monyet') !== false ||
        strpos($pesan_datang, 'geblek') !== false ||
        strpos($pesan_datang, 'goblok') !== false ||
        strpos($pesan_datang, 'wtf') !== false) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => "Hi " . $profil->displayName . ", \nTolong dijaga perkataannya\n\n\"Hendaklah kata-katamu senantiasa penuh kasih, jangan hambar, sehingga kamu tahu, bagaimana kamu harus memberi jawab kepada setiap orang.\"  Kolose 4:6\n\nTetap semangat melayani Tuhan"
                )
            )
        );
    } else if ($pesan_datang == 'cek bantuan' || (strpos($pesan_datang, 'cek') === 0 && strpos($pesan_datang, 'cek jadwal') === 0 && strpos($pesan_datang, 'cek tema ') === 0)) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => "Hallo " . $profil->displayName . "!\nBerikut keyword yang dapat kamu gunakan : \ncek form\ncek pj\ncek pemusik\ncek usher\ncek singer\ncek liturgos\ncek kolektan\ncek multimedia\ncek socmed\ncek ultah [bulan]\ncek tema [bulan]\ncek jemaat\ncek jemaat [nama]\ncek hobi [hobi]\ncek ayat\n\nTetap semangat melayani Tuhan!"
                )
            )
        );
    }


}

$result = json_encode($balas);
//$result = ob_get_clean();

file_put_contents('./balasan.json', $result);


$client->replyMessage($balas);
$conn->close();


