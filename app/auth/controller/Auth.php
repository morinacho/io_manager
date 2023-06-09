<?php  
	class Auth extends Controller{
		private $userModel;

		public function __construct(){
			$this->userModel = $this->model('User','users');
			session_start(); 
		}

		public function login(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
				if(isset($_POST['user-email']) && isset($_POST['user-password'])){
					$email = $_POST['user-email'];
					$pass  = $_POST['user-password'];
					$user  = $this->userModel->getByEmail($email);
					
					if(!empty($user) && password_verify($pass, $user->contrasena)){
						$_SESSION['username'] = "$user->nombres $user->apellido";
						$_SESSION['rol'] = $user->rol_id;
						$_SESSION['userdoc'] = $user->documento;
						redirect('main');
						
					} 
					else{ 
						redirect('login');
					}
				}
				else{
					redirect('login');
				}
			}			
		}

		public function register(){
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])){
				$options =  ['cost' => 12];
				$pass    =  password_hash(trim($_POST['user-password']), PASSWORD_BCRYPT, $options);
				$param   =  [
					'user-nick' 	=> trim($_POST['user-nick']),
					'user-email' 	=> trim($_POST['user-email']),
					'user-password' => $pass
				];
				if($this->userModel->userRecord($param)){
					redirect('home');
				}
				else{
					die("FATAL ERROR");
				}
			}
			else{
				$param = [
					'user-name' 	=> '',
					'user-lastname' => '',
					'user-phone' 	=> '',
					'user-address' 	=> ''
				];
			}

		}
		public function forgotPassword(){
			$this->view("forgot-pass");
		}

		public function logout(){
			session_unset();
        	session_destroy();
        	redirect('home');
		}
	}