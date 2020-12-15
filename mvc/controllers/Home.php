<?php 
	class Home extends Controller{
		function Sayhi(){
			//Lay ham cua controler
			$teo= $this->model("SinhvienModel");
			echo $teo->getsv() ;
		}
		function Show($a,$b){
			//Model
			$teo= $this->model("SinhvienModel");
			$tong = $teo->Tong($a,$b);

			//view
			$this->view("aodep",[
				"page"=>"contact",
				"number"=>$tong,
				"mau" => "red"
			]);
		}
	}
?>