<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Filter;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingPhoneNumbersContract;

/**
 * Endpoints related to porting orders management.
 *
 * @phpstan-import-type FilterShape from \Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PortingPhoneNumbersService implements PortingPhoneNumbersContract
{
    /**
     * @api
     */
    public PortingPhoneNumbersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PortingPhoneNumbersRawService($client);
    }

    /**
     * @api
     *
     * Returns a list of your porting phone numbers.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[porting_order_status]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PortingPhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
