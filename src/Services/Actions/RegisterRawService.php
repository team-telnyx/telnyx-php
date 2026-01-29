<?php

declare(strict_types=1);

namespace Telnyx\Services\Actions;

use Telnyx\Actions\Register\RegisterCreateParams;
use Telnyx\Actions\Register\RegisterCreateParams\Status;
use Telnyx\Actions\Register\RegisterNewResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Actions\RegisterRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RegisterRawService implements RegisterRawContract
{
    // @phpstan-ignore-next-line
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
     *   registrationCodes: list<string>,
     *   simCardGroupID?: string,
     *   status?: Status|value-of<Status>,
     *   tags?: list<string>,
     * }|RegisterCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RegisterNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|RegisterCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RegisterCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'actions/register/sim_cards',
            body: (object) $parsed,
            options: $options,
            convert: RegisterNewResponse::class,
        );
    }
}
