<?php

declare(strict_types=1);

namespace Telnyx\Services\Actions;

use Telnyx\Actions\Register\RegisterCreateParams;
use Telnyx\Actions\Register\RegisterCreateParams\Status;
use Telnyx\Actions\Register\RegisterNewResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Actions\RegisterContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param list<string> $registrationCodes
     * @param string $simCardGroupID The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     * @param Status|value-of<Status> $status status on which the SIM card will be set after being successful registered
     * @param list<string> $tags Searchable tags associated with the SIM card
     *
     * @throws APIException
     */
    public function create(
        $registrationCodes,
        $simCardGroupID = omit,
        $status = omit,
        $tags = omit,
        ?RequestOptions $requestOptions = null,
    ): RegisterNewResponse {
        $params = [
            'registrationCodes' => $registrationCodes,
            'simCardGroupID' => $simCardGroupID,
            'status' => $status,
            'tags' => $tags,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): RegisterNewResponse {
        [$parsed, $options] = RegisterCreateParams::parseRequest(
            $params,
            $requestOptions
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
