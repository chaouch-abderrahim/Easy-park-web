<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>


    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/23412c6a8d.js"></script>

    <!-- Custom Style-->
    
</head>
<style>
    
html, body{
    height: 100%;
    overflow: hidden;
    background-color: antiquewhite;

   
    background-size:cover;
    background-repeat: no-repeat;
}

/* Variables */
:root{
    --primary-gradient: linear-gradient(to right, #4e4376, #2b5876);
    --mango-gradient : linear-gradient(to right, #ffa751, #ffe259);
    --text-color: #F7F9F9;
    --Montserrat: "Montserrat", cursive;
    --Lobster: "Lobster", cursive;
    --primary-shadow: 3px 4px 7px rgba(27, 27, 27, 0.534);
    --border-color: rgba(0,0,0,0.329);
}

.container{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 98%;
    max-height: 610px;
}

.container .panel{
    width: 60%;
    height: 72%;
    box-shadow: var(--primary-gradient);
}

.row{
    display: grid;
    grid-template-columns: 65% 35%;
    height: 100%;
    background: #fff;
}

.liquid{
    background: url('assets/Wave.png');
    background-size: cover;
    background-repeat: no-repeat;
}

.liquid h4{
    text-align: left;
    padding: 0 2rem;
    color: whitesmoke;
    font-family: var(--Montserrat);
}

.owl-carousel{
    width: 100%;
    height: 320px;
    max-height: 330px;
}

.owl-carousel .owl-item .login_img{
    float: right;
    width: 400px;
    height: 300px;
    background-repeat: no-repeat;
    background-size: cover;
    padding-right: 3rem;
}

.owl-dots{
    position: fixed;
    padding: 3rem 1.2rem;
    display: flex !important;
    flex-direction: column;
    transform: translateY(-240px);
}

.owl-dots button{
    border-radius: 5rem;
    margin: .3rem 0;
}

.owl-dots button span{
    background: var(--text-color) !important;
    margin: 0rem .6rem !important;
}

.owl-dots .active{
    border: 1px solid #ffd765 !important;
}

.owl-dots .active span{
    background: #ffd765 !important;
    margin: .3rem .5rem !important;
}

.follow{
    padding: 0 1.4rem;
    padding-top: 1.4rem;
    font-family: var(--Lobster);
    color: whitesmoke;
    position: relative;
    font-size: .9rem;
}

.follow::after{
    content: "";
    position: absolute;
    left: 14%;
    width: 50px;
    border: 1px solid whitesmoke;
    border-radius: 4rem;
    margin-top: .5rem;
}

.follow i:first-child{
    margin-left: 4rem;
}

/* Second Column Login */

.btn{
    padding: .5rem 1.5rem;
    border: none;
    border-radius: 4rem;
    background: #2b5876;
    color: whitesmoke;
    font-size: .7rem;
    font-family: var(--Montserrat);
    box-shadow: var(--primary-shadow);
    cursor: pointer;
}

.login .btn-signup, 
form .btn-login{
    background: var(--primary-gradient);
    float: right;
    margin: 1rem;
}

.titles{
    margin-bottom: 2.2rem;
}

form{
    height: 55%;
    max-height: 280px;
    margin-top: 5.5rem;
}

form h3, form h6{
    font-family: var(--Montserrat);
    padding: 0;
    margin: 0;
    padding-left: 3rem;
}

form h6{
    padding-left: 4.5rem;
    font-family: var(--Lobster);
    color: #444444d2;
}

form .form-group{
    text-align: left;
    border: 1px solid var(--border-color);
    margin-top: .9rem;
    margin-right: 2rem;
    border-radius: 3rem;
}

form .form-group .form-input{
    padding: .5rem 1rem;
    background: transparent;
    border: none;
    font-family: var(--Montserrat);
    font-size: .9rem;
    overflow: hidden;
}

form input:focus{
    outline: none;
}

form .input-icon{
    display: inline;
    color: var(--border-color);
}

form .btn-login{
    float: none;
    padding: .8rem 5rem;
    margin-left: 2rem;
}
</style>

<body>

    <div class="container">
        <div class="panel">
            <div class="row">
                <div class="col liquid">
                    <h4><i class="fas fa-drafting-compass"></i> Easy Park</h4>

                    <!-- Owl-Carousel -->

                    <div class="owl-carousel owl-theme">
                        <img src="assets/undraw_authentication_fsn5.svg" alt="" class="login_img">
                        <img src="assets/undraw_personal_data_29co.svg" alt="" class="login_img">
                        <img src="assets/undraw_fingerprint_swrc.svg" alt="" class="login_img">
                    </div>

                    <!-- /Owl-Carousel -->

                    
                </div>
                <div class="col login">

                    
                    
                        <div class="titles">
                            <h6>We keep everything</h6>
                            <h3>Ready to Login</h3>
                        </div>
                        <h4><?php
                if (!empty($_POST['submit'])) {
                    if (!empty($_POST['nom']) && !empty($_POST['password']) && ($_POST['password'] != "1234" || $_POST['nom'] != "admin")) {
                        echo " Mot de passe ou Nom utilisateur erreur  ";
                    } else if (empty($_POST['nom'])) {
                        echo "entrer le nom d'utilisateur <br/>";
                    } else if (empty($_POST['password'])) {
                        echo "Entrer le Mot de passe ";
                    }
                }


                ?></h4>
                 <form action="{{route('login.login')}}" method="post">
                 @csrf
                        <div class="form-group">
                            <input type="text" placeholder="Email" name="nom" class="form-input">
                            <div class="input-icon">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" name="password" class="form-input">
                            <div class="input-icon">
                                <i class="fas fa-user-lock"></i>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-login">Login</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {

            $('.owl-carousel').owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                items: 1
            });
        });
    </script>
</body>

</html>