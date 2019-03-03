<?php
    require_once("register.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Kayıt Formu</title>
</head>
<body>
    <?php
    if($_POST){
        $kullaniciadi = $_POST["kullaniciadi"];
        $sifre = $_POST["sifre"];
        $email = $_POST["email"];

        if(empty($kullaniciadi) || empty($sifre) || empty($email))
        {
            echo "Lütfen Boş Alan Bırakmayınız!";
        }
    else{
           $ekle = $db->prepare("insert into uyeler (kullaniciadi,sifre,email)values(?,?,?)");
           $ekle->execute(array($kullaniciadi,$sifre,$email));
           $hata = $ekle->errorInfo();
           if($hata[2]){
               echo "Kayıt Başarısız";
           }else{
               echo "Kayıt Başarılı -".$db->lastInsertId();   
           }
       } }else{
    ?> 
	<form action="" method="post">
		<table>
		<tr>
			<td>Kullanıcı Adı:</td><td><input type="text" name="kullaniciadi"></td>	
		</tr>
		<tr>
			<td>Şifre:</td><td><input type="password" name="sifre"></td>	
		</tr>
		<tr>
			<td>E-mail:</td><td><input type="text" name="email"></td>	
		</tr>
		<tr>
			<td></td><td><input type="submit" name="Kayıt Ol"></td>	
		</tr>
    </table>
    </form>
        <?php } ?>
</body>
</html>