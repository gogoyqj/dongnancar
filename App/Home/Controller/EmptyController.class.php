<?php
namespace Home\Common;
use Think\Controller;
class EmptyController extends Controller {
	function __construct() {
		parent::__construct();
		redirect('/');
	}
	public function index()
	{
	}
}