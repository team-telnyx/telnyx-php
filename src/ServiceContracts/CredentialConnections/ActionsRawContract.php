<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\CredentialConnections;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionCheckRegistrationStatusResponse>
     *
     * @throws APIException
     */
    public function checkRegistrationStatus(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
