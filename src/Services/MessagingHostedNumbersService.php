<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberDeleteResponse;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberGetResponse;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberListParams\SortPhoneNumber;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberUpdateResponse;
use Telnyx\PhoneNumberWithMessagingSettings;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingHostedNumbersContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagingHostedNumbersService implements MessagingHostedNumbersContract
{
    /**
     * @api
     */
    public MessagingHostedNumbersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagingHostedNumbersRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a specific messaging hosted number by its ID or phone number.
     *
     * @param string $id the ID or phone number of the hosted number
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MessagingHostedNumberGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the messaging settings for a hosted number.
     *
     * @param string $id the ID or phone number of the hosted number
     * @param string $messagingProduct Configure the messaging product for this number:
     *
     * * Omit this field or set its value to `null` to keep the current value.
     * * Set this field to a quoted product ID to set this phone number to that product
     * @param string $messagingProfileID Configure the messaging profile this phone number is assigned to:
     *
     * * Omit this field or set its value to `null` to keep the current value.
     * * Set this field to `""` to unassign the number from its messaging profile
     * * Set this field to a quoted UUID of a messaging profile to assign this number to that messaging profile
     * @param list<string> $tags tags to set on this phone number
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $messagingProduct = null,
        ?string $messagingProfileID = null,
        ?array $tags = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessagingHostedNumberUpdateResponse {
        $params = Util::removeNulls(
            [
                'messagingProduct' => $messagingProduct,
                'messagingProfileID' => $messagingProfileID,
                'tags' => $tags,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all hosted numbers associated with the authenticated user.
     *
     * @param string $filterMessagingProfileID filter by messaging profile ID
     * @param string $filterPhoneNumber filter by exact phone number
     * @param string $filterPhoneNumberContains filter by phone number substring
     * @param SortPhoneNumber|value-of<SortPhoneNumber> $sortPhoneNumber sort by phone number
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PhoneNumberWithMessagingSettings>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterMessagingProfileID = null,
        ?string $filterPhoneNumber = null,
        ?string $filterPhoneNumberContains = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        SortPhoneNumber|string|null $sortPhoneNumber = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterMessagingProfileID' => $filterMessagingProfileID,
                'filterPhoneNumber' => $filterPhoneNumber,
                'filterPhoneNumberContains' => $filterPhoneNumberContains,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sortPhoneNumber' => $sortPhoneNumber,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a messaging hosted number
     *
     * @param string $id identifies the type of resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MessagingHostedNumberDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
