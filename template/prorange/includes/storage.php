<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage PRORANGE
 * @since PRORANGE 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Get theme variable
if (!function_exists('prorange_storage_get')) {
	function prorange_storage_get($var_name, $default='') {
		global $PRORANGE_STORAGE;
		return isset($PRORANGE_STORAGE[$var_name]) ? $PRORANGE_STORAGE[$var_name] : $default;
	}
}

// Set theme variable
if (!function_exists('prorange_storage_set')) {
	function prorange_storage_set($var_name, $value) {
		global $PRORANGE_STORAGE;
		$PRORANGE_STORAGE[$var_name] = $value;
	}
}

// Check if theme variable is empty
if (!function_exists('prorange_storage_empty')) {
	function prorange_storage_empty($var_name, $key='', $key2='') {
		global $PRORANGE_STORAGE;
		if (!empty($key) && !empty($key2))
			return empty($PRORANGE_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return empty($PRORANGE_STORAGE[$var_name][$key]);
		else
			return empty($PRORANGE_STORAGE[$var_name]);
	}
}

// Check if theme variable is set
if (!function_exists('prorange_storage_isset')) {
	function prorange_storage_isset($var_name, $key='', $key2='') {
		global $PRORANGE_STORAGE;
		if (!empty($key) && !empty($key2))
			return isset($PRORANGE_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return isset($PRORANGE_STORAGE[$var_name][$key]);
		else
			return isset($PRORANGE_STORAGE[$var_name]);
	}
}

// Inc/Dec theme variable with specified value
if (!function_exists('prorange_storage_inc')) {
	function prorange_storage_inc($var_name, $value=1) {
		global $PRORANGE_STORAGE;
		if (empty($PRORANGE_STORAGE[$var_name])) $PRORANGE_STORAGE[$var_name] = 0;
		$PRORANGE_STORAGE[$var_name] += $value;
	}
}

// Concatenate theme variable with specified value
if (!function_exists('prorange_storage_concat')) {
	function prorange_storage_concat($var_name, $value) {
		global $PRORANGE_STORAGE;
		if (empty($PRORANGE_STORAGE[$var_name])) $PRORANGE_STORAGE[$var_name] = '';
		$PRORANGE_STORAGE[$var_name] .= $value;
	}
}

// Get array (one or two dim) element
if (!function_exists('prorange_storage_get_array')) {
	function prorange_storage_get_array($var_name, $key, $key2='', $default='') {
		global $PRORANGE_STORAGE;
		if (empty($key2))
			return !empty($var_name) && !empty($key) && isset($PRORANGE_STORAGE[$var_name][$key]) ? $PRORANGE_STORAGE[$var_name][$key] : $default;
		else
			return !empty($var_name) && !empty($key) && isset($PRORANGE_STORAGE[$var_name][$key][$key2]) ? $PRORANGE_STORAGE[$var_name][$key][$key2] : $default;
	}
}

// Set array element
if (!function_exists('prorange_storage_set_array')) {
	function prorange_storage_set_array($var_name, $key, $value) {
		global $PRORANGE_STORAGE;
		if (!isset($PRORANGE_STORAGE[$var_name])) $PRORANGE_STORAGE[$var_name] = array();
		if ($key==='')
			$PRORANGE_STORAGE[$var_name][] = $value;
		else
			$PRORANGE_STORAGE[$var_name][$key] = $value;
	}
}

// Set two-dim array element
if (!function_exists('prorange_storage_set_array2')) {
	function prorange_storage_set_array2($var_name, $key, $key2, $value) {
		global $PRORANGE_STORAGE;
		if (!isset($PRORANGE_STORAGE[$var_name])) $PRORANGE_STORAGE[$var_name] = array();
		if (!isset($PRORANGE_STORAGE[$var_name][$key])) $PRORANGE_STORAGE[$var_name][$key] = array();
		if ($key2==='')
			$PRORANGE_STORAGE[$var_name][$key][] = $value;
		else
			$PRORANGE_STORAGE[$var_name][$key][$key2] = $value;
	}
}

// Merge array elements
if (!function_exists('prorange_storage_merge_array')) {
	function prorange_storage_merge_array($var_name, $key, $value) {
		global $PRORANGE_STORAGE;
		if (!isset($PRORANGE_STORAGE[$var_name])) $PRORANGE_STORAGE[$var_name] = array();
		if ($key==='')
			$PRORANGE_STORAGE[$var_name] = array_merge($PRORANGE_STORAGE[$var_name], $value);
		else
			$PRORANGE_STORAGE[$var_name][$key] = array_merge($PRORANGE_STORAGE[$var_name][$key], $value);
	}
}

// Add array element after the key
if (!function_exists('prorange_storage_set_array_after')) {
	function prorange_storage_set_array_after($var_name, $after, $key, $value='') {
		global $PRORANGE_STORAGE;
		if (!isset($PRORANGE_STORAGE[$var_name])) $PRORANGE_STORAGE[$var_name] = array();
		if (is_array($key))
			prorange_array_insert_after($PRORANGE_STORAGE[$var_name], $after, $key);
		else
			prorange_array_insert_after($PRORANGE_STORAGE[$var_name], $after, array($key=>$value));
	}
}

// Add array element before the key
if (!function_exists('prorange_storage_set_array_before')) {
	function prorange_storage_set_array_before($var_name, $before, $key, $value='') {
		global $PRORANGE_STORAGE;
		if (!isset($PRORANGE_STORAGE[$var_name])) $PRORANGE_STORAGE[$var_name] = array();
		if (is_array($key))
			prorange_array_insert_before($PRORANGE_STORAGE[$var_name], $before, $key);
		else
			prorange_array_insert_before($PRORANGE_STORAGE[$var_name], $before, array($key=>$value));
	}
}

// Push element into array
if (!function_exists('prorange_storage_push_array')) {
	function prorange_storage_push_array($var_name, $key, $value) {
		global $PRORANGE_STORAGE;
		if (!isset($PRORANGE_STORAGE[$var_name])) $PRORANGE_STORAGE[$var_name] = array();
		if ($key==='')
			array_push($PRORANGE_STORAGE[$var_name], $value);
		else {
			if (!isset($PRORANGE_STORAGE[$var_name][$key])) $PRORANGE_STORAGE[$var_name][$key] = array();
			array_push($PRORANGE_STORAGE[$var_name][$key], $value);
		}
	}
}

// Pop element from array
if (!function_exists('prorange_storage_pop_array')) {
	function prorange_storage_pop_array($var_name, $key='', $defa='') {
		global $PRORANGE_STORAGE;
		$rez = $defa;
		if ($key==='') {
			if (isset($PRORANGE_STORAGE[$var_name]) && is_array($PRORANGE_STORAGE[$var_name]) && count($PRORANGE_STORAGE[$var_name]) > 0) 
				$rez = array_pop($PRORANGE_STORAGE[$var_name]);
		} else {
			if (isset($PRORANGE_STORAGE[$var_name][$key]) && is_array($PRORANGE_STORAGE[$var_name][$key]) && count($PRORANGE_STORAGE[$var_name][$key]) > 0) 
				$rez = array_pop($PRORANGE_STORAGE[$var_name][$key]);
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if (!function_exists('prorange_storage_inc_array')) {
	function prorange_storage_inc_array($var_name, $key, $value=1) {
		global $PRORANGE_STORAGE;
		if (!isset($PRORANGE_STORAGE[$var_name])) $PRORANGE_STORAGE[$var_name] = array();
		if (empty($PRORANGE_STORAGE[$var_name][$key])) $PRORANGE_STORAGE[$var_name][$key] = 0;
		$PRORANGE_STORAGE[$var_name][$key] += $value;
	}
}

// Concatenate array element with specified value
if (!function_exists('prorange_storage_concat_array')) {
	function prorange_storage_concat_array($var_name, $key, $value) {
		global $PRORANGE_STORAGE;
		if (!isset($PRORANGE_STORAGE[$var_name])) $PRORANGE_STORAGE[$var_name] = array();
		if (empty($PRORANGE_STORAGE[$var_name][$key])) $PRORANGE_STORAGE[$var_name][$key] = '';
		$PRORANGE_STORAGE[$var_name][$key] .= $value;
	}
}

// Call object's method
if (!function_exists('prorange_storage_call_obj_method')) {
	function prorange_storage_call_obj_method($var_name, $method, $param=null) {
		global $PRORANGE_STORAGE;
		if ($param===null)
			return !empty($var_name) && !empty($method) && isset($PRORANGE_STORAGE[$var_name]) ? $PRORANGE_STORAGE[$var_name]->$method(): '';
		else
			return !empty($var_name) && !empty($method) && isset($PRORANGE_STORAGE[$var_name]) ? $PRORANGE_STORAGE[$var_name]->$method($param): '';
	}
}

// Get object's property
if (!function_exists('prorange_storage_get_obj_property')) {
	function prorange_storage_get_obj_property($var_name, $prop, $default='') {
		global $PRORANGE_STORAGE;
		return !empty($var_name) && !empty($prop) && isset($PRORANGE_STORAGE[$var_name]->$prop) ? $PRORANGE_STORAGE[$var_name]->$prop : $default;
	}
}
?>