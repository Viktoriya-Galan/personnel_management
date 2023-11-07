<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RatingsModel;
use App\Models\EmployeesModel;




class Ratings extends BaseController
{
    public function getIndex()
    {
        $ratingModel = Model(RatingsModel::class);
        $employeeModel = Model(EmployeesModel::class);
        
        $employees = $employeeModel->findAll();
        $data['employees'] = $employees;
 
        $data['ratings'] = $ratingModel->getRatings();
        $data['title'] = 'Рейтинг працівників';

        return view('templates/header', $data)
            . view('rating/index', $data)
            . view('templates/footer');
    }


public function getCreate(){
    helper ('form');
    $data['title'] = 'Додати оцінку працівникіа';

    $employeeModel = Model(EmployeesModel::class);
    $employees = $employeeModel->findAll();// Отримуємо всі доступні працівники

    $data['employees'] = $employees;
    

    return view('templates/header', $data)
    .view('rating/create', $data)
    .view('templates/footer');
}

public function postCreate(){
    helper ('form');
    $employeeModel = Model(EmployeesModel::class);
    $ratingModel = Model(RatingsModel::class);

    $employees = $employeeModel->findAll();
    $data['employees'] = $employees;


    $post = $this-> request->getPost([
        "rating_id",
        "employee_id",
        "rating",
        "rating_date",
    ]);
$rules=[
    "rating"=>"required",
    "rating_date"=>"required|date",
];

if(!$this->validateData($post,$rules)){
  $data["title"]="Невірні данні";
  return view('templates/header', $data)
  .view('rating/create', $data)
  .view('templates/footer');
 
}

$data["title"]="Оцінка додана";
$ratingModel->save($post);
return view('templates/header', $data)
.view('rating/success', $data)
.view('templates/footer');
}

public function getDelete($rating_id){
    $employeeModel = Model(EmployeesModel::class);
    $ratingModel = Model(RatingsModel::class);

    $rating= $ratingModel ->getRatings($rating_id);
    $employees = $employeeModel->find($rating['employee_id']);

    $data['rating'] = $rating;
    $data['employees'] = $employees;
    $data['title'] = 'Видалити оцінку';

    return view('templates/header', $data)
   .view('rating/delete', $data)
   .view('templates/footer');
    
}

public function postDelete($rating_id){
    $ratingModel = Model(RatingsModel::class);
    $ratingModel ->delete($rating_id);
    $data['title'] = 'Оцінка видалена';
    $data['massage'] = 'massage Оцінка видалена';
    
    return view('templates/header', $data)
    .view('rating/succesDelete', $data)
    .view('templates/footer');
 
}

}
