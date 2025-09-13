<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\CredentialConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @return ActionCheckRegistrationStatusResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function checkRegistrationStatus(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionCheckRegistrationStatusResponse;

    /**
     * @api
     *
     * @return ActionCheckRegistrationStatusResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function checkRegistrationStatusRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ActionCheckRegistrationStatusResponse;
}
