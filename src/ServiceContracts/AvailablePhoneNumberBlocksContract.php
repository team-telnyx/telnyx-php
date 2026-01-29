<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams\Filter;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AvailablePhoneNumberBlocksContract
{
    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[locality], filter[country_code], filter[national_destination_code], filter[phone_number_type]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): AvailablePhoneNumberBlockListResponse;
}
