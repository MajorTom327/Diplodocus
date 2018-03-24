<?php
/** Diplodocus
* 	----------
*	@file
*/

/** Route
* This class is a basic route functionality type.
*/
class Route {
	protected $_uri = "";
	protected $_page = null;

	/** constructor
	*	@param $uri is the uri for the request
	*	@param $page is the class extended from Core/Page
	*/
	public function __constructor($uri, $page) {
		$this->$_uri = $uri;
		$this->$_page = $page;
	}

	/** uri
	*	it's the getters and setter for URI.
	*	If params, set the value
	*	else get the value;
	*	@return String
	*/
	public function uri($value = "") {
		if ($value !== "")
			$this->_uri = $value;
		return ($this->uri);
	}

	/** page
	*	it's the getters and setter for Page.
	*	If params, set the value
	*	else get the value;
	*	@return Object Page
	*/
	public function page($value = null) {
		if ($value !== null)
		{
			unset ($this->_page);
			$this->_page = $value;
		}
		return ($this->_page);
	}
}

/** Get
*	Is the Route extended class for handle Get Query
*/
class Get extends Route {
}

/** Post
*	Is the Route extended class for handle Post Query
*/
class Post extends Route {
}

/** Delete
*	Is the Route extended class for handle Delete Query
*/
class Delete extends Route {
}

/** Put
*	Is the Route extended class for handle Put Query
*/
class Put extends Route {
}
