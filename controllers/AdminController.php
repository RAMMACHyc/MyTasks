<?php
class AdminController{

    public function admin(){
        if(isset($_POST['submit'])){
            $data['email'] = $_POST['email'];
            $result = user::moderat($data);
            if($result->email === $_POST['email']  && password_verify($_POST['password'],$result->password)){

                $_SESSION['logged'] = true;
                $_SESSION['email'] = $result->email;

                Redirect::to('index');

            }else{
                Session::set('error','<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                          <strong class="font-bold">Im sorry!</strong>
                         <span class="block sm:inline">Email or password is incorrect.</span>
                         <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                          <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                         </span>
                        </div>');
                Redirect::to('login');
            }
        }
    }
    public function register(){
        if(isset($_POST['submit'])){
            $options = [
                'cost' => 12
            ];
            $password = password_hash($_POST['password'],PASSWORD_BCRYPT,$options);
            $data = array(
                'email' => $_POST['email'],
                'username' => $_POST['username'],
                'password' => $password,
            );
            $result = user::createUser($data);
            if($result === 'ok'){
                Session::set('success','<div class="bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full" role="alert">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                </svg>
                Compte crée
              </div>');
                Redirect::to('login');
            }else{
                echo $result;
            }
        }
    }

    static public function logout(){
        session_destroy();
    }


}

?>