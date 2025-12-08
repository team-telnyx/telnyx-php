<?php

declare(strict_types=1);

namespace Telnyx\Services\CredentialConnections;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
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
     * @throws APIException
     */
    public function checkRegistrationStatus(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionCheckRegistrationStatusResponse {
        /** @var BaseResponse<ActionCheckRegistrationStatusResponse> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'credential_connections/%1$s/actions/check_registration_status', $id,
            ],
            options: $requestOptions,
            convert: ActionCheckRegistrationStatusResponse::class,
        );

        return $response->parse();
    }
}
