<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumbers\Messaging\MessagingGetResponse;
use Telnyx\PhoneNumbers\Messaging\MessagingListParams\Page;
use Telnyx\PhoneNumbers\Messaging\MessagingUpdateResponse;
use Telnyx\PhoneNumberWithMessagingSettings;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\MessagingContract;

/**
 * @phpstan-import-type PageShape from \Telnyx\PhoneNumbers\Messaging\MessagingListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagingService implements MessagingContract
{
    /**
     * @api
     */
    public MessagingRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagingRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a phone number with messaging settings
     *
     * @param string $id identifies the type of resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MessagingGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the messaging profile and/or messaging product of a phone number
     *
     * @param string $id the phone number to update
     * @param string $messagingProduct Configure the messaging product for this number:
     *
     * * Omit this field or set its value to `null` to keep the current value.
     * * Set this field to a quoted product ID to set this phone number to that product
     * @param string $messagingProfileID Configure the messaging profile this phone number is assigned to:
     *
     * * Omit this field or set its value to `null` to keep the current value.
     * * Set this field to `""` to unassign the number from its messaging profile
     * * Set this field to a quoted UUID of a messaging profile to assign this number to that messaging profile
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $messagingProduct = null,
        ?string $messagingProfileID = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessagingUpdateResponse {
        $params = Util::removeNulls(
            [
                'messagingProduct' => $messagingProduct,
                'messagingProfileID' => $messagingProfileID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List phone numbers with messaging settings
     *
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<PhoneNumberWithMessagingSettings>
     *
     * @throws APIException
     */
    public function list(
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null
    ): DefaultPagination {
        $params = Util::removeNulls(['page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
