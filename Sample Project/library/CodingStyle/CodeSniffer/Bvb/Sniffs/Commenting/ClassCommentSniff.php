<?php

if (class_exists('PHP_CodeSniffer_CommentParser_ClassCommentParser', true) === false) {
    $error = 'Class PHP_CodeSniffer_CommentParser_ClassCommentParser not found';
    throw new PHP_CodeSniffer_Exception($error);
}

if (class_exists('PEAR_Sniffs_Commenting_FileCommentSniff', true) === false) {
    $error = 'Class PEAR_Sniffs_Commenting_FileCommentSniff not found';
    throw new PHP_CodeSniffer_Exception($error);
}

/**
 * Validation of class comments
 * We want to change the list of manadatory tags in class comments
 *
 */
class Bvb_Sniffs_Commenting_ClassCommentSniff
extends PEAR_Sniffs_Commenting_ClassCommentSniff
{

    /**
     * Tags in correct order and related info.
     *
     * @var array
     */
    protected $tags = array(
        'category'   => array(
            'required'       => true,
            'allow_multiple' => false,
            'order_text'     => 'precedes @package',
        ),
        'package'    => array(
            'required'       => true,
            'allow_multiple' => false,
            'order_text'     => 'follows @category',
        ),
        'subpackage' => array(
            'required'       => false,
            'allow_multiple' => false,
            'order_text'     => 'follows @package',
        ),
        'author'     => array(
            'required'       => false,
            'allow_multiple' => true,
            'order_text'     => 'follows @subpackage (if used) or @package',
        ),
        'copyright'  => array(
            'required'       => false,
            'allow_multiple' => true,
            'order_text'     => 'follows @author',
        ),
        'license'    => array(
            'required'       => false,
            'allow_multiple' => false,
            'order_text'     => 'follows @copyright (if used) or @author',
        ),
        'version'    => array(
            'required'       => false,
            'allow_multiple' => false,
            'order_text'     => 'follows @license',
        ),
        'link'       => array(
            'required'       => false,
            'allow_multiple' => true,
            'order_text'     => 'follows @version',
        ),
        'see'        => array(
            'required'       => false,
            'allow_multiple' => true,
            'order_text'     => 'follows @link',
        ),
        'since'      => array(
            'required'       => false,
            'allow_multiple' => false,
            'order_text'     => 'follows @see (if used) or @link',
        ),
        'deprecated' => array(
            'required'       => false,
            'allow_multiple' => false,
            'order_text'     => 'follows @since (if used) or @see (if used) or @link',
        ),
    );

}

