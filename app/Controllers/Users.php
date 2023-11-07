<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        //
    }
    public function getRegistration(){
        helper("form");
    
        $data['title'] = 'Реєстрація нового користувача';
        return view("templates/header",$data)
    .view("users/registration")
    .view("templates/footer");
    }
    
    public function postregistration(){
        helper('form');
        $userModel = Model(UserModel::class);
        $post = $this->request->getPost(['login','password','email']);
      $rules = [
        'login' => 'required|max_length[255]',
        'password' => 'required|max_length[128]|regex_match[/(?=.*[a-z])(?=.*[A-Z]).+/]',
        'email' => 'required|max_length[255]',
    ];
    
        if(!$this->validateData($post, $rules)){
    $data["title"]='Реєстрація нового користувача:';
    return view("templates/header",$data)
    .view("users/registration")
    .view("templates/footer");
    }
    
    $hashPassword = $userModel->hashPassword($post['password']);
    $post["password"] = $hashPassword;
    $userModel->save($post);
    $data["title"] = 'Користувача зареєстровано';
    $data["message"] = 'Ваша реєстрація пройшла успішно';
    return view("templates/header",$data)
    .view("users/successregistration")
    .view("templates/footer");
    }
    
    public function getLogin(){
        helper ("form");
        $data ['title']=  'Увійдіть в свій аккаунт';
        return view("templates/header",$data)
    .view("users/login")
    .view("templates/footer");
    }
    
    
    public function postLogin(){
        helper ("form");
        $userModel = Model(UserModel::class);
        $post = $this->request->getPost(['login','password']);
        $rules=[
            'login' => 'required|max_length[255]',
            'password' => 'required|max_length[128]',
        ];
        if (!$this->validateData($post,$rules)) {
            $data['title']='log in';
            return view ('templates/header',$data )
            .view ( 'users/login')
            .view ( 'templates/footer' );
    }
    $isCorrect = $userModel->checkloginPassword($post['login'], $post['password']);
    if($isCorrect){
        $data['title'] = 'Вхід здійснено успішно';
        return view ('templates/header',$data )
        .view ( 'users/successLogin')
        .view ( 'templates/footer' );
    }else{
    $data['title'] = 'Не вірний логін або пароль';
    return view ('templates/header',$data )
        .view ( 'users/notsuccessLogin')
        .view ( 'templates/footer' );
    }}
    public function getlogout(){
        if (isset($_COOKIE['user_login']) && isset($_COOKIE['role'])){
            $login = $_COOKIE['user_login'];
            $role = $_COOKIE['role'];
            setcookie('user_login', $login, time() - 60 * 60 * 2, '/');
            setcookie('role', $role, time() - 60 * 60 * 2, '/');
            echo "You are logged out"; // Повідомлення про вихід
        }
        return redirect()->to('/users/login');
    }
}
