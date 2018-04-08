<?php

/**
 * Event management
 *
 * @category       Tollwerk
 * @package        Tollwerk_Events
 * @author         Joschi Kuphal <joschi@kuphal.net>
 * @copyright      Copyright © 2014 tollwerk GmbH <info@tollwerk.de>
 * @license        http://opensource.org/licenses/BSD-3-Clause	The BSD 3-Clause License
 */

namespace Auth\Entity;

/**
 * Questions
 *
 * @ORM\Table(name="question")
 * @ORM\Entity
 */
class Question extends AbstractEntity
{

    /**
     * Security question
     *
     * @var string
     * @ORM\Column(name="question", type="string", length=50, nullable=false, unique=true)
     */
    protected $question;

    /**
     * @return the $question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param string $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }
}
