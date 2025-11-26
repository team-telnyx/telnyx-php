<?php

declare(strict_types=1);

namespace Telnyx\Services\Actions;

use Telnyx\Actions\Register\RegisterCreateParams;
use Telnyx\Actions\Register\RegisterNewResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Actions\RegisterContract;

final class RegisterService implements RegisterContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Register the SIM cards associated with the provided registration codes to the current user's account.<br/><br/>
     * If <code>sim_card_group_id</code> is provided, the SIM cards will be associated with that group. Otherwise, the default group for the current user will be used.<br/><br/>
     *
     * @param array{
     *   registration_codes: list<string>,
     *   sim_card_group_id?: string,
     *   status?: 'enabled'|'disabled'|'standby',
     *   tags?: list<string>,
     * }|RegisterCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|RegisterCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): RegisterNewResponse {
        [$parsed, $options] = RegisterCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'actions/register/sim_cards',
            body: (object) $parsed,
            options: $options,
            convert: RegisterNewResponse::class,
        );
    }
}
