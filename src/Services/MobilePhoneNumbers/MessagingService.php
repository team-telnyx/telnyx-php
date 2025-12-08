<?php

declare(strict_types=1);

namespace Telnyx\Services\MobilePhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingGetResponse;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListParams;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobilePhoneNumbers\MessagingContract;

final class MessagingService implements MessagingContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a mobile phone number with messaging settings
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingGetResponse {
        /** @var BaseResponse<MessagingGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['mobile_phone_numbers/%1$s/messaging', $id],
            options: $requestOptions,
            convert: MessagingGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List mobile phone numbers with messaging settings
     *
     * @param array{page?: array{number?: int, size?: int}}|MessagingListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|MessagingListParams $params,
        ?RequestOptions $requestOptions = null
    ): MessagingListResponse {
        [$parsed, $options] = MessagingListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<MessagingListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'mobile_phone_numbers/messaging',
            query: $parsed,
            options: $options,
            convert: MessagingListResponse::class,
        );

        return $response->parse();
    }
}
