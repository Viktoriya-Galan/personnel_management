<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmploymentStatusesModel;

class EmploymentStatuses extends BaseController
{
    public function getIndex()
    {
        $employmentStatusModel = Model(EmploymentStatusesModel::class);
        $data = [
            'employmentStatuses' => $employmentStatusModel ->findAll(),
            'title' => 'Список статусів зайнятост',
        ];

        return view('templates/header', $data)
            . view('statuses/index', $data)
            . view('templates/footer');
    }
}
