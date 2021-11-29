<?php

abstract class View
{
	protected $template;
	protected $params;

	public function __construct(array $params = [])
	{
		$this->params = $params;
	}

	protected function render()
	{
	}
}
