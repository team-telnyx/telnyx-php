<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\CredentialConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse;
use Telnyx\RequestOptions;

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
