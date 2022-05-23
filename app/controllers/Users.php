<?php

class Users extends Controller {

    public function __construct() {

        $this->userModel = $this->model('User');
    }

    public function register() {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'first_name_err' => '',
                'last_name_err' => '',
                'username_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];

            if(empty($data['first_name'])) {
                $data['first_name_err'] = 'This field cannot be empty';
            }

            if(empty($data['last_name'])) {
                $data['last_name_err'] = 'This field cannot be empty';
            }

            if(empty($data['username'])) {
                $data['username_err'] = 'This field cannot be empty';
            }

            if(empty($data['email'])) {
                $data['email_err'] = 'This field cannot be empty';
            }

            if($this->userModel->findUserByEmail($data['email'])) {
                $data['email_err'] = 'The E-Mail already Exists';
            }

            if(empty($data['password'])) {
                $data['password_err'] = 'This field cannot be empty';
            }elseif (strlen($data['password']) < 6) {
                $data['password'] = 'The password has to be 6 characters long';
            }

            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'This field cannot be empty';
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = "Passwords do not match";
            }

            if(empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['username_err']) && empty($data['email_err']) &&empty($data['password_err']) && empty($data['confirm_password_err'])) {

                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if($this->userModel->register($data)) {

                    redirect('users/login');

                }else {
                    die('An error occured. Please try again');
                }

            }else {

                $this->view('users/register', $data);
            }

        }else {

            $data = [
                'first_name' => '',
                'last_name' => '',
                'username' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'first_name_err' => '',
                'last_name_err' => '',
                'username_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];
            $this->view("users/register", $data);
        }
    }

    public function login() {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            if(empty($data['email'])) {
                $data['email_err'] = 'This field cannot be empty';
            }

            if(empty($data['password'])) {
                $data['password_err'] = 'This field cannot be empty';
            }

            if($this->userModel->findUserByEmail($data['email'])) {

                //User found
            }else {
                $data['email_err'] = 'No user found';
            }

            if(empty($data['password_err']) && empty($data['email_err'])) {

                $loggedInUser = $this->userModel->login($data['password'], $data['email']);

                if($loggedInUser) {
                    $this->createSession($loggedInUser);
                }else {
                    die("Error");
                }
            }else {

                $this->view('uses/login', $data);
            }

        }else {

            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            $this->view('users/login', $data);
        }
    }

    public function createSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_first_name'] = $user->first_name;
        $_SESSION['user_last_name'] = $user->last_name;
        $_SESSION['user_name'] = $user->username;
        $_SESSION['user_email'] = $user->email;
        redirect('jobs/home');
    }
}