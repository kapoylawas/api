<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
 
class Jurusan extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\ModelJurusan';
 
    public function index()
    {
        return $this->respond($this->model->findAll(), 200);
    }

public function create()
{
    $validation =  \Config\Services::validation();
 
    $jurusan   = $this->request->getPost('jurusan');
    // $status = $this->request->getPost('category_status');
     
    $data = [
        'jurusan' => $jurusan
        // 'category_status' => $status
    ];
     
    if($validation->run($data, 'jurusan') == FALSE){
        $response = [
            'status' => 500,
            'error' => true,
            'data' => $validation->getErrors(),
        ];
        return $this->respond($response, 500);
    } else {
        $simpan = $this->model->insertJurusan($data);
        if($simpan){
            $msg = ['message' => 'Created category successfully'];
            $response = [
                'status' => 200,
                'error' => false,
                'data' => $msg,
            ];
            return $this->respond($response, 200);
        }
    }
}
}