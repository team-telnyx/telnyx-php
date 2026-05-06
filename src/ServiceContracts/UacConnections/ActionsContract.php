<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\UacConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\UacConnections\Actions\ActionCheckRegistrationStatusResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function checkRegistrationStatus(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionCheckRegistrationStatusResponse;
}
