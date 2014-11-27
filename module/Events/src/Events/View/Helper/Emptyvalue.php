<?php

namespace Events\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Emptyvalue extends AbstractHelper {
	public function __invoke($str, array $wrap = array()) {
		if (is_object($str)) {
			try {
				throw new \Exception();
			} catch (\Exception $e) {
				echo $e->getMessage()."\n".$e->getTraceAsString();
			}
		}
		$wrap = array_pad(array_values($wrap), 2, '');
		return strlen(trim($str)) ? $wrap[0].$str.$wrap[1] : '---';
	}
}