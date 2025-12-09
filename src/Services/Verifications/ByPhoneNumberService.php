<?php

declare(strict_types=1);

namespace Telnyx\Services\Verifications;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Verifications\ByPhoneNumberContract;
use Telnyx\Services\Verifications\ByPhoneNumber\ActionsService;
use Telnyx\Verifications\ByPhoneNumber\ByPhoneNumberListResponse;

final class ByPhoneNumberService implements ByPhoneNumberContract
{
    /**
     * @api
     */
    public ByPhoneNumberRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ByPhoneNumberRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * List verifications by phone number
     *
     * @param string $phoneNumber +E164 formatted phone number
     *
     * @throws APIException
     */
    public function list(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): ByPhoneNumberListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($phoneNumber, requestOptions: $requestOptions);

        return $response->parse();
    }
}
