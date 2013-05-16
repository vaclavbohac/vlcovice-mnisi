<?php

namespace Model;

use Nette\Object;

class Team extends Object
{
	/** @var string */
	private $name;

	/** @var int */
	private $points;

	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param int $points
	 */
	public function setPoints($points)
	{
		$this->points = $points;
	}

	/**
	 * @return int
	 */
	public function getPoints()
	{
		return $this->points;
	}
}
