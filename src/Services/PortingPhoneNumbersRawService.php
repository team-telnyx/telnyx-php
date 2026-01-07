<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Filter;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Page;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingPhoneNumbersRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PortingPhoneNumbersRawService implements PortingPhoneNumbersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a list of your porting phone numbers.
     *
     * @param array{
     *   filter?: Filter|FilterShape, page?: Page|PageShape
     * }|PortingPhoneNumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<PortingPhoneNumberListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|PortingPhoneNumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PortingPhoneNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'porting_phone_numbers',
            query: $parsed,
            options: $options,
            convert: PortingPhoneNumberListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
