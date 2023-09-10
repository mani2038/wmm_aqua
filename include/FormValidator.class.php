<?php
/**
 * --------------------------------------------------------------------------
 * WARNING !
 * This is beta version, future versions might be incompatibile
 * stable relase planned shortly
 * Author doesn't take any responsibility for damage caused by this software.
 * --------------------------------------------------------------------------
 *
 * FormValidator
 *
 * This class validates forms nested in html files.
 * It can validate fields on following criteria:
 * - required field
 * - content ( email, digit, alpha, word, decimal)
 * - own perl or posix regular expression
 * - length ( min, max, equal )
 * - only defined values ( for select, radio and checkbox )
 * - forbidden values
 * - field values dependecies
 *    + value can only exist with other field(s)
 *    + value must be equal to other field(s) ( eg. on pass verification )
 *    + value must exists OR/XOR other value(s)
 * - It handles fields named like an array ( eg. radiobox/checkbox )
 * - It can highlight the badly validated fields ( with smarty templates )
 * - It can return an array which information which fields were badly validated ( with field name, or logical name )
 *
 *
 *
 * @author Andrzej Pomian apomian@elka.pw.edu.pl
 * @date 15-04-2004
 * @version 0.3.1 beta
 *
 */

/*
 	Description
  Parameters of form elem that are being processed by the class
$elem = array (
   'name'      => string,  // all
   'type'      => string,  // text or select
                           // text covers html types: text, textarea, hidden, password
                           // select covers html types: select, checkbox and radio
   'label'     => string,  // field label ( eg. 'Phone number' )
   'required'  => boolean, // field must have value
   'cont'      => string,  // content type: email, word, alpha, digit, decimal
   'ereg'      => string,  // text, textarea
   'preg'      => string,  // text, textarea
   'len'       => integer, // accurate length
   'len_min'   => integer, // min length
   'len_max'   => integer, // max length
   'val_max'   => integer, // max value of an integer ( use with cont == digit )
   'val_min'   => integer, // min value of an integer ( use with cont == digit )
	'values'    => array;   // select accepted values
	'forbid'    => array;   // forbidden values that match other criteria
   'arr_size_min' => integer // when field name is an array( eg. 'phones[]' )
                           // minimum number of elements in array
   // Fields dependencies


   'eqal'      => mixed,   // array or string,
                           // value of this field must be equal to value of field in array()
								   // eg. in when there are two password boxes either array or string
   'with'      => mixed,   // array or string, value must exist with other value(s)
   'alt_or'    => mixed,   // array or string, at least one of fields must have a value
   'alt_xor'   => mixed   // array or string, only one field must have a value
);

############# Example: #############################################

   -- begin php code --

   // start with example form definition: - can be made in separate file
   $elems[] = array('name'=>'sex','label'=>'sex', 'type'=>'select', 'required'=>true, 'values' => array('Mr.', 'Mrs.', 'Miss', 'Ms.'));
   $elems[] = array('name'=>'fname','label'=>'Firstname', 'type'=>'text', 'required'=>true, 'len_max'=>'30');
   $elems[] = array('name'=>'sname','label'=>'Family Name', 'type'=>'text', 'required'=>true, 'len_max'=>'30');
   $elems[] = array('name'=>'strsel', 'type'=>'select', 'required'=>true, 'values' => array('street','square'));
   $elems[] = array('name'=>'street', 'type'=>'text', 'required'=>true, 'len_max'=>'30');
   $elems[] = array('name'=>'strno', 'type'=>'text', 'required'=>true, 'len_max'=>'5');
   $elems[] = array('name'=>'appartment', 'type'=>'text', 'len_max'=>'4');
   $elems[] = array('name'=>'pcode1', 'type'=>'text', 'required'=>true, 'len'=>'2', 'cont' => 'digit');
   $elems[] = array('name'=>'pcode2', 'type'=>'text', 'required'=>true, 'len'=>'3', 'cont' => 'digit');
   $elems[] = array('name'=>'city', 'type'=>'text', 'required'=>true, 'len_max'=>'30');
   $elems[] = array('name'=>'phone', 'type'=>'text', 'required'=>true, 'len_max'=>'30');
   $elems[] = array('name'=>'email', 'type'=>'text', 'required'=>true, 'len_max'=>'30', 'cont' => 'email');
   $elems[] = array('name'=>'pass1', 'type'=>'text', 'required'=>true, 'len_min'=>'5', 'len_max'=>'30');
   $elems[] = array('name'=>'pass2', 'type'=>'text', 'required'=>true, 'len_min'=>'5', 'len_max'=>'30', 'equal'=> array('pass1'));
   $elems[] = array('name'=>'ppref', 'type'=>'text', 'len'=>'2', 'arr_size_min'=>1, 'with'=>'pnum', 'cont' => 'digit');
   $elems[] = array('name'=>'pnum', 'type'=>'text', 'len'=>'7', 'arr_size_min'=>1, 'with'=>'ppref', 'cont' => 'digit');

   -- validation part file example.php --

	$f = new FormValidator($elems);
	$err = $f->validate($_POST);

	// if validation fails take an action
	if ( $err === true ) {
		// if you're using smarty tpl engine you can highlight each input
		$f->assignErrorClass('form_error');

		// if you aren't using smarty
		$valid = $f->getValidElems();

		foreach ( $valid as $v ) {
			if ( $v[1] === false ) {
				// take an action
			}
		}
	}

	-- end php code --
##########################################################################
*/

class FormValidator {
	var $elems = array();
	var $err = false;
	var $validElems = array();
	var $secPhase = array();
	function FormValidator(&$elems) {
		if ( is_array($elems) ) {
			is_array($elems[0]) ? $this->elems = $elems : $this->elems[] = $elems;
		}
	}

	/**
	* @param array $request - $_GET, $_POST, $_SESSION or other data
	* @return boolean true - validation OK, false - validation error
	*/
	function validate(&$request)
	{
		## print_r($request);
		// validated elems
		$this->validElems = array();
		$this->err = false;
		// fields that needs dependency check
		$this->secPhase = array();
		foreach ($this->elems as $e) {
			$name = $e['name'];
			isset($e['label']) ? null : $e['label'] = null;
			// Field not present in html form
			if (!isset($request[$name])) {
				$this->_setError($name, $e['label']); continue;
			}
			$val = $request[$name];
			// If field name is an array ( eg. phones[] in example above )
			if (is_array($val)){
				if (!empty($e['arr_size_min']) && $e['arr_size_min'] > 0) {
					$c = 0;
					foreach($val as $v) {
						if ( !empty($v) ) {
							$c++;
						}
					}
					if ( $c < $e['arr_size_min'] ) {
						$this->_setError($name, $e['label']); continue;
					}
				}
			}
			// Each value is converted to an array
			else {
				$val = array($val);
			}

			foreach ($val as $k => $v) {
				if ( !empty($e['required']) && empty($v) ) {
					$this->_setError($name, $e['label'], $k);
					$this->validElems[$name][$k] = array($v, false);
					continue;
				}
				elseif (empty($v)) {
					$e['validated'] = true;
					$this->validElems[$name][$k] = array($v,true);
					continue;
				}
				if ( in_array($e['type'], array('text'))) {
					if ( !empty($e['len']) && $e['len'] != strlen($v)) {
						$this->_setError($name, $e['label'], $k); continue;
					}
					if ( !empty($e['len_min']) && strlen($v) < $e['len_min'] ) {
						$this->_setError($name, $e['label'], $k); continue;
					}
					if ( !empty($e['len_max']) && strlen($v) > $e['len_max'] ) {
						$this->_setError($name, $e['label'], $k); continue;
					}
					if ( !empty($e['val_min']) && $v < $e['val_min'] ) {
						$this->_setError($name, $e['label'], $k); continue;
					}
					if ( !empty($e['val_max']) && $v > $e['val_max'] ) {
						$this->_setError($name, $e['label'], $k); continue;
					}
					if ( !empty($e['ereg']) && !ereg($e['ereg'], $v) ) {
						$this->_setError($name, $e['label'], $k, $v); continue;
					}
					if ( !empty($e['preg']) && !preg_match($e['preg'], $v) ) {
						$this->_setError($name, $e['label'], $k); continue;
					}
					if ( !empty($e['forbid']) && in_array($v, $e['forbid']) ) {
						$this->_setError($name, $e['label'], $k, $v); continue;
					}
					if (isset($e['cont']) && in_array($e['cont'], array('email', 'alpha', 'word', 'digit', 'decimal'))) {
						$expr = ''; // just temporally
						// decimals only Added by Karn
						if ($e['cont'] == 'decimal') {
							$expr = "/^\d{0,3}($|\.\d{1,2}$)/";
						}
						// digits only
						elseif ($e['cont'] == 'digit') {
							$expr = "/^\d*$/";
						}
						// email verify
						elseif ( $e['cont'] == 'email' ) {
							if ( !$this->verifyEmail($v) ) {
								$this->_setError($name, $e['label'], $k, $v); continue;
							}
						}
						elseif ( $e['cont'] == 'alpha' ) {
							$expr = "/^[a-zA-Z]*$/";
						}
						elseif ( $e['cont'] == 'word' ) {
							$expr = "/^\w*$/";
						}
						// del first condition when class would be complete...
						if ( !empty($expr) && !preg_match($expr, $v)) {
							$this->_setError($name, $e['label'], $k, $v); continue;
						}
					}
					if ( !empty($e['with'])   ) {
						$this->secPhase[] = $e;
					}

					if ( !empty($e['equal']) ) {
						$this->secPhase[] = $e;
					}

					foreach ( array('with', 'equal', 'alt_or', 'alt_xor') as $eq ) {
						if ( !empty($e[$eq]) ) {
							$this->secPhase[] = $e;
							break;
						}
					}
				}
				elseif ( $e['type'] == 'select' ) {
					if ( isset($e['values']) && !in_array($v, $e['values'])  ) {
						$this->_setError($name, $e['label'], $k, $v); continue;
					}
					foreach ( array('with', 'equal', 'alt_or', 'alt_xor') as $eq ) {
						if ( !empty($e[$eq]) ) {
							$this->secPhase[] = $e;
							break;
						}
					}
				}
				// hmm...
				else {
						$this->_setError($name, $e['label'], $k, $v); continue;
				}
				$this->validElems[$name][$k] = array($v,true);
			}
		}
		$this->_validateSecondPhase($request);
		return $this->err;
	}

	/*
	 * Dependency check
	 * @param array array $request - $_GET, $_POST, $_SESSION or other data
	 * @access private
	 * @return void
	 */
	function _validateSecondPhase(&$request) {
		foreach ( $this->secPhase as $e ) {
			$name = $e['name'];
			$val = $request[$name];
			if ( !is_array($val) ) {
				$val = array($val);
			}
			foreach ( $val as $k => $v) {
				if ( isset($e['with']) && is_array($e['with']) ) {
					foreach ($e['with'] as $eq) {
						if ( !empty($v) && empty($this->validElems[$eq][$k][0]) ) {
							$this->_setError($eq, $e['label'], $k, $v); continue;
						}
					}
				}
				elseif ( !empty($e['with']) && !empty($v) && empty($this->validElems[$e['with']][$k][0])  ) {
					$this->_setError($e['with'], $e['label'], $k, $v); continue;
				}

				if ( isset($e['equal']) && is_array($e['equal']) ) {
					foreach ( $e['equal'] as $eq ) {
						if ( $v != $this->validElems[$eq][$k][0] ) {
							$this->_setError($name, $e['label'], $k, $v); continue;
						}
					}
				}
				elseif ( !empty($e['equal']) && $v != $this->validElems[$e['equal']][$k][0] ) {
					$this->_setError($name, $e['label'], $k, $v); continue;
				}

				if ( isset($e['alt_or']) && is_array($e['alt_or']) && empty($v) ) {
					$c = 0;
					foreach ( $e['alt_or'] as $eq ) {
						 empty($this->validElems[$e['alt_or']][$k][0]) ? $c++ : null;
					}
					if ( $c == 0 ) {
						$this->_setError($name, $e['label'], $k, $v); continue;
					}
				}
				elseif ( !empty($e['alt_or']) && empty($v) && empty($this->validElems[$e['alt_or']][$k][0]) ) {
					$this->_setError($e['with'], $e['label'], $k, $v); continue;
				}

				if ( isset($e['alt_xor']) && is_array($e['alt_xor'])) {
					$c = 0;
					foreach ( $e['alt_xor'] as $eq ) {
						empty($this->validElems[$e['alt_xor']][$k][0]) ? null : $c++;
					}

					if ( empty($v) && $c != 1 ) {
						$this->_setError($e['with'], $e['label'], $k, $v); continue;
					}
					elseif ( !empty($v) && $c > 0 ) {
						$this->_setError($e['with'], $e['label'], $k, $v); continue;
					}
				}
				elseif ( !empty($e['alt_xor']) ) {
					if ( empty($v) && empty($this->validElems[$e['alt_xor']][$k][0]) ) {
						$this->_setError($e['with'], $e['label'], $k, $v); continue;
					}
					elseif ( !empty($v) && !empty($this->validElems[$e['alt_xor']][$k][0]) )  {
						$this->_setError($e['with'], $e['label'], $k, $v); continue;
					}
				}
			}
		}
	}

	/**
	 * Email verification
	 * @param string $email, @access private, @return boolean true if OK otherwise false
	 */
	function verifyEmail($email)
	{
		$expr = '/^(.+)@(([a-z0-9\.-]+)\.[a-z]{2,5})$/i';
		$uexpr = "/^[a-z0-9\~\!\#\$\%\&\(\)\-\_\+\=\[\]\;\:\'\"\,\.\/]+$/i";
		if (preg_match($expr, $email, $regs)) {
			$username = $regs[1];
			$host = $regs[2];
			//if (checkdnsrr($host, MX)) {
				if (preg_match($uexpr, $username)) {
					return true;
				}
				else {
					return false;
				}
			//}
			//else {
			//	return false;
			//}
		}
		else {
			return false;
		}
	}

	/**
	 * Highlight field/text with Smarty - if you don't use smarty it's quite useless...
	 * @param object $s - Smarty object, @param string $class_name - a css class name to assign, @access public, @return void
	 */
	function assignErrorClass(&$s, $class_name)
	{
		foreach ( $this->validElems as $k => $v)
		{
			foreach ( $v as $k1 => $v1)
			{
				if($v1[1] === false)
				{
					$err_c[$k][$k1] = $class_name;
				}
			}
		}
		$s->assign('err_c', $err_c);
	}

/**
	* Setting error
	* @param string $name field name, @param integer $k key value usually 0 until field name is an array ( eg. phones[])
	* @param string $value field value, @param string $label - field label, @access private, @return void
*/
	function _setError($name, $label='', $k=0, $value='')
	{
		## $this->validElems[$name][$k] = array($value, false, $label); ## Commented by Karn
		$this->validElems[$name] = array($value, false, $label);
		$this->err = true;
	}

	## get array with validation result
	## @access public
	## @return array - array with validation result for each field
	function getValidElems()
	{
		return $this->validElems;
	}
}
?>