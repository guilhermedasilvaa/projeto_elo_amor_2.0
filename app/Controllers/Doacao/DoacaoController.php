<?php

namespace App\Controllers\Doacao;

use App\Controllers\BaseController;
use App\Models\TbDoacao;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TbUsuario;

class DoacaoController extends BaseController
{
    public $json_response = array();
    protected $tb_usuario, $p_nomeusu, $p_imgusu, $tb_doacao;

    public function __construct()
    {
        $this->json_response['success'] = false;
        $this->json_response['close'] = false;
        $this->p_nomeusu = $_SESSION['p_nomeusu'];
        $this->p_imgusu = $_SESSION['p_imgusu'];
        $this->tb_doacao = new TbDoacao();
    }
    public function index()
    {
        $this->mtc_acao_principal();
    }

    public function mtc_acao_principal()
    {
        $data['P_NOMEUSU'] = $this->p_nomeusu;
        $data['P_IMGUSU'] = $this->p_imgusu;

        $arrDataPage = array(
            'title' => 'Tela Principal',
            'breadcrumb' => 'doacao/breadcrumb/v_breadcrumb_doacao',
            'body_target' => 'doacao/v_principal',
            'controller' => 'mtc_acao_principal',
            'data' => $data
        );

        echo view('v_index', $arrDataPage);
    }

    public function mtc_donations()
    {
        $result = $this->tb_doacao->select('*')->where('ID_USU_TRANS', NULL)->findAll();
        // var_dump(value: $result);die;

        return $this->response->setJSON($result); 
    }

    public function mtc_cad_doacao()
   {
        $img = $this->request->getFile('txt_doaimg'); // 'imagem' é o nome do input

        if ($img->isValid() && !$img->hasMoved()) {
            // Define o caminho onde a imagem será salva
            $newName = $img->getRandomName();
            $img->move(FCPATH.'assets/images/uploads', $newName); // Exemplo: salva em 'writable/uploads/'
        }

        $data = 
        [
            "DOANOME" => $this->request->getPost('txt_doanome'),
            "DOAQNT" => $this->request->getPost('txt_doaqtd').$this->request->getPost('txt_doa_tipo_quantidade'),
            "DOAEND" => $this->request->getPost('txt_doaend'),
            "DOADTA" => $this->request->getPost('txt_doadta'),
            "DOAFLEX" => $this->request->getPost('txt_doaflex'),
            "DOAIMG" => $newName,
            "DOADESC" => $this->request->getPost('txt_doadesc'),
            "ID_USU_DOA" => $_SESSION['p_idusu'],
            "ID_USU_TRANS" => $this->request->getPost('txt_usu_trans'),
        ];
        $this->db->transBegin();
       
            $this->tb_doacao->save($data);

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
                
            } 
            return $this->json_response;
    }
        
}
