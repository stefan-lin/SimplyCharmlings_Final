<?php  
  @include_once('Constant.php');
  //include 'views/header.php';
  /* AUTO-LOAD */
  function __autoload($class_name){
    require_once "./models/{$class_name}.php";
  }
  
  $ah = new AccountHelper();
  
  
  //echo "<p></p>";
  //if($ah->is_password_match("tadashi.hamada@gmail.com", "Npr$Q123")){
  //  echo "<p></p>";
  //  echo "<h1>True</h1>";
  //}
  //else{
  //  echo "<p></p>";
  //  echo "<h1>False</h1>";
  //}
  /*
  echo "<p>========*****===============</p>";
  $arr = array("1hg2%aY345", "Z%99nabc", "Npr$Q123", "836hNbg%K", "R76%hk95V");
  $salts = array(
    'df7e345feea9163555838b9ce772210e481fce2baa4212fb35a517a9662f511c',
    'eaaf6238bb47b3f7b7972ef217f747b8cd62cf125d2ed501356e3954f94e27ec',
    'ed28920d977e3551b5fd86f1f882cbe9bd07362774c0604e6197c5acc4e8e839',
    'e67f29122e4913ad7ca3e0c49d25d9a01c839577e1f9633e4e08def6bedae75a',
    'e17622ad4314bb57480296ecc80de5166b0459b6260cae7c80516f755b3c38a9'
  );
  $index = 0;
  for($index = 0; $index <5; $index++){
    $pass = hash(HASH_ALGO, $arr[$index] . $salts[$index]);
    $s = $salts[$index];
    echo "<p></p>";
    echo "<p><h3>'$s', '$pass'</h3></p>";
    echo "<p></p>";
  } // END FOR LOOP
  */
  /*
  $ph = new PasswordHelper();
  $new_arr = $ph->get_hash("$j$u2016CS174");
  $pass = $new_arr[0];
  $salt = $new_arr[1];
  echo "<p><h3>passwrod = $pass</h3></p>";
  echo "<p><h3>salt = $salt</h3></p>";
  */
  /*
  $db = new Database();
  $db->insert_new_user(
    "stefan@gmail.com", 
    "Stefan",
    "Lin",
    $new_arr[0],
    $new_arr[1],
    "San Jose",
    "(949)123-4567"
  );
  echo "<p><h3>Done</h3></p>";
  */
  /*
  $new_user = array(
    'email' => 'yien@sjsu.edu',
    'fname' => 'Yien',
    'lname' => 'Lin',
    'password' => '12@u$wEll',
    'address' => 'Taiwan',
    'phone' => '(858)645-2374'
  );
  if(!$ah->add_new_user($new_user)){
    echo "<p><h3>ERROR</h3></p>";
  }
  else{
    echo "<p><h3>Done</h3></p>";
  }*/
  $salt = 'da02f98fe919ce32679ebd243e02d222779083686d17f4b1379a5d8167c57f96';
  $psw = '$j$u2016CS174' . $salt;
  $hashed_psw = hash(HASH_ALGO, $psw);
  echo "<p><h3>$hashed_psw</h3></p>";
?>