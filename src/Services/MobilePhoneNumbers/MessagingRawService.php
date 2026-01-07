<?php

declare(strict_types=1);

namespace Telnyx\Services\MobilePhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingGetResponse;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListParams;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListParams\Page;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobilePhoneNumbers\MessagingRawContract;

/**
 * @phpstan-import-type PageShape from \Telnyx\MobilePhoneNumbers\Messaging\MessagingListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagingRawService implements MessagingRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a mobile phone number with messaging settings
     *
     * @param string $id identifies the type of resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['mobile_phone_numbers/%1$s/messaging', $id],
            options: $requestOptions,
            convert: MessagingGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List mobile phone numbers with messaging settings
     *
     * @param array{page?: Page|PageShape}|MessagingListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<MessagingListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'mobile_phone_numbers/messaging',
            query: $parsed,
            options: $options,
            convert: MessagingListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
