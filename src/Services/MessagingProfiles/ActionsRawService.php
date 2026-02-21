<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingProfiles;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingProfiles\Actions\ActionRegenerateSecretResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingProfiles\ActionsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Regenerate the v1 secret for a messaging profile.
     *
     * @param string $id the identifier of the messaging profile
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionRegenerateSecretResponse>
     *
     * @throws APIException
     */
    public function regenerateSecret(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['messaging_profiles/%1$s/actions/regenerate_secret', $id],
            options: $requestOptions,
            convert: ActionRegenerateSecretResponse::class,
        );
    }
}
