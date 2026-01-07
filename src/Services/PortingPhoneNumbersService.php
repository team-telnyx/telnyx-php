<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Filter;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Page;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingPhoneNumbersContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Page
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
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<PortingPhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
