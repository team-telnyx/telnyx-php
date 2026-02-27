<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AvailablePhoneNumbersContract;

/**
 * Number search.
 *
 * @phpstan-import-type FilterShape from \Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AvailablePhoneNumbersService implements AvailablePhoneNumbersContract
{
    /**
     * @api
     */
    public AvailablePhoneNumbersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AvailablePhoneNumbersRawService($client);
    }

    /**
     * @api
     *
     * List available phone numbers
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[locality], filter[administrative_area], filter[country_code], filter[national_destination_code], filter[rate_center], filter[phone_number_type], filter[features], filter[limit], filter[best_effort], filter[quickship], filter[reservable], filter[exclude_held_numbers]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): AvailablePhoneNumberListResponse {
        $params = Util::removeNulls(['filter' => $filter]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
