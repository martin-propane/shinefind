<?php namespace Shinefind\Entities;

class Carwash_Review
{
	public $id;
	public $cw_id;
	public $rating;
	public $review;
	public $timestamp;

	public function __construct($id, $cw_id, $rating, $review, $timestamp)
	{
		$this->id = $id;
		$this->cw_id = $cw_id;
		$this->rating = $rating;
		$this->review = $review;
		$this->timestamp = $timestamp;
	}
}
