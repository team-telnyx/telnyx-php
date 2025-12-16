<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter;
use Telnyx\PhoneNumbers\PhoneNumberListParams\HandleMessagingProfileError;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Page;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Sort;

/**
 * List phone numbers.
 *
 * @see Telnyx\Services\PhoneNumbersService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\PhoneNumberListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PhoneNumbers\PhoneNumberListParams\Page
 *
 * @phpstan-type PhoneNumberListParamsShape = array{
 *   filter?: FilterShape|null,
 *   handleMessagingProfileError?: null|HandleMessagingProfileError|value-of<HandleMessagingProfileError>,
 *   page?: PageShape|null,
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

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

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
     * @param FilterShape $filter
     * @param HandleMessagingProfileError|value-of<HandleMessagingProfileError> $handleMessagingProfileError
     * @param PageShape $page
     * @param Sort|value-of<Sort> $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        HandleMessagingProfileError|string|null $handleMessagingProfileError = null,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $handleMessagingProfileError && $self['handleMessagingProfileError'] = $handleMessagingProfileError;
        null !== $page && $self['page'] = $page;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source].
     *
     * @param FilterShape $filter
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

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

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
