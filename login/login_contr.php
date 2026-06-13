<?php


//se l'utente è arrivato alla pagina legittimamente eseguendo metodo POST tramite form
if ($_SERVER["REQUEST_METHOD"] === "POST") {


    $username = $_POST["username"];
    $pwd = $_POST["pwd"]; //password inserita

    echo $username;
    echo $pwd;

    try {

        require_once '../connessione.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr_funzioni.php';


        if (isset($_SESSION["user"])) {



            $user = $_SESSION['user'];
            $conn = Database::user();



        } else {



            $user = null;
            $conn = Database::guest();



        }

        //ERROR HANDLERS 
        // L'attributo required nelle tag HTML può essere rimosso lato frontend e bypassato
        
        $errors = [];
        if (is_input_empty($username, $pwd)) {
            
            
            

            $errors["empty_input"] = "Fill in all fields!";

            //echo "empty";
            //print_r($errors);
        } else {
   
            $result = get_user($conn, $username);
            print_r ($result);
            

            if (is_username_wrong($result)) {
                $errors["login_incorrect"] = "Incorrect login info!";
            }

            if (!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
                $errors["login_incorrect"] = "Incorrect login info!";
            }
        }
        

        require_once "../config_session.inc.php";
        

        if ($errors) {

            $_SESSION["errors_login"] = $errors;


            header("Location: ../signup/signup_page.php");
            die();
        }


        //https://youtu.be/XDz9SMYyTQo?t=1290
        $newSessionId = session_create_id(); //non rigenera l'esistente ma lo ricrea
        session_id($newSessionId); //set the session id 


        $_SESSION['user'] = [

            'id_utente' => $result['id_utente'], //chiavi: colonne
            'nickname' => $result['nickname'],
            'nome' => $result['nome'],
            'cognome' => $result['cognome'],
            'email' => $result['email'],

        ];


        //$_SESSION["user_username"] = htmlspecialchars($result["username"]); //nome da mostrare sul sito viene sanitazzazione dell output
        $_SESSION["last_regeneration"] = time(); //sessione appena creata 

        header("Location: ../home/index.php?login=success");

        //best practice
        $pdo = null;
        $statement = null;
        die();


    } catch (Exception $e) {
        die("Query failed: " . $$e->getMessage());
    }
} else { //se il request method non è POST l'utente non è arrivato alla pagina correttamente ...
    header("Location: ../home/index.php");
    die(); // interruzione script ...
}
