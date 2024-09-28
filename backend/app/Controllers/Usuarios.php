<?php

namespace App\Controllers;


use CodeIgniter\RESTful\ResourceController;
use Exception;

class Usuarios extends ResourceController
{
    private $usuarioModel;

    public function __construct(){
        $this->usuarioModel = new \App\Models\UsuarioModel();
    }

    // metodo para criar um usuario
    public function create()
    {
        try {
            $input = $this->request->getJSON(true);

            if (!$input) {
                return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'JSON inválido ou malformado']);
            }

            $requiredFields = ['nome', 'senha'];
            foreach ($requiredFields as $field) {
                if (!isset($input[$field]) || empty($input[$field])) {
                    return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => "Campo '$field' é obrigatório e não pode ser vazio"]);
                }
            }

            $data = [
                'nome' => $input['nome'],
                'senha' => password_hash($input['senha'], PASSWORD_BCRYPT)  // Hash da senha antes de salvar
            ];

            if ($this->usuarioModel->insert($data)) {
                return $this->response->setStatusCode(201)->setJSON(['status' => 'success', 'message' => 'Usuário criado com sucesso']);
            } else {
                return $this->response->setStatusCode(500)->setJSON(['status' => 'error', 'message' => 'Falha ao criar o usuário']);
            }
        } catch (Exception $e) {
            return $this->response->setStatusCode(500)->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    //metodo para validar o usuario
    public function login()
    {
        try {
            $input = $this->request->getJSON(true);

            if (!$input) {
                return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'JSON inválido ou malformado']);
            }

            $requiredFields = ['nome', 'senha'];
            foreach ($requiredFields as $field) {
                if (!isset($input[$field]) || empty($input[$field])) {
                    return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => "Campo '$field' é obrigatório e não pode ser vazio"]);
                }
            }

            $nome = $input['nome'];
            $senha = $input['senha'];

            $user = $this->usuarioModel->where('nome', $nome)->first();

            if (!$user) {
                return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Nome ou senha incorretos']);
            }

            // Verifique se a senha fornecida corresponde ao hash armazenado
            if (!password_verify($senha, $user['senha'])) {
                return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Senha incorreta']);
            }

            return $this->response->setStatusCode(200)->setJSON(['status' => 'success', 'message' => 'Login realizado com sucesso', 'data' => ['user_id' => $user['id'], 'nome' => $user['nome']]]);
        } catch (Exception $e) {
            return $this->response->setStatusCode(500)->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
