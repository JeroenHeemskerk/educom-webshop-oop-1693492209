<?php
include_once 'sessions.php';
include_once "product.service.php";
include_once "cart.service.php";
$page = GetRequestedPage();
$data = ProcessRequest($page);
ShowResponsePage($data);

function ProcessRequest($page){
    $data['genericErr'] = "";
    switch ($page){
        case 'register':
            include_once 'register.php';
            $data = CheckRegister();
            if($data['registervalid']){
                try{
                StoreUser($data['email'], $data['name'], $data['password'], $data['databaseErr']);
                $page = 'login';
                $data['loginvalid'] = "";
                }
                catch(Exception $e){
                    $data['genericErr'] = 'sorry er is een technische storing1';
                    echo ("Store Userfailed, " . $e->getMessage());
                }
            }
            break;
        case 'login':
            include_once 'login.php';
            $data = CheckLogin();
            if($data['loginvalid']){
                LoginUser($data);
                $page = 'home';
            }
            break;
        case 'logout':
            LogoutUser();
            $page = 'home';
            break;
        case 'changepassword':
            include_once 'changepassword.php';
            $data = ChangePassword();
            if($data['passwordvalid']){
                try{
                UpdatePassword($data['password']);
                $page = 'home';
                }
                catch(Exception $e){
                    $data['genericErr'] = 'sorry er is een technische storing2';
                }
            }
            break;
        case "webshop":
            try {
                 $data['products'] = SearchForProducts();
            } 
            catch (Exception $e) {
                 $data['genericErr'] = "Kan de producten niet ophalen, probeer het later nogmaals";
                 LogDebug("Error collecting products: " . $e -> getMessage());
            }
            handleActions();
            break;
        case "shoppingcart":
            handleActions();
            break;
        case "webshopitem":
            try {
                $productId = GetUrlVar("row"); 
                $data['product'] = SearchForProductById($productId); 
            } 
            catch (Exception $e) {
                 $data['genericErr'] = "Kan dit product niet ophalen, probeer het later nogmaals";
                 LogDebug("Error collecting product with id " . $row . ": " . $e -> getMessage());
            }
            break;
        case "top5":
            try {
                $data['carts'] = SearchForTop5Products();
            } 
            catch (Exception $e) {
                $data['genericErr'] = "Kan de top 5 producten niet ophalen, probeer het later nogmaals";
                echo("Error collecting carts: " . $e -> getMessage());
            }
            break;
    }
    $data['page'] = $page;
    $data['menu'] = array('home' => 'Home', 'about' => 'About', 'contact' => 'Contact', 'webshop' => 'Webshop', 'top5' => "Top 5");
    if (isUserLogIn()) {
        $data['menu']['changepassword'] = "Verander wachtwoord"; 
        $data['menu']['shoppingcart'] = "Shoppingcart"; 
        $data['menu']['logout'] = "Logout " . getLogInUsername(); 
    } else {
        $data['menu']['register'] = "Register";
        $data['menu']['login'] = "Login";
    }
    return $data;
}

function handleActions(){
    $action = GetPostVar("action");
            switch($action){
                case "AddProductToCart":
                    $productId = GetPostVar("productid");
                    AddProductToCart($productId);
                    break;
                case "RemoveProductFromCart":
                    $productId = GetPostVar("productid");
                    RemoveProductFromCart($productId);
                    break;
                case "AddProductToDatabase":
                    AddProductToDatabase();
                    break;
            }
}

function GetRequestedPage(){
    $requested_type = $_SERVER['REQUEST_METHOD']; 
    if ($requested_type == 'POST'){
        $requested_page = GetPostVar('page','home'); 
    }else{
        $requested_page = GetUrlVar('page','home'); 
    } 
    return $requested_page; 
}

function ShowResponsePage($data){
    switch($data['page']){
        case 'about':
            require_once('views/AboutDoc.php');
            $view = new AboutDoc($data);
            break;
        case 'changepassword':
            require_once('views/ChangePasswordDoc.php');
            $view = new ChangePasswordDoc($data);
            break;
        case 'contact':
            require_once('views/ContactDoc.php');
            $view = new ContactDoc($data);
            break;
        case 'home':
            require_once('views/HomeDoc.php');
            $view = new HomeDoc($data);
            break;
        case 'login':
            require_once('views/LoginDoc.php');
            $view = new LoginDoc($data);
            break;
        case 'register':
            require_once('views/RegisterDoc.php');
            $view = new RegisterDoc($data);
            break;
        case 'shoppingcart':
            require_once('views/ShoppingcartDoc.php');
            $view = new ShoppingcartDoc($data);
            break;
        case 'top5':
            require_once('views/Top5Doc.php');
            $view = new Top5Doc($data);
            break;
        case 'webshop':
            require_once('views/WebshopDoc.php');
            $view = new WebshopDoc($data);
            break;
        case 'webshopitem':
            require_once('views/WebshopItemDoc.php');
            $view = new WebshopItemDoc($data);
            break;
    }
    $view->show();
}

function GetArrayVar($array, $key, $default=''){
    return isset($array[$key]) ? $array[$key] : $default;
}

function GetPostVar($key, $default=''){
    return GetArrayVar($_POST, $key, $default);
}

function GetUrlVar($key, $default=''){
    return GetArrayVar($_GET, $key, $default);
}

function BeginDocument(){
    echo '<!doctype html>
    <html>';
}

function ShowHeadSection(){
    echo '<head>
    <link rel="stylesheet" href="CSS/stylesheet.css">
    <title>Stijn\'s webshop</title>
    </head>';
}

function ShowBodySection($data) { 
   echo '    <body>' . PHP_EOL; 
   ShowHeader($data);
   ShowMenu($data); 
   ShowGenericErr($data);
   ShowContent($data); 
   ShowFooter(); 
   echo '    </body>' . PHP_EOL; 
} 

function EndDocument(){
    echo '</html>';
}

function ShowHeader($data){
    switch ($data['page']){
        default:
            echo '<h1>gefaald</h1>';
            break;
        case 'home':
            Echo '<h1>Home</h1>';
            break;
        case 'about':
            Echo '<h1>About</h1>';
            break;
        case 'contact':
            Echo '<h1>Contact</h1>';
            break;
        case 'register':
            Echo '<h1>Register</h1>';
            break;
        case 'login':
            Echo '<h1>Login</h1>';
            break;
        case 'changepassword':
            Echo '<h1>Verander wachtwoord</h1>';
            break;
        case 'webshop':
            Echo '<h1>Webshop</h1>';
            break;
        case 'webshopitem':
            Echo '<h1>Details</h1>';
            break;
        case 'shoppingcart':
            Echo '<h1>Shopingcart</h1>';
            break;
        case 'top5':
            Echo '<h1>Top 5</h1>';
            break;
    }
}

function ShowMenu($data){
    echo '<ul class="menu">';
    foreach($data['menu'] as $link => $label) { showMenuItem($link,$label); }
    echo '</ul>';
}

function Showmenuitem($name, $message, $username = ''){
    echo'<li class="menuitem"><a href="index.php?page=';echo $name; echo'">';echo $message, $username; echo'</a></li>';
}

function ShowGenericErr($data){
    echo '<span class="error">' . $data['genericErr'] . '</span>';
}

function ShowContent($data){
    switch ($data['page']){
        default:
            echo '<a>error 404 pagina niet gevonden</a><br>
            <li class="menuitem"><a href="index.php?page=home">Terug gaan naar de homepagina</a></li>';
            break;
        case 'home':
            require('home.php');
            ShowHomeContent();
            break;
        case 'about':
            require('about.php');
            ShowAboutContent();
            break;
        case 'contact':
            require('contact.php');
            ShowContactContent();
            break;
        case 'register':
            include_once 'register.php';
            ShowRegisterContent($data);
            break;
        case 'login':
            include_once 'login.php';
            ShowLoginContent($data);
            break;
        case 'changepassword':
            include_once 'changepassword.php';
            ShowPasswordContent($data);
            break;
        case 'webshop':
            require('webshop.php');
            ShowWebshopContent($data);
            break;
        case 'webshopitem':
            require('webshopitem.php');
            ShowWebshopItemContent($data);
            break;
        case 'shoppingcart':
            require('shoppingcart.php');
            ShowShoppingCartContent();
            break;
        case 'top5':
            require('top5.php');
            ShowTop5Content($data);
            break;
    }
}

function ShowWebshopContent($data){
    ShowWebshop($data['products']);
};
function ShowTop5Content($data){
    ShowTop5($data['carts']);
}
function ShowWebshopItemContent($data){
    ShowWebshopItem($data['product']);
};
function ShowShoppingCartContent(){
    ShowShoppingCart();
};

function ShowRegisterContent($data){
    if($data['registervalid'] == false){
        ShowRegisterForm($data);
    }
}

function ShowLoginContent($data){
    if($data['loginvalid'] == false){
        ShowLoginForm($data);
    }
}

function ShowPasswordContent($data){
    if($data['passwordvalid'] == false){
        ShowPasswordForm($data);
    }
}

function ShowContactContent(){
    $data = ValidateContact();
    if($data['valid'] == false){
        ShowFormContent($data);
    } else {
        ShowThanksContent($data);
    }
}

function ShowFooter(){
    echo '<footer>
    <p>Copyright &copy; 2023 Stijn Engelmoer</p>
    </footer>';
}
?>