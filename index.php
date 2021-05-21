<?php
$error = "";
if(isset($_POST['registrationkey'])) {$regkey = $_POST['registrationkey'];
$api_token = 'uTxjxXhqRChMtZngq8IzybjnkOxAemnEmmEYxFfpAvj6ibetjPj8wH1SRfoDR4tt';

$api_url = 'http://api.nrpla.de/'.$regkey.'?api_token='.$api_token;

$reg_jsondata = @file_get_contents($api_url);

if($reg_jsondata === FALSE) {
$error = "Ugyldig Nummerplade";
} else {
$json = json_decode($reg_jsondata,true);
}
}
?>

<div class="container">
    <form action="<?php echo site_url(); ?>" method="POST">
        <div class="row">
         <p class="txt1"><?php echo $error; ?></p>
            <div class="column">
                <label for="registration">NUMMERPLADE</label>
                <input type="text" name="registration" value="<?php if(isset($json['data']['registration'])){echo $json['data']['registration'];}  ?>" placeholder="Registreringsnummer" required>
            </div>

            <div class="column">
                <label for="type">BILTYPE</label>
                <input type="text" name="type" value="<?php if(isset($json['data']['type'])){echo $json['data']['type'];}  ?>" placeholder="Personbil eller Varebil" required>
            </div>

            <div class="column">
                <label for="brand">MÆRKE</label>
                <input type="text" name="brand" value="<?php if(isset($json['data']['brand'])){echo $json['data']['brand'];}  ?>" placeholder="Bilmærke" required>
            </div>

            <div class="column">
                <label for="brand">MODEL</label>
                <input type="text" name="model" value="<?php if(isset($json['data']['model'])){echo $json['data']['model'];}  ?>" placeholder="Bilmodel" required>
            </div>

            <div class="column">
                <label for="version">VARIANT</label>
                <input type="text" name="version" value="<?php if(isset($json['data']['version'])){echo $json['data']['version'];}  ?>" placeholder="Variant / Motorstørrelse" required>
            </div>

            <div class="column">
                <label for="version">ÅRGANG</label>
                <input type="text" name="model_year" value="<?php if(isset($json['data']['model_year'])){echo $json['data']['model_year'];}  ?>" placeholder="Bilens årgang" required>
            </div>

            <div class="column">
                <label for="kilometer">BILENS KM</label>
                <input type="text" name="kilometer" placeholder="F.eks. 150000" required>
            </div>

            <div class="column">
                <label for="pris">BILENS STAND</label>
                <input type="text" name="pris" placeholder="Bilens stand fra 1-10 (cirka)" required>
            </div>
           
            <div class="column">
                <label for="pris">FORVENTET MINDSTEPRIS</label>
                <input type="text" name="pris" placeholder="F.eks. 15000,-" required>
            </div>

            <div class="column">
                <label for="fornavn">NAVN</label>
                <input type="text" name="Dit navn" placeholder="Jens Jensen" required>
            </div>

            <div class="column">
                <label for="tlf">TELEFON NUMMER</label>
                <input type="text" name="tlf" placeholder="12 34 56 78" required>
            </div>

            <div class="column">
                <label for="email">EMAIL</label>
                <input type="text" name="email" placeholder="jens_jensen@live.dk" required>
            </div>

            <div class="column">
                <input type="submit" value="SEND FORESPØRGSEL" name="sendmail" class="styled-button1" required>
            </div>
        </div>

<?php
if(isset($json['data']['model'])){echo "<script>window.scrollTo({top: document.body.scrollHeight, behavior: 'smooth', top: '2000'});</script>";} 
?>

    </form>
</div>