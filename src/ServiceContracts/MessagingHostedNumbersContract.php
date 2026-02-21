<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberDeleteResponse;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberGetResponse;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberListParams\SortPhoneNumber;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberUpdateResponse;
use Telnyx\PhoneNumberWithMessagingSettings;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagingHostedNumbersContract
{
    /**
     * @api
     *
     * @param string $id the ID or phone number of the hosted number
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MessagingHostedNumberGetResponse;

    /**
     * @api
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
    ): MessagingHostedNumberUpdateResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id identifies the type of resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MessagingHostedNumberDeleteResponse;
}
