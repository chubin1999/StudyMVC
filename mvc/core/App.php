<?php 
class App{
	protected $controller = "Home";
	protected $action = "Sayhi";
	protected $params = [];

	function __construct(){
		$arr= $this->UrlProcess();

		//Xu ly controller
		if(file_exists("./mvc/controllers/".$arr[0].".php")){
			//Gan gia tri cho controller
			$this->controller =$arr[0];
			//Huy arr[0]
			unset($arr[0]);
		}
			// goi den thang controller
		require_once "./mvc/controllers/".$this->controller.".php";

			//Khoi tao doi tuong cho class cua controller
		$this->controller = new $this->controller;

		//Xu ly action
		if(isset($arr[1])){
			if (method_exists($this->controller,$arr[1])) {
				$this->action = $arr[1];
			}
			unset($arr[1]);	
		}

		//Xu ly Params
		$this->params= $arr?array_values($arr):[];


		call_user_func_array([$this->controller,$this->action],$this->params);
	}

	function UrlProcess(){
		if(isset($_GET["url"])){
			return explode("/",filter_var(trim($_GET["url"],"/")) );
			
		}

	}
}

?>
