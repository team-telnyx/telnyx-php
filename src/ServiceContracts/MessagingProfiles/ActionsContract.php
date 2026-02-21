<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MessagingProfiles;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingProfiles\Actions\ActionRegenerateSecretResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id the identifier of the messaging profile
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function regenerateSecret(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionRegenerateSecretResponse;
}
