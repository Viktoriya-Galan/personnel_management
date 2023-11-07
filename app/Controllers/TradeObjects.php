<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TradeObjectsModel;

class TradeObjects extends BaseController
{
    public function getIndex()
    {
        $tradeObjectsModel = model(TradeObjectsModel::class);
        $data = [
            'tradeObjects' => $tradeObjectsModel ->findAll(),
            'title' => 'Список торгівельних обєктів',
        ];

        return view('templates/header', $data)
            . view('tradeObjects/index', $data)
            . view('templates/footer');
    }

public function getCreate()
{
    helper('form');
    $data['title'] = 'Додати торгівельний обєкт';
    $tradeObjectsModel = model(TradeObjectsModel::class);
    $tradeObjects = $tradeObjectsModel->findAll();
    $data['tradeObjects'] = $tradeObjects;
    return view('templates/header', $data)
        . view('tradeObjects/create', $data)
        . view('templates/footer');
}

public function postCreate()
{
    helper("form");
    $tradeObjectsModel = model(TradeObjectsModel::class);
    $post = $this->request->getPost([
        'trade_object_id',
        'object_name',
        'address',
    ]);
    $rules=[
        'object_name' => 'required',
    ];
    if(!$this->validateData($post,$rules)){
        $data["title"]="Невірні данні";
        return view('templates/header', $data)
        .view('tradeObjects/create', $data)
        .view('templates/footer');
}
$data["title"]="обєкт додан";
$tradeObjectsModel->save($post);
return view('templates/header', $data)
.view('tradeObjects/success', $data)
.view('templates/footer');
}

}
