<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TbUsuario;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\URI;
use CodeIgniter\Model;

class C_Access extends BaseController
{

    public $json_response = array();
    protected $tb_usuario, $session, $validation;

    public function __construct()
    {
        $this->json_response['success'] = false;
        $this->json_response['close'] = false;
        $this->session = session();
        $this->tb_usuario = new TbUsuario();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        echo view('v_login');
    }

    public function mtc_cadusu()
    {
        $response = array();
        $response['success'] = false;
        $w_pass = f_senha($this->request->getPost('txt_cad_email'), $this->request->getPost('txt_cad_password'));
        $data = [
            'nome_usu' => $this->request->getPost('txt_cad_nome'),
            'cep_end_usu' => $this->request->getPost('txt_cad_cep'),
            'end_usu' => $this->request->getPost('txt_cad_end') . $this->request->getPost('txt_cad_nmr'),
            'img_usu' => $this->request->getPost('txt_cad_img'),
            'tel_usu' => $this->request->getPost('txt_cad_tel'),
            'email_usu' => $this->request->getPost('txt_cad_email'),
            'senha_usu' =>$w_pass
        ];


        // verifica se ja exite o email ja esta cadastrado
       $email_verify = $this->tb_usuario->select('email_usu')->where('email_usu', $data['email_usu'])->first();

       if($email_verify)
       {
        return redirect()->route('r_login')->with('errorLofin', 'Email ja cadastrado. Faça Login');
       }
       else
       {
            $this->db->transBegin();
       
            $this->tb_usuario->save($data);

            if($this->db->transStatus() === false)
            {
                $this->db->transRollback();
                $this->json_response['success'] = false;
                $this->json_response['mensagem'] = 'Erro na insersão.';
            }
            else
            {
                $this->db->transCommit();
                $this->json_response['success'] = true;
                $this->json_response['mensagem'] = 'Usuario inserido com sucesso!'; 
                
                $ini_session = $this->mtc_session($this->request->getPost('txt_cad_email'), $w_pass);
                if($ini_session)
                {
                    $response['success'] = true;

                    return $this->mtc_modulo($response);
                }
            }

       }

       return $this->json_response;
    }

    public function mtc_logusu()
    {
        $response = array();
        $response['success'] = false; 

        $validationRules = [
            'txt_log_email' => [
                'label' => 'Email',
                'rules' => 'required'
            ],
            'txt_log_password' => [
            'label' => 'Senha',
            'rules' => 'required'
            ]
            ];

            $this->validation->setRules($validationRules);

            if($this->validation->withRequest($this->request)->run())
            {
                $w_user =$_POST['txt_log_email'];
                $w_pass =$_POST['txt_log_password'];

                $n_pass = f_senha($w_user , $w_pass);

                  // verifica se o email esta correto
                $email_verify = $this->tb_usuario->select('email_usu')->where('email_usu', $w_user)->first();;

                if(!$email_verify)
                {
                    return redirect()->route('r_log_usu')->with('errorLogin', 'Usuario e/ou senha incorretos');
                }

                
                // verifica se ja exite o email esta correto
                $pass_verify = $this->tb_usuario->select('email_usu')->where('senha_usu', $n_pass)->first();

                if(!$pass_verify)
                {
                    return redirect()->route('r_log_usu')->with('errorLogin', 'Usuario e/ou senha incorretos');
                }

                $ini_session = $this->mtc_session($w_user, $n_pass);
                if($ini_session)
                {
                    $response['success'] = true; 

                    return $this->mtc_modulo($response);

                }

                
            }
    }

    public function mtc_logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url());
    }

    public function mtc_modulo($ini_session)
    {
        if($ini_session['success'])
        {
            return redirect()->route('r_principal');
        }
    }

    public function mtc_session($w_user, $n_pass)
    {
        // $response = array();
        $response['success'] = false;

        $result = $this->tb_usuario->mtm_doAccess($w_user, $n_pass);
            

        $errors = array_filter($result);

        if(!empty($errors) && !empty($result))
        {
            $ID_USU = $result[0]->id_usuario;
            $NOME_USU = $result[0]->nome_usu;
            $TEL_USU = $result[0]->tel_usu;
            $CEP_END_USU = $result[0]->cep_end_usu;
            $END_USU = $result[0]->end_usu;
            $IMG_USU = $result[0]->img_usu;
            $PONTO_RET = $result[0]->ponto_ret;
            $SENHA_USU = $result[0]->senha_usu;
            $EMAIL_USU = $result[0]->email_usu;


            $_SESSION['p_idusu'] = trim($ID_USU);
            $_SESSION['p_nomeusu'] = trim($NOME_USU);
            $_SESSION['p_telusu'] = trim($TEL_USU);
            $_SESSION['p_cependusu'] = trim($CEP_END_USU);
            $_SESSION['p_endusu'] = trim($END_USU);
            $_SESSION['p_imgusu'] = trim($IMG_USU);

            $this->session->set(['isLoggedIn' => true]);

            if(!$this->session->has('isLoggedIn'))
            {
                return redirect()->route('r_log_usu')->with('errorLogin', 'Não foi possivel criar a sessão');

            }

            // $response['success'] = true;

            return $response['success'] = true;
        }
    }

}
