<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.02.14
 * Time: 23:23
 */

namespace Coders\Bundle\CoreBundle\Data;


interface Repository {
    public function getAll();

    public function add(Entry $e);

    public function delete(Entry $e);

    /** @param Entry[] $entries */
    public function set(array $entries);
} 