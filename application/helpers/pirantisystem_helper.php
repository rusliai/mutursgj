<?php
defined('BASEPATH') or exit('No direct script access allowed');
function print_pretty($data)
{
	return print("<pre style='background-color: whitesmoke;'>" . print_r($data, true) . "</pre>");
	die;
}
function _isTahun($val)
{
	//range tanggal 1900 - 2099
	if (!preg_match("/(19[0-9][0-9]|20[0-9][0-9])/", $val)) {
		return false;
	} else {
		return true;
	}
}
function _isBulan($val)
{
	$range = range("1", "12");
	if (in_array($val, $range)) {
		return true;
	} else {
		return false;
	}
}

function _isTanggal($str)
{
	if (!preg_match("/^[0-9]{4}-([1-9]|0[1-9]|1[0-2])-([1-9]|0[1-9]|[1-2][0-9]|3[0-1]|)$/", $str)) {
		return false;
	} else {
		return true;
	}
}
function _isTime($str)
{
	if (!preg_match("/^([01]?[0-9]|2[0-3])\:[0-5][0-9]:[0-5][0-9]$/", $str)) {
		return false;
	} else {
		return true;
	}
}
function my_number_format($number)
{
	if ($number == '') $number = 0;
	return number_format($number, 2, '.', ',');
}
function strip_comma($text)
{
	return str_replace(',', '', $text);
}
function strip_titik($text)
{
	return str_replace('.', '', $text);
}

function newline()
{
	echo "<br />";
}
function tab()
{
	echo "\t";
}
function options($src, $id, $ref_val, $text_field)
{
	$options = '';
	foreach ($src->result() as $row) {
		$opt_value	= $row->$id;
		$text_value	= $row->$text_field;
		if ($row->$id == $ref_val) {
			$options .= '<option value="' . $opt_value . '" selected>' . $text_value . '</option>';
		} else {
			$options .= '<option value="' . $opt_value . '">' . $text_value . '</option>';
		}
	}
	return $options;
}
function tgl_indo($tgl)
{
	$tanggal = substr($tgl, 8, 2);
	$bulan = getBulan(substr($tgl, 5, 2));
	$tahun = substr($tgl, 0, 4);
	return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function getBulan($bln)
{
	switch ($bln) {
		case 1:
			return "Januari";
			break;
		case 2:
			return "Februari";
			break;
		case 3:
			return "Maret";
			break;
		case 4:
			return "April";
			break;
		case 5:
			return "Mei";
			break;
		case 6:
			return "Juni";
			break;
		case 7:
			return "Juli";
			break;
		case 8:
			return "Agustus";
			break;
		case 9:
			return "September";
			break;
		case 10:
			return "Oktober";
			break;
		case 11:
			return "November";
			break;
		case 12:
			return "Desember";
			break;
	}
}
function tgl_str($date)
{
	$exp = explode('-', $date);
	if (count($exp) == 3) {
		$date = $exp[2] . '-' . $exp[1] . '-' . $exp[0];
	}
	return $date;
}
function tgl_sql($date)
{
	$exp = explode('-', $date);
	if (count($exp) == 3) {
		$date = $exp[2] . '-' . $exp[1] . '-' . $exp[0];
	}
	return $date;
}
function input_select_bulan($id = "", $selected = "")
{
    $bulan_array = unserialize(BULAN);
    $htmlselect = "<select id='" . $id . "'class='form-control form-control-sm col-sm-3'> name='" . $id . "'";
    foreach ($bulan_array as $key => $value) {
        if (intval($selected) == $key) {
            $htmlselect .= "<option  selected value='" . $key . "'>" . $value . "</option>";
        } else {
            $htmlselect .= "<option  value='" . $key . "'>" . $value . "</option>";
        }
    }
    $htmlselect .=    "</select>";
    return $htmlselect;
}


function input_select_tahun($id = "", $selected = "")
{
    $bulan_array = unserialize(TAHUN);
    $htmlselect = "<select id='" . $id . "'class='form-control form-control-sm col-sm-3'> name='" . $id . "'";
    foreach ($bulan_array as $key => $value) {
        if (intval($selected) == $key) {
            $htmlselect .= "<option  selected value='" . $key . "'>" . $value . "</option>";
        } else {
            $htmlselect .= "<option  value='" . $key . "'>" . $value . "</option>";
        }
    }
    $htmlselect .=    "</select>";
    return $htmlselect;
}

