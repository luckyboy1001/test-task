<?php

namespace Features\Payment\Repos\Interfaces;

use Features\Core\Repos\Interfaces\BaseRepositoryInterface;

interface TransactionRepoInterface extends BaseRepositoryInterface
{

    public function findUsers(int $id, int $user_id);

}
