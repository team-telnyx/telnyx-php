<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse;
use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AvailablePhoneNumbersContract;

use const Telnyx\Core\OMIT as omit;

final class AvailablePhoneNumbersService implements AvailablePhoneNumbersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List available phone numbers
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[locality], filter[administrative_area], filter[country_code], filter[national_destination_code], filter[rate_center], filter[phone_number_type], filter[features], filter[limit], filter[best_effort], filter[quickship], filter[reservable], filter[exclude_held_numbers]
     *
     * @return AvailablePhoneNumberListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): AvailablePhoneNumberListResponse {
        [$parsed, $options] = AvailablePhoneNumberListParams::parseRequest(
            ['filter' => $filter],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'available_phone_numbers',
            query: $parsed,
            options: $options,
            convert: AvailablePhoneNumberListResponse::class,
        );
    }
}
