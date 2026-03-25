<?php

declare(strict_types=1);

namespace Telnyx\Services\TermsOfService;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TermsOfService\NumberReputationRawContract;

/**
 * Terms of Service agreement endpoints.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NumberReputationRawService implements NumberReputationRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Accept the Terms of Service for the Number Reputation product. Must be called before using Number Reputation endpoints.
     *
     * Returns `400` with error code `10015` if the user has already agreed to the current ToS version.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function agree(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'terms_of_service/number_reputation/agree',
            options: $requestOptions,
            convert: null,
        );
    }
}
