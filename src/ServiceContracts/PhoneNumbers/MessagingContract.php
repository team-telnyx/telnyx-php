<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\PhoneNumbers\Messaging\MessagingGetResponse;
use Telnyx\PhoneNumbers\Messaging\MessagingListParams\FilterType;
use Telnyx\PhoneNumbers\Messaging\MessagingListParams\SortPhoneNumber;
use Telnyx\PhoneNumbers\Messaging\MessagingUpdateResponse;
use Telnyx\PhoneNumberWithMessagingSettings;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagingContract
{
    /**
     * @api
     *
     * @param string $id identifies the type of resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MessagingGetResponse;

    /**
     * @api
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
    ): MessagingUpdateResponse;

    /**
     * @api
     *
     * @param string $filterMessagingProfileID filter by messaging profile ID
     * @param string $filterPhoneNumber filter by exact phone number (supports comma-separated list)
     * @param string $filterPhoneNumberContains filter by phone number substring
     * @param FilterType|value-of<FilterType> $filterType filter by phone number type
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
        FilterType|string|null $filterType = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        SortPhoneNumber|string|null $sortPhoneNumber = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
