<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumbers\Messaging\MessagingGetResponse;
use Telnyx\PhoneNumbers\Messaging\MessagingListParams;
use Telnyx\PhoneNumbers\Messaging\MessagingUpdateParams;
use Telnyx\PhoneNumbers\Messaging\MessagingUpdateResponse;
use Telnyx\PhoneNumberWithMessagingSettings;
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['phone_numbers/%1$s/messaging', $id],
            options: $requestOptions,
            convert: MessagingGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the messaging profile and/or messaging product of a phone number
     *
     * @param array{
     *   messaging_product?: string, messaging_profile_id?: string
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['phone_numbers/%1$s/messaging', $id],
            body: (object) $parsed,
            options: $options,
            convert: MessagingUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List phone numbers with messaging settings
     *
     * @param array{page?: array{number?: int, size?: int}}|MessagingListParams $params
     *
     * @return DefaultPagination<PhoneNumberWithMessagingSettings>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination {
        [$parsed, $options] = MessagingListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'phone_numbers/messaging',
            query: $parsed,
            options: $options,
            convert: PhoneNumberWithMessagingSettings::class,
            page: DefaultPagination::class,
        );
    }
}
