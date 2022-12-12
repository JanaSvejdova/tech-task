<?php 
include('config/constants.php'); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
  <head>
	<title>Požadavek na nákup</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />	
	<meta name="robots" content="index,follow" />
	<link rel="stylesheet" type="text/css" href="test.css" media="screen, projection, tv" />
	<link rel="Shortcut Icon" type="image/x-icon" href="images/favicon.ico" />	       
	<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script src="js/script.js?v=24" type="text/javascript"></script>
  </head>

 <?php 


if(isset($_GET['id'])) {
  
    $ID = $_GET['id'];
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die();
    $db_select = mysqli_select_db($conn, DB_NAME) or die();
    $sql = "SELECT * FROM osoba INNER JOIN rok_2022 on rok_2022.oc = osoba.oc where ID=$ID";
    $res = mysqli_query($conn, $sql);
    
    if($res == true){
      $row = mysqli_fetch_assoc($res);

      $stredisko = $row['stredisko']  ; 
      $VEDOUCI_USEKU=$row['VEDOUCI_USEKU'];
      $NAZEV_POZADOVANEHO_ZBOZI = $row['NAZEV_POZADOVANEHO_ZBOZI'];
      $POCET_KUSU = $row['POCET_KUSU'];
      $KOMODITA = $row['KOMODITA'];
      $PRIORITA_NAKUPU = $row['PRIORITA_NAKUPU'];
      $UMISTENI = $row['UMISTENI'];
      $ORIENTACNI_CENA = $row['ORIENTACNI_CENA'];
      $PREDBEZNA_DOBA_NAKUPU = $row['PREDBEZNA_DOBA_NAKUPU'];
      $KONTAKTNI_OSOBA = $row['KONTAKTNI_OSOBA'];
      $rank_2 = $row['rank_2'];
      $POMUCKY = $row['POMUCKY'];
      $TIP = $row['TIP'];
      $SKUTECNA_CENA = $row['SKUTECNA_CENA'];
      $POZNAMKA = $row['POZNAMKA'];

  }
} 
?>
  <body>

  <p>
      <?php 
      if(isset($_SESSION['update_fail'])) {
          echo $_SESSION['update_fail'];
          unset($_SESSION['udpate_fail']);
      }
      ?>
  </p>

<?php 
if(isset($_POST['submit'])) {
   
   
    $NAZEV_POZADOVANEHO_ZBOZI = $_POST['NAZEV_POZADOVANEHO_ZBOZI'];
    $POCET_KUSU = $_POST['POCET_KUSU'];
    $KOMODITA = $_POST['KOMODITA'];
    $PRIORITA_NAKUPU = $_POST['PRIORITA_NAKUPU'];
    $UMISTENI = $_POST['UMISTENI'];
    $ORIENTACNI_CENA = $_POST['ORIENTACNI_CENA'];
    $PREDBEZNA_DOBA_NAKUPU = $_POST['PREDBEZNA_DOBA_NAKUPU'];
    $prijmeni = $_POST['prijmeni'];
    $rank_2 = $_POST['rank_2'];
    $POMUCKY = $_POST['POMUCKY'];
    $TIP = $_POST['TIP'];
    $SKUTECNA_CENA = $_POST['SKUTECNA_CENA'];
    $POZNAMKA = $_POST['POZNAMKA'];

    $conn3 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die();

    $db_select3 = mysqli_select_db($conn3, DB_NAME) or die();

     $sql3 = "UPDATE rok_2022 SET 
        NAZEV_POZADOVANEHO_ZBOZI='$NAZEV_POZADOVANEHO_ZBOZI',
        POCET_KUSU = '$POCET_KUSU',
        KOMODITA = '$KOMODITA',
        PRIORITA_NAKUPU = '$PRIORITA_NAKUPU',
        UMISTENI = '$UMISTENI',
        ORIENTACNI_CENA = '$ORIENTACNI_CENA',
        PREDBEZNA_DOBA_NAKUPU = '$PREDBEZNA_DOBA_NAKUPU',
        prijmeni = '$prijmeni',
        rank_2 = '$rank_2',
        POMUCKY = '$POMUCKY',
        TIP = '$TIP',
        SKUTECNA_CENA = '$SKUTECNA_CENA',
        POZNAMKA = '$POZNAMKA'
        where 
        ID='$ID'
   ";

$res3 = mysqli_query($conn3, $sql3);
  
}
?>

<div id="master">
		<header>
			<div id="logo">	
				<a href="#" title="Střední škola stavebních řemesel Brno-Bosonohy"><img src="bosonohy_logo.png" alt="Střední škola stavebních řemesel Brno-Bosonohy" style="width: 200px;"/></a>
			</div>
			<div id="social-search">
				<h1>PŘEHLED POŽADAVKU</h1>				
			</div>
			<div id="navigation-top">
			</div>
		</header>

		<div class="subnavigation">
		<ul>
            <li><a class="btn-secondary" href="<?php echo 'http://localhost/orders/test.php'; ?>">NOVÝ POŽADAVEK</a> </li>
				<li><a class="btn-secondary" href="<?php echo 'http://localhost/orders/task/tech.php'; ?>">PŘEHLED POŽADAVKŮ</a></li>
                <li><a ><?php
            if(isset($_SESSION['myemail']))
            {
                echo $_SESSION['myemail'];
            }
            
            ?> </a>
            </li>
                <li><a class="btn-secondary" href="<?php echo 'http://localhost/orders/task/logout.php'?>">ODHLÁŠENÍ</a></li>

            </ul>
		</div>
      
		<div class="content">
			<div class="box downsmall">
				<div class="fields-of-study">
					
					<h2 class="overview">POŽADAVEK</h2>
             

            <div class="form"> 
          <form method="POST" action=""> 	
              
          <div class="vlevo"> 

          <div>
          <label>Název zboží:</label> 
            <input type="text" name="NAZEV_POZADOVANEHO_ZBOZI" readonly="readonly" class="seda" value="<?php echo $NAZEV_POZADOVANEHO_ZBOZI; ?>" style="width: 150px">
          </div>
          <div>
            <label>Priorita nákupu:</label> 
              <input id="priorita_nakupu" name="PRIORITA_NAKUPU" style="width: 150px" readonly="readonly" class="seda"   value="<?php echo $PRIORITA_NAKUPU; ?>" >
          </div>

          <div> 
            <label>Komodita :</label> 
             <input id="komodita" name="KOMODITA" value="<?php echo $KOMODITA; ?>" readonly="readonly" class="seda" >
          </div>	

          <div>
            <label>Předběžný termín nákupu:</label> 
              <input type="month" name="PREDBEZNA_DOBA_NAKUPU" value="<?php echo $PREDBEZNA_DOBA_NAKUPU; ?>"  style="width: 150px" readonly="readonly" class="seda">
          </div>

          <div>
            <label>Tip:</label> 
              <input type="text" name="TIP" value="<?php echo $TIP; ?>"  placeholder="uveďte webovou stránku " style="width: 150px" readonly="readonly" class="seda" >
          </div> 

          <div> 
            <label>Počet kusů: </label> 
              <input type="number" name="POCET_KUSU" value="<?php echo $POCET_KUSU; ?>" style="width: 150px" readonly="readonly" class="seda">
          </div>

          <div> 
            <label>Umístění:</label> 
              <input type="text" name="UMISTENI"  value="<?php echo $UMISTENI; ?>" style="width: 150px" readonly="readonly" class="seda" > 
          </div>

          <div> 
            <label>Orientační cena:</label> 
              <input type="number" name="ORIENTACNI_CENA" value="<?php echo $ORIENTACNI_CENA; ?>" style="width: 150px" readonly="readonly" class="seda">
                  <select id="currency" name="currency"   >
                    <option value="kc">Kč</option>
                  </select>
          </div>

          <div> 
            <label>Poznámka:</label> 
              <textarea name="POZNAMKA" placeholder="Zde mužete vložit poznamku.. " readonly="readonly" class="seda"  value="<?php echo $POZNAMKA; ?>" rows="2" cols="3"   ></textarea>
          </div>

          <div>
            <label>Schválení technického úseku</label> 
              <select id="rank_2" name="rank_2"  value="<?php echo $rank_2; ?>"  style="width: 170px" >
                <option >výběr</option>
                <option <?php if($rank_2=="schvaluji") { echo "selected='selected'";}  ?>  value="schvaluji">schvaluji</option>
                <option <?php if($rank_2=="schvaluji_podminka") { echo "selected='selected'";}  ?>  value="schvaluji_podminka"> schvaluji s podmminkou</option>
                <option <?php if($rank_2=="neschvaluji") { echo "selected='selected'";}  ?>  value="neschvaluji">neschvaluji</option>
              </select>
          </div>
          <br>

            <div>
              <label>Skutečná cena:</label> 
              <input type="number" name="SKUTECNA_CENA" value="<?php echo $SKUTECNA_CENA; ?>"  style="width: 150px" readonly="readonly" class="seda">
                <select id="currency" name="currency"  >
                  <option value="KC">Kč</option>
                  <option value="EU">EU</option>
                </select>
            </div>
								<div>
                  <input type="submit"  value="odeslat" name="submit" class="submit formular-button" style="width: 150px" onclick="return confirm('Poslat objednavku?')" />
							  </div>	
							</div>				
              <div class="vpravo">
              <div>
									<label for="oc">Číslo</label>
									<input type="text" size="10" value="<?php  echo $row['oc']; ?>" name="oc" id="oc" readonly="readonly" class="seda" />
								</div>	
								<div>
									<label for="jmeno">Jméno</label>
									<input type="text" size="10" value="<?php  echo $row['jmeno']; ?>" name="jmeno" id="jmeno" readonly="readonly" class="seda" />
								</div>	
								<div>
									<label for="prijmeni">Příjmení</label>
									<input type="text" size="10" value="<?php  echo $row['prijmeni']; ?>" name="prijmeni" id="prijmeni" readonly="readonly"  class="seda"/>
								</div>			
								<div>
									<label for="tel">Telefon</label>
									<input type="text" size="10" value="<?php  echo $row['tel']; ?>" name="tel" id="tel" readonly="readonly" class="seda" />
								</div>		
								<div>
									<label for="mobil">Mobil</label>
									<input type="text" size="10" value="<?php  echo $row['mobil']; ?>" name="mobil" id="mobil" readonly="readonly" class="seda" />
								</div>			
								<div>
									<label for="email">E-mail</label>
									<input type="text" size="10" value="<?php  echo $row['email']; ?>"  name="email" id="email" readonly="readonly" class="seda" />
								</div>	
								<div>
									<label for="usek">Úsek</label>
									<input type="text" size="10" value="<?php  echo $row['usek']; ?>" name="usek" id="usek" readonly="readonly" class="seda" />
								</div>
								<div>
									<label for="email">Středisko</label>
									<input type="text" size="10"  value="<?php  echo  $row['stredisko']; ?>" name="stredisko" id="stredisko" readonly="readonly" class="seda" />
								</div>	
                <div>
									<label for="email">Vedoucí</label>
									<input type="text" size="10"  value="" name="" id="" readonly="readonly" class="seda" />
								</div>	
								<div>
									<label for="email">Patro</label>
									<input type="text" size="10"  value="<?php  echo $row['patro']; ?>" name="patro" id="patro" readonly="readonly" class="seda" />
								</div>	
								<div>
									<label for="email">Místnost</label>
									<input type="text" size="10" value="<?php  echo $row['mistnost']; ?>" name="mistnost" id="mistnost" readonly="readonly" class="seda" />
								</div>									
							</div>	
      	
						</form>
					</div>
				</div>
			</div>    
	   </div>

    <script>
    function clicked(e)
    {
        if(!confirm('Opravdu odeslat požadavek?')) {
            e.preventDefault();
        }
    } 
    </script>

		<footer>

      <div class="footinner">
        <a href="../" class="footer_logo" title="Střední škola stavebních řemesel Brno-Bosonohy"></a>
        <div class="footer-info">
          <span class="telefon">+420 547 120 661</span>
          <span class="email"><a href="mailto:sekretariat@soubosonohy.cz">sekretariat@soubosonohy.cz</a></span>
          <span class="adress">Pražská 38b, 642 00 Brno - Bosonohy</span>
        </div>
        <div class="copyright">
          <p>Copyright © 2014-2015 Střední škola stavebních řemesel<br/> Created by <a href="http://www.efectel.cz">Efectel.cz</a></p>
        </div> 
      </div>
    </footer>
	  </div>	
  </body>
</html>


<?php 
if(isset($_POST['submit'])) {

  $stredisko = $_POST['stredisko']  ; 

  $NAZEV_POZADOVANEHO_ZBOZI = $_POST['NAZEV_POZADOVANEHO_ZBOZI'];
  $POCET_KUSU = $_POST['POCET_KUSU'];
  $KOMODITA = $_POST['KOMODITA'];
  $PRIORITA_NAKUPU = $_POST['PRIORITA_NAKUPU'];
  $UMISTENI = $_POST['UMISTENI'];
  $ORIENTACNI_CENA = $_POST['ORIENTACNI_CENA'];
  $PREDBEZNA_DOBA_NAKUPU = $_POST['PREDBEZNA_DOBA_NAKUPU'];
  $prijmeni = $_POST['prijmeni'];
  $rank_2 = $_POST['rank_2'];
  $TIP = $_POST['TIP'];
  $POZNAMKA = $_POST['POZNAMKA'];


  $conn3 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die();

  $db_select3 = mysqli_select_db($conn3, DB_NAME) or die();

 $sql3 = "UPDATE rok_2022 SET 
    VEDOUCI_USEKU= '$VEDOUCI_USEKU',
    NAZEV_POZADOVANEHO_ZBOZI='$NAZEV_POZADOVANEHO_ZBOZI',
    POCET_KUSU = '$POCET_KUSU',
    KOMODITA = '$KOMODITA',
    PRIORITA_NAKUPU = '$PRIORITA_NAKUPU',
    UMISTENI = '$UMISTENI',
    ORIENTACNI_CENA = '$ORIENTACNI_CENA',
    PREDBEZNA_DOBA_NAKUPU = '$PREDBEZNA_DOBA_NAKUPU',
    KONTAKTNI_OSOBA = '$KONTAKTNI_OSOBA',
    rank_2 = '$rank_2',
    POMUCKY = '$POMUCKY',
    TIP = '$TIP',
    SKUTECNA_CENA = '$SKUTECNA_CENA',
    POZNAMKA = '$POZNAMKA'
    where 
    ID='$ID'
  ";

  $res3 = mysqli_query($conn3, $sql3);

}


?>
