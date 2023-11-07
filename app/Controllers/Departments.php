<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DepartmentsModel;

class Departments extends BaseController
{
    public function getIndex()
    {
        $departmentsModel = model(DepartmentsModel::class);
        $data = [
            'departments' => $departmentsModel ->findAll(),
            'title' => 'Список відділів',
        ];

        return view('templates/header', $data)
            . view('departments/index', $data)
            . view('templates/footer');
    }
public function getCreate(){
    helper ('form');
    $data['title'] = 'Додати відділ';
    $departmentsModel = model(DepartmentsModel::class);
    $departments = $departmentsModel->findAll();
    $data['departments'] = $departments;
    return view('templates/header', $data)
    .view('departments/create', $data)
    .view('templates/footer');
}

public function postCreate(){
    helper('form');
    $departmentsModel = model(DepartmentsModel::class);
    
    $post = $this-> request->getPost([
        "department_id ",
        "department_name",
    ]);
    $rules=[
        "department_name"=>"required",
    ];
    if(!$this->validateData($post,$rules)){
        $data["title"]="Невірні данні";
        return view('templates/header', $data)
        .view('departments/create', $data)
        .view('templates/footer');
    }
    $data["title"]="Відділ додан";
    $departmentsModel->save($post);
    return view('templates/header', $data)
    .view('departments/success', $data)
    .view('templates/footer');
}

}
