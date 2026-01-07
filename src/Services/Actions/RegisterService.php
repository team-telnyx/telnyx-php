<?php

declare(strict_types=1);

namespace Telnyx\Services\Actions;

use Telnyx\Actions\Register\RegisterCreateParams\Status;
use Telnyx\Actions\Register\RegisterNewResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Actions\RegisterContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RegisterService implements RegisterContract
{
    /**
     * @api
     */
    public RegisterRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RegisterRawService($client);
    }

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $registrationCodes,
        ?string $simCardGroupID = null,
        Status|string $status = 'enabled',
        ?array $tags = null,
        RequestOptions|array|null $requestOptions = null,
    ): RegisterNewResponse {
        $params = Util::removeNulls(
            [
                'registrationCodes' => $registrationCodes,
                'simCardGroupID' => $simCardGroupID,
                'status' => $status,
                'tags' => $tags,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
