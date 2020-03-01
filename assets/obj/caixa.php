<?php

class Caixa{
	public $DOM;
	private $title;
	private $icon;
	private $body;
	private $footer;

	public function __construct($title, $icon){
		$this->title = $title;
		$this->icon  = $icon;
		$this->renderDOM();
	}

	private function renderDOM(){
		$this->DOM = "<div class='caixa'>
						<header>
							<h2>".$this->title."</h2>
							<span><i class='".$this->icon."'></i></span>
						</header>
						<section>
							".$this->body."
						</section>
						".$this->footer."
					</div>";
	}

	public function fillFooter($type, $content){
		if ($type == '1') {
			$this->footer = "<footer>".$content."</footer>";
		} else if ($type == '2') {
			if ($content['blank'] == true) {
				$blank = "target='_blank'";
			}
			$this->footer = "<footer><a href='".$content['link']."' $blank>".$content['text']."</a></footer>";
		} else if ($type == '3'){
			
		}

		$this->renderDOM();
	}

	public function fillBody($type, $content){
		if ($type == '1') {
			$this->body = $content;
		} else if ($type == '2'){
			$count = count($content);
			if (!empty($content['th'])) {
				$cels = explode("|", $content['th']);
				$count_cels = count($cels);

				$table .= "<tr>";
				for ($i=0; $i < $count_cels; $i++) { 
					$table .= "<th>".$cels[$i]."</th>";
				}
				$table .= "</tr>";
			}

			if (isset($content['th'])) {
				$count--;
			}
			
			for ($i=0; $i < $count; $i++) {
				$cels = explode("|", $content[$i]);
				$count_cels = count($cels);

				$table .= "<tr>";
				for ($h=0; $h < $count_cels; $h++) { 
					$table .= "<td>".$cels[$h]."</td>";
				}
				$table .= "</tr>";
			}

			$this->body = "<table class='caixa-table'>".$table."</table>";
		} else if ($type == '3'){
			$form = "<form action='".$content["action"]."' id='".$content["id"]."' method='".$content["method"]."' onsubmit=\"".$content["buttonId"].".value='".$content["loadText"]."'; ".$content["buttonId"].".disabled=true;\">";
			for ($i=0; $i < $content["countRows"]; $i++) { 
				$form .= "<div class='linha'>";
					for ($m=0; $m < $content[$i]["countCels"]; $m++) {
						if ($content[$i][$m]['required']) {
							$required = "required";
						} else {
							$required = "";
						}
						if (!$content[$i][$m]['autoComplete']) {
							$autocomplete = "autocomplete='off'";
						} else {
							$autocomplete = "";
						}
						$form .= "<div class='celula'>
									<label for='".$content[$i][$m]['id']."'>".$content[$i][$m]['labelText']."</label>
									<input class='input-generico ".$content[$i][$m]['extraClass']."' type='".$content[$i][$m]['type']."' name='".$content[$i][$m]['name']."' value='".$content[$i][$m]['value']."' ".$required." ".$autocomplete.">
								</div>";
					}
				$form .= "</div>";
			}
			$form .= "</form>";
		}
		$this->body = $form;
		$this->renderDOM();
	}
}

?>