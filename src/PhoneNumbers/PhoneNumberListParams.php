<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter;
use Telnyx\PhoneNumbers\PhoneNumberListParams\HandleMessagingProfileError;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Sort;

/**
 * List phone numbers.
 *
 * @see Telnyx\Services\PhoneNumbersService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\PhoneNumberListParams\Filter
 *
 * @phpstan-type PhoneNumberListParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   handleMessagingProfileError?: null|HandleMessagingProfileError|value-of<HandleMessagingProfileError>,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class PhoneNumberListParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Although it is an infrequent occurrence, due to the highly distributed nature of the Telnyx platform, it is possible that there will be an issue when loading in Messaging Profile information. As such, when this parameter is set to `true` and an error in fetching this information occurs, messaging profile related fields will be omitted in the response and an error message will be included instead of returning a 503 error.
     *
     * @var value-of<HandleMessagingProfileError>|null $handleMessagingProfileError
     */
    #[Optional(enum: HandleMessagingProfileError::class)]
    public ?string $handleMessagingProfileError;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    /**
     * Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
    public ?string $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|FilterShape|null $filter
     * @param HandleMessagingProfileError|value-of<HandleMessagingProfileError>|null $handleMessagingProfileError
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        HandleMessagingProfileError|string|null $handleMessagingProfileError = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $handleMessagingProfileError && $self['handleMessagingProfileError'] = $handleMessagingProfileError;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source].
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Although it is an infrequent occurrence, due to the highly distributed nature of the Telnyx platform, it is possible that there will be an issue when loading in Messaging Profile information. As such, when this parameter is set to `true` and an error in fetching this information occurs, messaging profile related fields will be omitted in the response and an error message will be included instead of returning a 503 error.
     *
     * @param HandleMessagingProfileError|value-of<HandleMessagingProfileError> $handleMessagingProfileError
     */
    public function withHandleMessagingProfileError(
        HandleMessagingProfileError|string $handleMessagingProfileError
    ): self {
        $self = clone $this;
        $self['handleMessagingProfileError'] = $handleMessagingProfileError;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
