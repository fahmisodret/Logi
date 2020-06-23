<?php
namespace Services;
use App\Config;
class ConfigService
{
	public function update($data, $id)
	{
		$data = Config::find($id)->update([
			'keterangan' => $data['keterangan']
		]);
		return $data;
	}

	public function findByName($name)
	{
		$data = Config::whereName($name)->first();
		return $data;
	}
}