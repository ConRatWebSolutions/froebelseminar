<?php

declare(strict_types=1);

namespace Conrat\c4theme\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Contact model
 */
class Contact extends AbstractEntity
{
    /**
     * @var string
     */
    protected string $name = '';

    /**
     * @var string
     */
    protected string $email = '';

    /**
     * @var string
     */
    protected string $subject = '';

    /**
     * @var string
     */
    protected string $message = '';

    /**
     * @var bool
     */
    protected bool $hidden = false;

    /**
     * @var \DateTime|null
     */
    protected ?\DateTime $starttime = null;

    /**
     * @var \DateTime|null
     */
    protected ?\DateTime $endtime = null;

    /**
     * @var string
     */
    protected string $feGroup = '';

    /**
     * Get name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Get subject
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * Set subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * Get message
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Set message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * Get hidden
     */
    public function getHidden(): bool
    {
        return $this->hidden;
    }

    /**
     * Set hidden
     */
    public function setHidden(bool $hidden): void
    {
        $this->hidden = $hidden;
    }

    /**
     * Get starttime
     */
    public function getStarttime(): ?\DateTime
    {
        return $this->starttime;
    }

    /**
     * Set starttime
     */
    public function setStarttime(?\DateTime $starttime): void
    {
        $this->starttime = $starttime;
    }

    /**
     * Get endtime
     */
    public function getEndtime(): ?\DateTime
    {
        return $this->endtime;
    }

    /**
     * Set endtime
     */
    public function setEndtime(?\DateTime $endtime): void
    {
        $this->endtime = $endtime;
    }

    /**
     * Get fe_group
     */
    public function getFeGroup(): string
    {
        return $this->feGroup;
    }

    /**
     * Set fe_group
     */
    public function setFeGroup(string $feGroup): void
    {
        $this->feGroup = $feGroup;
    }
} 