<?php
namespace Services;
class TestService
{
	public function create()
	{
		$post = Test::create([
			'title' => $data['title'],
			'content' => $data['content']
		]);
		return $post;
	}
}