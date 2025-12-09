<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Recordings;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @param list<string> $ids list of call recording IDs to delete
     *
     * @throws APIException
     */
    public function delete(
        array $ids,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
