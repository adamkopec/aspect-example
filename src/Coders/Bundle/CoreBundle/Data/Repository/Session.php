<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.02.14
 * Time: 23:23
 */

namespace Coders\Bundle\CoreBundle\Data\Repository;
use Coders\Bundle\CoreBundle\Data\Entry;
use Coders\Bundle\CoreBundle\Data\Repository;

class Session implements Repository {

    /** @var  \Symfony\Component\HttpFoundation\Session\Session */
    protected $session;

    /**
     * @param \Symfony\Component\HttpFoundation\Session\Session $session
     */
    public function setSession($session)
    {
        $this->session = $session;
    }

    public function getAll()
    {
        return $this->session->get('entries', array());
    }

    public function add(Entry $e)
    {
        $newEntries = $this->getAll();
        $newEntries[] = $e;
        $this->set($newEntries);
    }

    public function delete(Entry $e)
    {
        $entries = $this->getAll();
        foreach($entries as $index => $entry) {
            if ($entry == $e) {
                unset($entries[$index]);
                break;
            }
        }
        $this->set($entries);
    }

    /** @param Entry[] $entries */
    public function set(array $entries)
    {
        $this->session->set('entries', $entries);
    }
}