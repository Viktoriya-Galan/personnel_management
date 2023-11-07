<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmployeesModel;
use App\Models\PositionsModel;
use App\Models\RatingsModel;
use App\Models\EmploymentStatusesModel;
use App\Models\DepartmentsModel;
use App\Models\TradeObjectsModel;

class Employees extends BaseController
{
    public function getIndex()
    {
        $employeeModel = Model(EmployeesModel::class);
        $positionModel = Model(PositionsModel::class);
        $ratingModel = Model(RatingsModel::class);
        $employmentStatusModel = Model(EmploymentStatusesModel::class);
        $departmentsModel = model(DepartmentsModel::class);
        $tradeObjectsModel = model(TradeObjectsModel::class);
         
        $employees = $employeeModel->getEmployees();
        $positions = $positionModel->findAll(); // Отримуємо всі позиції
        $employmentStatus = $employmentStatusModel->findAll(); // Отримуємо всі позиції
        $departments = $departmentsModel->findAll();
        $tradeObjects = $tradeObjectsModel->findAll();
        
        $data['employees'] = $employees;
        $data['positions'] = $positions;
        $data['employmentStatus'] = $employmentStatus;
        $data['departments'] = $departments;
        $data['tradeObjects'] = $tradeObjects;


           // РОЗРАХУНОК СЕРЕДНЬОЇ ОЦІНКИ ПРАЦІВНИКА
    $employeeRatings = [];
    foreach ($employees as $employee) {
        $employee_id = $employee['employee_id'];
        $averageRating = $ratingModel
            ->select('AVG(rating) as average_rating')
            ->where('employee_id', $employee_id)
            ->get()
            ->getRowArray();

        $employeeRatings[$employee_id] = $averageRating['average_rating'];
    }

    $data['employeeRatings'] = $employeeRatings;

           //////////////////////////////////////////////


        $data['title'] = 'Список працівників';
        return view('templates/header', $data)
            . view('employees/index', $data)
            . view('templates/footer');
    }
    

    public function getCreate(){
        helper("form");
        $data["title"]="Новий працівник";

        $positionModel = Model(PositionsModel::class);
        $employmentStatusModel = Model(EmploymentStatusesModel::class);
        $departmentsModel = model(DepartmentsModel::class);
        $tradeObjectsModel = model(TradeObjectsModel::class);

        $employmentStatus = $employmentStatusModel->findAll(); // Отримуємо всі позиції
        $departments = $departmentsModel->findAll();
        $tradeObjects = $tradeObjectsModel->findAll();
        $position = $positionModel->findAll(); // Отримуємо всі доступні посади

        $data['positions']=$position; // Передаємо дані про посади в представлення у форму
        $data['employmentStatus'] = $employmentStatus;
        $data['departments'] = $departments;
        $data['tradeObjects'] = $tradeObjects;

        return view('templates/header', $data)
        .view('employees/create', $data)
        .view('templates/footer');
    }
    public function postCreate(){
        helper('form');
        $employeeModel = Model(EmployeesModel::class);
        //$positionModel = Model(PositionsModel::class);
       // $positions = $positionModel->findAll();

       $post=$this->request->getPost(
        ["last_name", 
        "first_name", 
        "middle_name", 
        "date_of_birth", 
        "address", 
        "phone", 
        "hire_date",
        "company", 
        "position_id", 
        "employment_status_id", 
        "department_id", 
        "trade_object_id",
         "notes"]);
      
        $rules=[
           "last_name" => "required|min_length[3]|max_length[50]",
           "first_name" => "required|min_length[3]|max_length[50]",
           "middle_name" => "required|min_length[3]|max_length[50]",
           "date_of_birth" => "required",
           "address" => "required",
           "phone" => "required|integer",
           "hire_date" => "required",
           "trade_object_id" => "required",
        
       ];
if(!$this->validateData($post,$rules)){
    $data["title"]="Невірні данні";
    return view('templates/header', $data)
    .view('employees/create')
    .view('templates/footer');
}
$data["title"]="Новий працівник доданий";
$employeeModel->save($post);
return view('templates/header', $data)
    .view('employees/success', $data)
    .view('templates/footer');
    }

public function getEdit($employee_id ){
    $employeeModel = Model(EmployeesModel::class);
    $positionModel = Model(PositionsModel::class);

    $positionModel = Model(PositionsModel::class);
    $employmentStatusModel = Model(EmploymentStatusesModel::class);
    $departmentsModel = model(DepartmentsModel::class);
    $tradeObjectsModel = model(TradeObjectsModel::class);

    $employmentStatus = $employmentStatusModel->findAll(); // Отримуємо всі позиції
    $departments = $departmentsModel->findAll();
    $tradeObjects = $tradeObjectsModel->findAll();
    $position = $positionModel->findAll(); // Отримуємо всі доступні посади

    $data['positions']=$position; // Передаємо дані про посади в представлення у форму
    $data['employmentStatus'] = $employmentStatus;
    $data['departments'] = $departments;
    $data['tradeObjects'] = $tradeObjects;



    $data["title"]="Редагувати працівника";
    $data["employee"]=$employeeModel->find($employee_id);
    return view('templates/header', $data)
    .view('employees/edit', $data)
    .view('templates/footer');
}

public function postEdit($employee_id){
    helper('form');
    $employeeModel = Model(EmployeesModel::class);
    //$positionModel = Model(PositionsModel::class);

    $data['employees']=$employeeModel ->getEmployees();

    $post = $this->request->getPost(
        ["last_name", "first_name", "middle_name", "date_of_birth", "address", "phone", "hire_date", "company", "position_id", "employment_status_id", "department_id", "trade_object_id","average_rating_id","notes"]
    );
    $validation = \Config\Services::validation();
    $validation->setRules([
        'last_name' => 'required|min_length[3]|max_length[50]',
        'first_name' => 'required|min_length[3]|max_length[50]',
        'middle_name' => 'required|min_length[3]|max_length[50]',
        'date_of_birth' => 'required',
        'address' => 'required',
        'phone' => 'required|integer',
        'hire_date' => 'required',
    ]);
    if (!$validation->withRequest($this->request)->run()) {
        // Валідація не пройшла, виводимо помилки
        $data['validation'] = $validation;
        // відображаємо  на формі редагування
        return view('templates/header', $data)
            . view('employees/edit', $data)
            . view('templates/footer');
    }
    $post = $this->request->getPost([
        'last_name', 'first_name', 'middle_name', 'date_of_birth', 'address', 'phone', 'hire_date', 'company', 'position_id', 'employment_status_id', 'department_id', 'trade_object_id', 'average_rating_id', 'notes',
    ]);
    $employeeModel->update($employee_id, $post);


    $data["title"]="Редагування даних працівника";
    $data["massage"] = "Редагування даних працівника Успішне";

    return view('templates/header', $data)
        .view('employees/successEdit', $data)
        .view('templates/footer');


       
        $data['title'] = 'Редагування даних працівника';
        $data['massage'] = 'Редагування даних працівника Успішне';
        return view("templates/header",$data)
            .view("employees/successEdit")
            .view("templates/footer");
   }


}