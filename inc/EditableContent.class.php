<?php
if(!defined(INDEX_CHECK_LBARMAN) || INDEX_CHECK_LBARMAN != "TRUE")
	die("Hack attempt. Infos logged");

class EditableContent {
	
	private $id;
	private $value;
	
	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param $id the $id to set
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return the $value
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * @param $value the $value to set
	 */
	public function setValue($value) {
		$this->value = $value;
	}


	function __construct($id = NULL, $admin = false, $show=false, $currentpage="home", $textareaCols = TEXTAREA_PAGE_COLS, $textareaRows = TEXTAREA_PAGE_ROWS) {
		if($id === NULL) {
		}
		else
		{
			$this->loadContent($id);
			if($show)
				$this->displayContent($admin, $textareaCols, $textareaRows, $currentpage);
		}
	}
	
	/**
	 * @desc This method updates the value of any content
	 */
	function updateContent() {
		if($this->id === NULL) 
			die("Tried to update content without an ID");
			
		$sql = new SQL();
		$sql->query("INSERT INTO tasks (`fieldId` , `text`) VALUES (".$this->getId().",'".addslashes($this->getValue())."');");
	}
	
	function loadContent($id = NULL) {
		if($id === NULL)
			die("Tried to load content without a content ID");
		$sql = new SQL();
		$sql->query("SELECT text FROM `tasks` WHERE `fieldId`='$id' ORDER BY `timestamp` DESC LIMIT 1");
		$contentValues = $sql->loadObjects();
		if(!$contentValues[0])
			die("Tried to load the content with ID $id, but the content doesn't exist");
		$this->setId($id);
		$this->setValue(stripslashes($contentValues[0]["text"]));
		//$this->setValue(stripslashes("SELECT text FROM nauticloisirs_contents WHERE id='$id'"));
	}
	
	private function displayContent($admin, $textareaCols, $textareaRows, $currentpage) {
		if(!$admin)
		{
			echo $this->getValue();
		}
		else {
			if($textareaCols > 40)
				$mceEditor = "mceAdvanced";
			else
				$mceEditor = "mceAdvanced";
			
			echo '<div class="editableContent">			
					<form action="index.php" method="post" style="display:block; margin:auto;">
						<textarea class="'.$mceEditor.'" id="contentValue'.$this->getId().'" name="contentValue'.$this->getId().'" cols="'.($textareaCols-5).'" rows="'.($textareaRows).'">'.$this->getValue().'</textarea>
					
					<div align="center" style="margin-top:5px">
						<input type="submit"/>
						<input type="reset"/>
						<input type="hidden" id="contentId" name="contentId" value="'.$this->getId().'">
						<input type="hidden" id="page" name="page" value="'.$currentpage.'">
					</div>					
				</form>				
				</div>';
		}
	}
}

?>