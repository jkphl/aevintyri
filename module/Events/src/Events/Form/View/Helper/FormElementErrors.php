<?php 

namespace Events\Form\View\Helper;

use Zend\Form\View\Helper\FormElementErrors as OriginalFormElementErrors;

class FormElementErrors extends OriginalFormElementErrors {
    protected $messageCloseString     = '</li></ul>';
    protected $messageOpenFormat      = '<ul class="error"><li>';
    protected $messageSeparatorString = '</li><li>';
}