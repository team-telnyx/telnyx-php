<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Recordings;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Recordings\Actions\ActionDeleteParams;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ActionDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        array|ActionDeleteParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
