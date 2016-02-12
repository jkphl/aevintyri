<?php

/**
 * Event management
 *
 * @category	Tollwerk
 * @package		Tollwerk_Events
 * @author		Joschi Kuphal <joschi@kuphal.net>
 * @copyright	Copyright © 2014 tollwerk GmbH <info@tollwerk.de>
 * @license		http://opensource.org/licenses/BSD-3-Clause	The BSD 3-Clause License
 */

namespace Auth\Entity;
use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;

/**
 * User entity
 * 
 * @ORM\Table (name="user")
 * @ORM\Entity(repositoryClass="Auth\Repository\EntityRepository") 
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
class User extends AbstractEntity {

    /**
     * Full name
     * 
     * @var \string
     * @ORM\Column(name="name", type="string", length=80, nullable=true)
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"StringLength", "options":{"encoding":"UTF-8", "max":80}})
     */
    protected $name;

    /**
     * User name
     * 
     * @var \string
     * @ORM\Column(name="username", type="string", length=30, nullable=false, unique=true)
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"StringLength", "options":{"encoding":"UTF-8", "min":4, "max":30}})
     * @Annotation\Validator({"name":"Regex", "options":{"pattern":"/^[a-zA-Z][a-zA-Z0-9\_\-]+$/"}})
     * @Annotation\Required(true)
     * @Annotation\Attributes({
     *   "type":"text",
     *   "required":"true"
     * })
     */
    protected $username;
    
    /**
     * Password
     * 
     * @var \string
     * @ORM\Column(name="password", type="string", length=60, nullable=false)
	 * @Annotation\Type("Zend\Form\Element\Password")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"StringLength", "options":{"encoding":"UTF-8", "min":6, "max":20}})
     * @Annotation\Required(true)
     * @Annotation\Attributes({
     *   "type":"password",
     *   "required":"true"
     * })
     */
    protected $password;
    
    /**
     * Email address
     * 
     * @var \string
     * @ORM\Column(name="email", type="string", length=60, nullable=false, unique=true)
     * @Annotation\Type("Zend\Form\Element\Email")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"EmailAddress"})
     * @Annotation\Required(true)
     * @Annotation\Attributes({
     *   "type":"email",
     *   "required":"true"
     * })
     */
    protected $email;
    
    /**
     * Email address is confirmed
     * 
     * @var \boolean
     * @ORM\Column(name="confirmed", type="boolean", nullable=false)
     */
    protected $confirmed;
    
    /**
     * Security question
     * 
     * @var Auth\Entity\Question
     * @ORM\ManyToOne(targetEntity="Question")
     * @ORM\JoinColumn(name="question", referencedColumnName="id", nullable=false)
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"Digits"})
     * @Annotation\Required(true)
     * @Annotation\Options({
     *   "required":"true",
     *   "empty_option": "Security Question",
     *   "target_class":"Auth\Entity\Question",
     *   "property": "question"
     * })
     */
    protected $question;
    
    /**
     * Security answer
     * 
     * @var string
     * @ORM\Column(name="answer", type="string", length=100, nullable=false)
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Filter({"name":"StringToLower", "options":{"encoding":"UTF-8"}})
     * @Annotation\Validator({"name":"StringLength", "options":{"encoding":"UTF-8", "min":6, "max":100}})
     * @Annotation\Validator({"name":"Alnum", "options":{"allowWhiteSpace":true}})
     * @Annotation\Required(true)
     * @Annotation\Options({
     *   "required":"true",
     *   "autocomplete":"off"
     * })
     */
    protected $answer;
    
    /**
     * Registration date
     * 
     * @var \DateTime
     * @ORM\Column(name="registered", type="datetime", nullable=true)
     * @Annotation\Attributes({"type":"datetime","min":"2010-01-01T00:00:00Z","max":"2020-01-01T00:00:00Z","step":"1"})
     * @Annotation\Options({"label":"Registration Date:", "format":"Y-m-d\TH:iP"})
     */
    protected $registered;
    
    /**
     * Registration token
     * 
     * @var \string
     * @ORM\Column(name="token", type="string", length=32, nullable=true)
     */
    protected $token;
    
    /**
     * User role
     *
     * @var \int
     * @ORM\Column(name="role", type="integer", nullable=false)
     * @Annotation\Type("Zend\Form\Element\Select")
     * @Annotation\Required(true)
     * @Annotation\Options({
     *   "required":"true",
     * })
     */
    protected $role;
    
    /**
     * User group
     *
     * @var \Auth\Entity\Usergroup
     * @ORM\ManyToOne(targetEntity="Usergroup")
     * @ORM\JoinColumn(name="usergroup", referencedColumnName="id", nullable=false)
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"Digits"})
     * @Annotation\Required(true)
     * @Annotation\Options({
     *   "required":"true",
     *   "empty_option": "User group",
     *   "target_class":"Auth\Entity\Usergroup",
     *   "property": "question"
     * })
     **/
    protected $usergroup;
    
    /**
     * Active
     *
     * @var \boolean
     * @ORM\Column(type="integer")
     */
    protected $active;
    
	/**
	 * @return the $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return the $username
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @param string $username
	 */
	public function setUsername($username) {
		$this->username = $username;
	}

	/**
	 * @return the $password
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @param string $password
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * @return the $usergroup
	 */
	public function getUsergroup() {
		return $this->usergroup;
	}

	/**
	 * @param \Auth\Entity\Usergroup $usergroup
	 */
	public function setUsergroup($usergroup) {
		$this->usergroup = $usergroup;
	}

	/**
	 * @return the $active
	 */
	public function getActive() {
		return $this->active;
	}

	/**
	 * @param boolean $active
	 */
	public function setActive($active) {
		$this->active = $active;
	}
	
	/**
	 * @return the $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return the $confirmed
	 */
	public function getConfirmed() {
		return $this->confirmed;
	}

	/**
	 * @param boolean $confirmed
	 */
	public function setConfirmed($confirmed) {
		$this->confirmed = $confirmed;
	}

	/**
	 * @return the $question
	 */
	public function getQuestion() {
		return $this->question;
	}

	/**
	 * @param \Auth\Entity\Question $question
	 */
	public function setQuestion($question) {
		$this->question = $question;
	}

	/**
	 * @return the $answer
	 */
	public function getAnswer() {
		return $this->answer;
	}

	/**
	 * @param string $answer
	 */
	public function setAnswer($answer) {
		$this->answer = $answer;
	}
	
	/**
	 * @return the $registered
	 */
	public function getRegistered() {
		return $this->registered;
	}

	/**
	 * @return the $token
	 */
	public function getToken() {
		return $this->token;
	}

	/**
	 * @param DateTime $registered
	 */
	public function setRegistered($registered) {
		$this->registered = $registered;
	}

	/**
	 * @param string $token
	 */
	public function setToken($token) {
		$this->token = $token;
	}
	
	/**
	 * @return the $role
	 */
	public function getRole() {
		return $this->role;
	}

	/**
	 * @param int $role
	 */
	public function setRole($role) {
		$this->role = $role;
	}

}