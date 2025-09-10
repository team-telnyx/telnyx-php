<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\CredentialConnections;

use Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     */
    public function checkRegistrationStatus(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionCheckRegistrationStatusResponse;
}
