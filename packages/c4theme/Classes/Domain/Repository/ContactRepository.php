<?php

declare(strict_types=1);

namespace Conrat\c4theme\Domain\Repository;

use Conrat\c4theme\Domain\Model\Contact;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Contact repository
 */
class ContactRepository extends Repository
{
    /**
     * Find all contacts ordered by creation date (newest first)
     *
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findAllOrderedByDate()
    {
        $query = $this->createQuery();
        return $query->setOrderings(['crdate' => QueryInterface::ORDER_DESCENDING])->execute();
    }

    /**
     * Find contacts by email
     *
     * @param string $email
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findByEmail(string $email)
    {
        $query = $this->createQuery();
        return $query->matching($query->equals('email', $email))->execute();
    }

    /**
     * Find contacts by subject
     *
     * @param string $subject
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findBySubject(string $subject)
    {
        $query = $this->createQuery();
        return $query->matching($query->like('subject', '%' . $subject . '%'))->execute();
    }

    /**
     * Count all contacts
     *
     * @return int
     */
    public function countAll(): int
    {
        $query = $this->createQuery();
        return $query->count();
    }
} 