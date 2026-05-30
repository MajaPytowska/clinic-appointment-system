<?php

namespace app\controllers;

use core\App;
use app\transfer\VisitReason;
use core\Validator;

class PredefinedVisitReasonManCtrl{
	private $selectedVisitReason;
	private $visitReasons;

	public function __construct(){	
		$this->visitReasons = [];
	}
	private function getURLParams(){
		$v = new Validator();

		$this->selectedVisitReason = $v->validateFromCleanURL(1,[
			'int'=>true,
			'is_numeric' => true,
			'default' => null
		]);
	}

	private function loadVisitReasons(){
		$this->visitReasons = array_map(
		function($visitReason) { return new VisitReason($visitReason); },
		App::getDB()->select('visit_reason', [
			'visit_reason.id_visit_reason(visitReasonId)',
			'visit_reason.name_visit_reason(visitReasonName)',
			'visit_reason.is_enable(isEnable)'
		], [
			'ORDER' => ['visit_reason.name_visit_reason' => 'ASC']
		]));
	}
    
	#region Obsługa akcji

	public function action_showPredefinedVisitReasonsMan(){
		$this->loadVisitReasons();
        $this->generateView();
	}

	public function action_deleteVisitReason(){
		$this->getURLParams();
		if($this->selectedVisitReason){
			App::getDB()->delete('visit_reason',['id_visit_reason'=>$this->selectedVisitReason]);
		}
		App::getRouter()->redirectTo("showPredefinedVisitReasonsMan");
	}

	#endregion

	//Funkcja generująca widok
	private function generateView(){
		App::getSmarty()->assign('visitReasons', $this->visitReasons);
		App::getSmarty()->assign('page_title','Przyczyna wizyty');
        App::getSmarty()->assign('page_description','Edytuj/dodaj predefiniowaną przyczynę wizyty.');
        App::getSmarty()->assign('page_header','Przyczyna wizyty');
		App::getSmarty()->display('PredefinedVisitReasonManView.tpl');	
	}
}