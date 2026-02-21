<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingProfiles;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingProfiles\Actions\ActionRegenerateSecretResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingProfiles\ActionsContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * Regenerate the v1 secret for a messaging profile.
     *
     * @param string $id the identifier of the messaging profile
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function regenerateSecret(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionRegenerateSecretResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->regenerateSecret($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
