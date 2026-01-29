<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Recordings;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param list<string> $ids list of call recording IDs to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        array $ids,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
