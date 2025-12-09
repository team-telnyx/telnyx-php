<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Messaging\MessagingGetResponse;
use Telnyx\PhoneNumbers\Messaging\MessagingListParams;
use Telnyx\PhoneNumbers\Messaging\MessagingListResponse;
use Telnyx\PhoneNumbers\Messaging\MessagingUpdateParams;
use Telnyx\PhoneNumbers\Messaging\MessagingUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\MessagingContract;

final class MessagingService implements MessagingContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a phone number with messaging settings
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
            path: ['phone_numbers/%1$s/messaging', $id],
            options: $requestOptions,
            convert: MessagingGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the messaging profile and/or messaging product of a phone number
     *
     * @param array{
     *   messagingProduct?: string, messagingProfileID?: string
     * }|MessagingUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MessagingUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingUpdateResponse {
        [$parsed, $options] = MessagingUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<MessagingUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['phone_numbers/%1$s/messaging', $id],
            body: (object) $parsed,
            options: $options,
            convert: MessagingUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List phone numbers with messaging settings
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
            path: 'phone_numbers/messaging',
            query: $parsed,
            options: $options,
            convert: MessagingListResponse::class,
        );

        return $response->parse();
    }
}
