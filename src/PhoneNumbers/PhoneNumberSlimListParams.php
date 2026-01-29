<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Page;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Sort;

/**
 * List phone numbers, This endpoint is a lighter version of the /phone_numbers endpoint having higher performance and rate limit.
 *
 * @see Telnyx\Services\PhoneNumbersService::slimList()
 *
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Page
 *
 * @phpstan-type PhoneNumberSlimListParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   includeConnection?: bool|null,
 *   includeTags?: bool|null,
 *   page?: null|Page|PageShape,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class PhoneNumberSlimListParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberSlimListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Include the connection associated with the phone number.
     */
    #[Optional]
    public ?bool $includeConnection;

    /**
     * Include the tags associated with the phone number.
     */
    #[Optional]
    public ?bool $includeTags;

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
     * @param Filter|FilterShape|null $filter
     * @param Page|PageShape|null $page
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        ?bool $includeConnection = null,
        ?bool $includeTags = null,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $includeConnection && $self['includeConnection'] = $includeConnection;
        null !== $includeTags && $self['includeTags'] = $includeTags;
        null !== $page && $self['page'] = $page;
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
     * Include the connection associated with the phone number.
     */
    public function withIncludeConnection(bool $includeConnection): self
    {
        $self = clone $this;
        $self['includeConnection'] = $includeConnection;

        return $self;
    }

    /**
     * Include the tags associated with the phone number.
     */
    public function withIncludeTags(bool $includeTags): self
    {
        $self = clone $this;
        $self['includeTags'] = $includeTags;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|PageShape $page
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
