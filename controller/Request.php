<?php
declare(strict_types=1);
namespace Solluzi\Controller;

use Solluzi\Controller\Traits\FormDecript;
use Solluzi\Controller\Traits\ReturnDate2BrTrait;
use Solluzi\Controller\Traits\ReturnDate2UsTrait;
use Solluzi\Controller\Traits\ReturnDecimalTrait;

/**
* @version		1.1.1
* @category		Psr
* @package		Solluzi
* @subpackage	Controller	
* @author		Mauro Joaquim Miranda <mauro.miranda@codesolluzi.com>
* @copyright	Copyright (c) 2022 Solluzi Tecnologia da Informação LTDA-ME. (https://codesolluzi.com)
* @license		https://codesolluzi.com/framework-license
*	
*	
*/
class Request
{
    private $post;
    private $get;
    private $variables;
    private $input;
    use FormDecript;
    use ReturnDate2UsTrait;
    use ReturnDate2BrTrait;
    use ReturnDecimalTrait;

    public function __construct($headers = [], $post = [], $get = [], $files = [])
    {
        $this->post      = $post;
        $this->get       = $get;
        $this->files     = $files;
        $this->headers   = $headers;
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function getPosts()
    {
        return $this->dataVerification();
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function getPost($key): self
    {
        $this->input = $this->dataVerification()[$key] ?? null;
        return $this;
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function getFiles()
    {
        return $this->files;
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function getFile($key)
    {
        $this->files[$key];
        return $this;
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function toName()
    {
        return $this->files['name'];
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function toType()
    {
        return $this->files['type'];
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function toTmpName()
    {
        return $this->files['tmp_name'];
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function toError()
    {
        return $this->files['error'];
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function toSize()
    {
        return $this->files['size'];
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function getQueryParams()
    {
        return $this->get;
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function getQueryParam($key)
    {
        return $this->get[$key] ?? null;
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function toString()
    {
        return $this->input;
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function toInt()
    {
        return intval($this->input);
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function toDate2Us($timestamp = false)
    {
        $this->input = $this->date2us($this->input, $timestamp);
        return $this->input ?? null;
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function toDate2Br($timestamp = false)
    {
        $this->input = $this->date2br($this->input, $timestamp);
        return $this->input ?? null;
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function toFloat($decimalPlaces = null)
    {
        return $this->brl2decimal($this->input, $decimalPlaces);
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function toBoolean()
    {
        if(is_int($this->input)){
            return $this->input;
        }
        return $this->input ? 1 : 0;
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function toBool()
    {
        if(is_int($this->input)){
            return $this->input === 1 ? true : false;
        }
        return $this->input ?? false;
    }

    /**
    *--------------------------------------------------------------------------
    *								
    *--------------------------------------------------------------------------
    *
    *
    *
    */
    public function toArray()
    {
        return (array) $this->input;
    }

}