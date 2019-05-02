<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->nome('home');
	}

	public function nome($page)
	{
		switch ($page) {
			case 'home':
				$data['title'] = 'Donny Archanjo Atelier';
				$data['slug'] = '';
				$data['description'] = '';
				$data['image'] = 'assets/images/home/og-image.jpg';
				break;
            case 'atelier':
				$data['title'] = 'O Atelier';
				$data['slug'] = 'atelier';
				$data['description'] = '';
				$data['image'] = 'assets/images/atelier/og-image.jpg';
				break;
           case 'tendencias':
				$data['title'] = 'Tendências';
				$data['slug'] = 'tendencias';
				$data['description'] = '';
				$data['image'] = 'assets/images/tendencias/og-image.jpg';
				break;
           case 'colecoes':
				$data['title'] = 'Coleções';
				$data['slug'] = 'colecoes';
				$data['description'] = '';
				$data['image'] = 'assets/images/colecoes/og-image.jpg';
				break;
           case 'contato':
				$data['title'] = 'Contato';
				$data['slug'] = 'contato';
				$data['description'] = '';
				$data['image'] = 'assets/images/contato/og-image.jpg';
				break;
			default:
				$data['title'] = 'Donny Archanjo Atelier';
				$data['slug'] = 'home';
				$data['description'] = '';
				$data['image'] = 'assets/images/og-image.jpg';


				break;
		}
		$this->load->view('template/header',$data);
		$this->load->view($page);
		$this->load->view('template/footer');
	}

}

/* End of file Page.php */
/* Location: ./application/controllers/Page.php */