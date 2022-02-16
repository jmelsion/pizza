<?php

    // La idea és mostrar els errors al voltant de l'input on s'han produït.
    //Si no hi ha errors, ens redirigirem a la pàgina de index.
    
    // Guardarem els errors en un array associatiu.
    // Posarem les claus necessàries i l'inicialitzarem.
    // En aquest cas inicialitzem amb cadenes en blanc.
    // Si es produeixen errors actualitzarem els valors del array en lloc de llançar echos.
    // En aquest cas, mostraríem els errors en el formulari prenent els valors del array.
    $errors = array('email' => '', 'nom' => '', 'ingredients' => '');

    $email = "";
    $nom = "";
    $ingredients = "";

    // Recuperem via POST l'informació del form submit
    // Utilitzem htmlspecialchars per evitar codi maliciós quan ho enviem al navegador.
    if(isset($_POST['submit'])) {
        // Primer validarem si els camps estan buits.
        // Després validarem que l'email, nom i ingredients (que estiguin separats per comes)
        // són correctes. PHP té funcions per a validar l'email però no per al nom i ingredients
        // pel que utilitzarem expressions regulars en les nostres pròpies funcions.

        // Check email
        if(empty($_POST['email'])) {
            //echo 'L\'email es obligatori';
            // EN LUGAR DE ECHO, GUARDAMOS EL ERROR EN EL ARRAY
            $errors['email'] = 'L\'email es obligatori';
        }
        else {
            $email = $_POST['email'];
            // filter_var() pren dos paràmetres, el valor a validar
            // i el tipus de validació que volem aplicar.
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // FILTER_VALIDATE_EMAIL: Retornarà true si és un email vàlid.
                //echo 'L\'email no és un email vàlid';
                // EN LUGAR DE ECHO, GUARDAMOS EL ERROR EN EL ARRAY
                $errors['email'] = 'L\'email no és un email vàlid';
            }
        }
        // Check nom
        if(empty($_POST['nom'])) {
            //echo 'El nom es obligatori';
            // EN LUGAR DE ECHO, GUARDAMOS EL ERROR EN EL ARRAY
            $errors['nom'] = 'El nom es obligatori';
        }
        else {
            $nom = $_POST['nom'];
            // preg_match() ens facilitarà analitzar una expressió regular.
            // Pren dos paràmetres, l'expressió regular a aplicar
            // i el valor a validar.
            // L'expressió regular que usem aquí analitza des del començament (^)
            // fins al final ($) que almenys s'introdueixi un caràcter, minúscula, majúscula o espai.
            if(!preg_match('/^[a-zA-Z\s]+$/', $nom)) {
                //echo 'El nom ha d\'estar compost per lletres i espais únicament';
                // EN LUGAR DE ECHO, GUARDAMOS EL ERROR EN EL ARRAY
                $errors['nom'] = 'El nom ha d\'estar compost per lletres i espais únicament';
            }
        }
        // Check ingredients
        if(empty($_POST['ingredients'])) {
            //echo 'Al menys un ingredients és obligatori';
            $errors['ingredients'] = 'Al menys un ingredients és obligatori';
        }
        else {
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
                //echo 'Els ingredients han d\'estar separats per comes';
                $errors['ingredients'] = 'Els ingredients han d\'estar separats per comes';
            }
        }

        // Si no hi ha errors, anem cap a index.
        if(array_filter($errors)) { // Si no hi ha errors, retornarà false
            //echo 'Hi ha errors en el formulari';
        }
        else {
            //echo 'El formulari és vàlid';

            // No volem mostrar això, volem redirigir
            // Usamos la función header()
            header('Location: index.php');
        }

    }

?>

<!DOCTYPE html>
<html lang="es">


<?php include('templates/header.php'); ?>

<section class = "container grey-text">
    <h4 class="center">Afegir una Pizza</h4>
    <form action="add.php" method = "POST" class="white">
        <label for="email">Email:</label>
        <input type="text" name = "email" value="<?php echo $email ?>">
        <div class="red-text"><?php echo htmlspecialchars($errors['email']); ?></div>
        <label for="nom">Pizza:</label>
        <input type="text" name = "nom" value="<?php echo $nom ?>">
        <div class="red-text"><?php echo htmlspecialchars($errors['nom']); ?></div>
        <label for="ingredients">Ingredients (separats per coma):</label>
        <input type="text" name = "ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
        <div class="red-text"><?php echo $errors['ingredients']; ?></div>
        <div class="center">
            <input type="submit" name = "submit" value = "submit" class = "btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include('templates/footer.php'); ?>


</html>