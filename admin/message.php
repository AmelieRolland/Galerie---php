<?php

require_once __DIR__ . '/../layout/side-bar.php';
require_once __DIR__ . '/../data/contact-request.php';
require_once __DIR__ . '/../functions/showMeTheEmail.php';

$id=$_GET['id'];
$fullEmail = getEmail($id);

?>



<div class="ms-80 pb-20">

<p><b>De la part de :</b> <?php echo $fullEmail['firstname'] ." " . $fullEmail['lastname'] ?></p>
<p>Adresse email : <?php echo $fullEmail['email'] ?></p>
<p>Objet du message : <?php echo $fullEmail['subject'] ?></p>
<p>Message : <?php echo $fullEmail['message'] ?></p>
<p>Date d'envoi : <?php echo $fullEmail['date'] ?></p>

</div>

<?php require_once __DIR__ . '/../layout/footer.php';  ?>

