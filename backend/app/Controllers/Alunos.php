<?php

namespace App\Controllers;

//use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\AlunoModel;

class Alunos extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    use ResponseTrait;
    public function index()
    {
        $model = new AlunoModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $model = new AlunoModel();
        $data = $model->find(['id'  => $id]);

        if (!$data)
            return $this->failNotFound('No Data Found');

        return $this->respond($data[0]);
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        helper(['form']);

        $rules = [
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'foto' => 'required'
        ];
        $data = [
            'nome' => $this->request->getVar('nome'),
            'email' => $this->request->getVar('email'),
            'telefone' => $this->request->getVar('telefone'),
            'endereco' => $this->request->getVar('endereco'),
            'foto' => $this->request->getVar('foto')
        ];

        if(!$this->validate($rules))
            return $this->fail($this->validator->getErrors());

        $model = new AlunoModel();
        $model->save($data);
        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Data Inserted'
            ]
        ];

        return $this->respondCreated($response);
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

// Função de atualização de dados
    public function update($id = null)
    {
        helper(['form']);

        $rules = [
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'foto' => 'required'
        ];

        if(!$this->validate($rules))
            return $this->fail($this->validator->getErrors());

        $model = new AlunoModel();
        $data = [
            'nome' => $this->request->getVar('nome'),
            'email' => $this->request->getVar('email'),
            'telefone' => $this->request->getVar('telefone'),
            'endereco' => $this->request->getVar('endereco'),
            'foto' => $this->request->getVar('foto')
        ];

        $checkAluno = $model->find($id);
        if(!$checkAluno)
            return $this->failNotFound('No Data Found with id '.$id);

        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];

        return $this->respond($response);
    }

    // Função para deletar dados
    public function delete($id = null)
    {
        $model = new AlunoModel();
        $data = $model->find($id);

        if(!$data)
            return $this->failNotFound('No Data Found with id '.$id);

        $model->delete($id);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data Deleted'
            ]
        ];

        return $this->respondDeleted($response);
    }
}
