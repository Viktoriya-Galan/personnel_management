<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PositionsModel;

class Positions extends BaseController
{
    public function getIndex()
    {
        $positionModel = model(PositionsModel::class);
        $data = [
            'positions' => $positionModel->findAll(),
            'title' => 'Список посад',
        ];

        return view('templates/header', $data)
            . view('positions/index', $data)
            . view('templates/footer');
    }

    public function getCreate()
    {
        helper('form');
        $data['title'] = 'Додати посаду';
        $positionModel = model(PositionsModel::class);
        $positions = $positionModel->findAll();
        $data['positions'] = $positions;
        return view('templates/header', $data)
            . view('positions/create', $data)
            . view('templates/footer');
    }

    public function postCreate()
    {
        
        helper('form');
        $positionModel = model(PositionsModel::class);
        $post = $this->request->getPost([
            'position_id',
            'position_name',
            'position_description',
        ]);

        $rules=[
            'position_name' => 'required',
        ];
        if(!$this->validateData($post,$rules)){
            $data["title"]="Невірні данні";
            return view('templates/header', $data)
            .view('positions/create', $data)
            .view('templates/footer');
    }
    $data["title"]="Відділ додан";
    $positionModel->save($post);
    return view('templates/header', $data)
    .view('positions/success', $data)
    .view('templates/footer');

}
}