<?php
    // SOAL NO 1
    echo "SOAL NO 1";
    echo "<br>";
    echo "<br>";
    $hobbies = ['sepakbola','futsal'];
    class school{


        // buat method untuk class laptop
        function highschool()
        {
            return "SMA NEGERI 1 SEMARANG";
        }
        function university()
        {
            return "UNIVERSITAS DIAN NUSWANTORO SEMARANG";
        }
    }
    class skills{
        public $skill = array();

        function addSkills($name,$score){
            array_push($this->skill,array(
                'name' => $name,
                'score' => $score,
            ),
            );
           
        }
        function getSkills(){
            // echo $this->skill[0];
            // echo $this->skill[1];
            return json_decode(json_encode($this->skill));
        }
    }
    $kemampuan = new skills();
    $kemampuan -> addSkills('PHP',10);
    $kemampuan->addSkills('JAVA',20);
    // $kemampuan->getSkills();
    $school = new school();
    $testArka = array(
        'name'      => "Abdurahman",
        'address'   => "Jalan Jonegaran no. 264 Semarang",
        'hobbies'   => $hobbies,
        'is_married'=> 0,
        'school'    => $school->university(),
        'skills'    => $kemampuan->getSkills()
        

    );
    echo json_encode($testArka);
    // AKHIR SOAL NO 1
    echo "<br>";
    echo "<br>";
    // SOAL NO 2
    echo "SOAL NO 2";
    echo "<br>";
    echo "<br>";
    function is_username_valid($username){
        $cek=1;
        if(strlen($username) == 8){
            for($i=0; $i<strlen($username); $i++){
                if($username[$i]==strtolower($username[$i]) || $username[$i]=='.'){
                    $cek = 1;
                }else{
                    $cek = 0;
                    break;
                }
            }
        //    if($cek == 1) return true; else return false;
            if($cek == 1) $check = "BENAR"; else $check = "SALAH";
            return $check;
        }else{
            return "SALAH";
        }
    }
    echo 'username : awanok.E'.' -> '.is_username_valid('awanok.E');
    echo '<br>';
    echo 'username : awano.ke' . ' -> ' . is_username_valid('awano.ke');
    echo "<br>";
    echo "<br>";
    function is_email_valid($email){

        $cek_email = explode("@",$email);
        if(count($cek_email) == 2 && strlen($cek_email[0]) >= 4){
            $cek_domain = explode(".",$cek_email[1]);
            if(count($cek_domain) == 2){
                return "BENAR";
            }else{
                return "SALAH";
            }
        }else{
            return "SALAH";
        }
    }
    echo 'email: kamu@aku.com'.' -> '.is_email_valid("kamu@aku.com");
    echo "<br>";
    echo 'email: aku@kamu.com' . ' -> ' . is_email_valid("aku@kamu.com");
    echo "<br>";
    // AKHIR SOAL NO 2
    echo "<br>";
    echo "SOAL NO 3";
    echo "<br>";
    echo "<br>";
    // SOAL NO 3
    function cetak($length)
    {
        $data = array();
        $cek_valid = "TIDAK SAMA";
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        for($j = 0; $j<$length; $j++){
            $randomString = '';
            for ($i = 0; $i < 32; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $data[$j] = $randomString;
            // echo $randomString; echo "<br>";
        }
        // 
        for($i=0;$i<$length-1;$i++){
            for($j=$i+1; $j<$length;$j++){
                if($data[$i] == $data[$j]){
                    $a = $i+1; $b=$j+1;
                    $cek_valid = "SAMA".$a."dan".$b;
                }
            }
        }
        echo $cek_valid;
        echo "<br>";
        for($i=0; $i<$length; $i++){
            $j=$i+1;
            echo $j." ->".$data[$i];
            echo "<br>";
        }
        
    }
    cetak(2);
    // SOAL AKHIR NO 3
    echo "<br>";
    echo "<br>";
    echo "SOAL NO 4";
    echo "<br>";
    // SOAL NO 4
    function cetak_gambar(){
        $string = ['P','R','O','G','R','A','M','M','E','R'];
        $length = count($string);
        $awal = 0;
        $akhir = $length - 1;
        for($i=0; $i<$length;$i++){
            for($j=0;$j<$length;$j++){
                if($awal == $j || $j == $akhir){
                    echo $string[$i];
                }else{
                    echo "=";
                }
            }
            $awal++;
            $akhir--;
            echo "<br>";
        }


    }
    cetak_gambar();
    echo "<br>";
    echo "<br>";
    // AKHIR SOAL NO 4
    echo "SOAL NO 5";
    echo "<br>";
    echo "<br>";
    // SOAL NO 5
    function sort_array(){
        $data = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z";
        $data_array = explode(',',$data);
        $data_test  =   [[ 'h', 'g', 'x', 'e', 'k', 'h', 'b', 'e', 'd', 'g', 'b', 'e', 'd'],
                        [ 'c', 'g', 'b', 'e', 'b', 'h']];
        $tmp = array(0,0);
        for($j=0; $j<count($data_test); $j++){
            for ($i = 0; $i < count($data_test[$j]); $i++) {
                $numb = array_search($data_test[$j][$i], $data_array);
                if ($tmp[$j]<$numb) {
                    $tmp[$j] = $numb;
                }
                echo "  -> " . $data_test[$j][$i];
            }
            echo "<br>";
            // echo "<br>" . $data_array[$tmp[$j]];
        }
        echo "<br>";
        for($x=0; $x<count($data_test);$x++){
            echo $x.' -> '.$data_array[$tmp[$x]]; echo "<br>";
        }
        // echo json_encode($data_test);
        // echo json_encode($data);
    }
    sort_array();

?>