<?php

class HomeController extends BaseController
{
		public function index()
		{
				if( isset( $_GET['niz'] ) && preg_match( '/^[a-z]{20}$/', $_GET['niz'] ) )
				{
						$as = new AuthenticationService();
						if( $as->registerUser( $_GET[ 'niz' ] ) === false )
								$message['error'] = "This registration sentence doesn't belong to one and only one user!";
						else
								$message['error'] = "You've just registered!";
				}

				$this->registry->template->show( 'home_index' );
		}

		public function login()
		{
				$message = [];
				if( isset( $_POST[ 'username' ] ) && isset( $_POST[ 'password' ] ) )
				{
						if( preg_match( '/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'] ) ){
								$as = new AuthenticationService();

								$user = $as->validateUser( $_POST["username"], $_POST["password"]);

								if( gettype($user) !== 'int' )
								{
									$_SESSION[ 'user_id' ] = $user->id;
									$_SESSION[ 'username' ] = $user->username;
									$message['error'] = "";
								}

								else
									switch( $user )
									{
											case 0:
													$message['error'] = "Nonexisting username!";
													break;
											case -1:
													$message['error'] = "Wrong password!";
													break;
											case -2:
													$message['error'] = "You haven't registered yet!";
									}
						}
						else
							$message['error'] = "Incorrect username (allowed only letters, numbers and underscore, 15 characters max)!";
						homeController::sendJSONandExit($message);
				}
				else
						$this->registry->template->show( 'login_index' );
		}

		public function signup()
		{
				if( isset( $_POST[ 'signup' ] ) )
				{
						if( isset( $_POST[ 'username' ] ) && isset( $_POST[ 'password' ] ) && isset( $_POST[ 'email' ] )
						&& $_POST[ 'username' ] != '' && $_POST[ 'password' ] != '' && $_POST[ 'email' ] != '' )
						{
								if( !preg_match( '/^[a-zA-Z]{3,10}$/', $_POST['username'] ) )
										$message['error'] = "A username must have between 3 and 10 letters!";

								else if( !filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) )
										$message['error'] = "Enter valid e-mail address!";

								else
								{
										$as = new AuthenticationService();

										$user = $as->signupUser( $_POST[ 'username' ], $_POST[ 'password' ], $_POST[ 'email' ] );

										switch( $user )
										{
												case 0:
														$message['error'] = "Entered username or e-mail address already exists!";
														break;
												case -1:
														$message['error'] = "E-mail couldn't have been sent!";
														break;
												case 1:
														$message['error'] = 'You\'ve just signed up!';
														break;
										}
								}

						}
						else
								$message['error'] = "Enter username, password and e-mail address!";
				}
				else
				{
						if( isset( $_SESSION[ 'username' ] ) )
						{
								header( 'Location: ' . __SITE_URL . '/index.php?rt=home' );
								exit();
						}
				}
				$this->registry->template->show( 'signup_index' );
				exit();
		}

		public function logout()
		{
				session_unset();
				session_destroy();

				header( 'Location: ' . __SITE_URL . '/index.php?rt=home' );
				exit();
		}

		public function sendJSONandExit( $message ) {
				header( 'Content-type:application/json;charset=utf-8' );
				echo json_encode( $message );
				flush();
				//exit( 0 );
		}
};

?>
