<?php
    class AuthController {
        private $model;
        public function __construct()
        {
            require_once("c://xampp/htdocs/catalogo/models/authModel.php");
            $this->model = new AuthModel();
        }

        // public function login($correo,$pass){
        //     $datos = $this->model->login($correo,$pass);
            
        //     if($datos != false){
        //         header("Location: ../panel.php");
        //     }else{
        //         // session_start();
        //         $_SESSION["mensaje"] = "Usuario o contraseña incorrectas";
        //         header("Location: ../../index.php");
        //     }
        // }

        public function login($usuario,$pass){
            $usuarioCorrecto = "admin";
            $passwordCorrecta = password_hash("admin123", PASSWORD_DEFAULT);

            if($usuarioCorrecto === $usuario){

                if(password_verify($pass,$passwordCorrecta)){
                    session_start();
                    $_SESSION["usuario"] = "Cristian";

                    header("Location: ../panel.php");
                }else{
                    echo "
                    <script language='Javascript'>alert('Contraseña incorrecta :(');location.href = '../login.php';</script>`;";
                }

            }else{
                echo "
                    <script language='Javascript'>alert('Usuario incorrecto :(');location.href = '../login.php';</script>`;";
            }
        }

        public function logout(){
            $this->model->logout();

            // session_start();
            if(!isset($_SESSION["usuario"])){
                header("Location: ../login.php");
            }
        }

        public function isLogged(){
            // session_start();
            if(isset($_SESSION["usuario"])){
                return true;
            }else{
                return false;
                // header("Location: /login-crud/index.php");
            }
        }
    }
?>