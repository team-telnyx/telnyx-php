<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\CredentialConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function checkRegistrationStatus(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionCheckRegistrationStatusResponse;
}
