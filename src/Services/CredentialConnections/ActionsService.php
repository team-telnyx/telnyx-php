<?php

declare(strict_types=1);

namespace Telnyx\Services\CredentialConnections;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CredentialConnections\ActionsContract;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Checks the registration_status for a credential connection, (`registration_status`) as well as the timestamp for the last SIP registration event (`registration_status_updated_at`)
     *
     * @return ActionCheckRegistrationStatusResponse<HasRawResponse>
     */
    public function checkRegistrationStatus(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionCheckRegistrationStatusResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'credential_connections/%1$s/actions/check_registration_status', $id,
            ],
            options: $requestOptions,
            convert: ActionCheckRegistrationStatusResponse::class,
        );
    }
}
