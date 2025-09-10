<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Recordings;

use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @param list<string> $ids list of call recording IDs to delete
     */
    public function delete(
        $ids,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
