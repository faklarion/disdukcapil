<?php
function cmb_dinamis($name, $table, $field, $pk, $selected)
{
	$ci = get_instance();
	$cmb = "<select name='$name' class='form-control'>";
	$data = $ci->db->get($table)->result();
	foreach ($data as $d) {
		$cmb .= "<option value='" . $d->$pk . "'";
		$cmb .= $selected == $d->$pk ? " selected='selected'" : '';
		$cmb .= ">" . strtoupper($d->$field) . "</option>";
	}
	$cmb .= "</select>";
	return $cmb;
}

function rename_string_is_aktif($string)
{
	return $string == 'y' ? 'Aktif' : 'Tidak Aktif';
}

function is_login()
{
	$ci = get_instance();
	if (empty($ci->session->userdata('id_users'))) {
		redirect('auth');
	}

	function convertToRoman($integer)
	{
		// Convert the integer into an integer (just to make sure)
		$integer = intval($integer);
		$result = '';

		// Create a lookup array that contains all of the Roman numerals.
		$lookup = array(
			'M' => 1000,
			'CM' => 900,
			'D' => 500,
			'CD' => 400,
			'C' => 100,
			'XC' => 90,
			'L' => 50,
			'XL' => 40,
			'X' => 10,
			'IX' => 9,
			'V' => 5,
			'IV' => 4,
			'I' => 1
		);

		foreach ($lookup as $roman => $value) {
			// Determine the number of matches
			$matches = intval($integer / $value);

			// Add the same number of characters to the string
			$result .= str_repeat($roman, $matches);

			// Set the integer to be the remainder of the integer and the value
			$integer = $integer % $value;
		}

		// The Roman numeral should be built, return it
		return $result;
	}

	function tanggal_indo($tanggal)
	{
		$bulan = array(
			1 => 'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$split = explode('-', $tanggal);
		return $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];
	}

}
