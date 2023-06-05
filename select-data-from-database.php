function selectData() {
    //database sql
    $database = dbConnect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
    $sqlstring = "SELECT id, author, job FROM quotes";
    $result = $database->query($sqlstring);

    //generate selection form
    echo '<form name="selectData" method="get" action="' . validateSelectData() . '">
            <label for="cats">Datensatzauswahl</label>
            <select name="editSelect" id="editSelect" class="form-select selectfield">
            <option value="off">ID | Titel | Kategorie wählen</option>';

    foreach($result as $key) {
        $id = $key['id'];
        $author = $key['author'];
        $job = $key['job'];

        echo '<option value="' . $id . '">' . $id . ' | ' . $author . ' | ' . $job . '</option>';       

    }

    echo '</select><button class="form-control btn" type="submit" value="" id="submit" name="submitEdit"/>Bearbeiten</button></form>';
}

//validate selectData
function validateSelectData() {
    if(!isset($_GET['submitEdit'])) {
        return false;
    } else {

        if($_GET['editSelect'] != 'off') {
            header('Location: ./edit-single-quote.php?id='.$_GET['editSelect']);
            exit;
        }

    }
}
