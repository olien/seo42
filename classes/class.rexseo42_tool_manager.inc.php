<?php

class rexseo42_tool_manager {
	protected $tools;

	public function __construct() {
		$this->tools = array();
	}

	public function addTool($tool) {
		$this->tools[] = $tool;
	}

	public function getTools() {
		return $this->tools;
	}

	public function printToolList($headline) {
		echo '<table id="rexseo42-tools" class="rex-table">';
		echo '<tr><th>' . $headline . '</th></tr>';

		foreach ($this->tools as $tool) {
			echo '<tr><td>';
			echo '<a class="extern" href="' . $tool->getLink() . '" target="_blank">' .  $tool->getTitle() . '</a>' . '<p>' . $tool->getDescription() . '</p>';
			echo '<p class="url">' . $tool->getLink() . '</p>';
			echo '</td></tr>';
		}

		echo '</table>';
	}
}



