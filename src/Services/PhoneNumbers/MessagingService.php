<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PhoneNumbers\Messaging\MessagingGetResponse;
use Telnyx\PhoneNumbers\Messaging\MessagingListParams;
use Telnyx\PhoneNumbers\Messaging\MessagingListParams\Page;
use Telnyx\PhoneNumbers\Messaging\MessagingListResponse;
use Telnyx\PhoneNumbers\Messaging\MessagingUpdateParams;
use Telnyx\PhoneNumbers\Messaging\MessagingUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\MessagingContract;

use const Telnyx\Core\OMIT as omit;

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
     * @return MessagingGetResponse<HasRawResponse>
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
     * @param string $messagingProduct Configure the messaging product for this number:
     *
     * * Omit this field or set its value to `null` to keep the current value.
     * * Set this field to a quoted product ID to set this phone number to that product
     * @param string $messagingProfileID Configure the messaging profile this phone number is assigned to:
     *
     * * Omit this field or set its value to `null` to keep the current value.
     * * Set this field to `""` to unassign the number from its messaging profile
     * * Set this field to a quoted UUID of a messaging profile to assign this number to that messaging profile
     *
     * @return MessagingUpdateResponse<HasRawResponse>
     */
    public function update(
        string $id,
        $messagingProduct = omit,
        $messagingProfileID = omit,
        ?RequestOptions $requestOptions = null,
    ): MessagingUpdateResponse {
        [$parsed, $options] = MessagingUpdateParams::parseRequest(
            [
                'messagingProduct' => $messagingProduct,
                'messagingProfileID' => $messagingProfileID,
            ],
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
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return MessagingListResponse<HasRawResponse>
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): MessagingListResponse {
        [$parsed, $options] = MessagingListParams::parseRequest(
            ['page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'phone_numbers/messaging',
            query: $parsed,
            options: $options,
            convert: MessagingListResponse::class,
        );
    }
}
