<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\NumberType;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\Source;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\Status;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\VoiceConnectionName;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\VoiceUsagePaymentMethod;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Page;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Sort;

/**
 * List phone numbers, This endpoint is a lighter version of the /phone_numbers endpoint having higher performance and rate limit.
 *
 * @see Telnyx\Services\PhoneNumbersService::slimList()
 *
 * @phpstan-type PhoneNumberSlimListParamsShape = array{
 *   filter?: Filter|array{
 *     billing_group_id?: string|null,
 *     connection_id?: string|null,
 *     country_iso_alpha2?: string|null|list<string>,
 *     customer_reference?: string|null,
 *     emergency_address_id?: string|null,
 *     number_type?: NumberType|null,
 *     phone_number?: string|null,
 *     source?: value-of<Source>|null,
 *     status?: value-of<Status>|null,
 *     tag?: string|null,
 *     voice_connection_name?: VoiceConnectionName|null,
 *     voice_usage_payment_method?: value-of<VoiceUsagePaymentMethod>|null,
 *   },
 *   include_connection?: bool,
 *   include_tags?: bool,
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   sort?: Sort|value-of<Sort>,
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
    public ?bool $include_connection;

    /**
     * Include the tags associated with the phone number.
     */
    #[Optional]
    public ?bool $include_tags;

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
     * @param Filter|array{
     *   billing_group_id?: string|null,
     *   connection_id?: string|null,
     *   country_iso_alpha2?: string|list<string>|null,
     *   customer_reference?: string|null,
     *   emergency_address_id?: string|null,
     *   number_type?: NumberType|null,
     *   phone_number?: string|null,
     *   source?: value-of<Source>|null,
     *   status?: value-of<Status>|null,
     *   tag?: string|null,
     *   voice_connection_name?: VoiceConnectionName|null,
     *   voice_usage_payment_method?: value-of<VoiceUsagePaymentMethod>|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     * @param Sort|value-of<Sort> $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        ?bool $include_connection = null,
        ?bool $include_tags = null,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $include_connection && $obj['include_connection'] = $include_connection;
        null !== $include_tags && $obj['include_tags'] = $include_tags;
        null !== $page && $obj['page'] = $page;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source].
     *
     * @param Filter|array{
     *   billing_group_id?: string|null,
     *   connection_id?: string|null,
     *   country_iso_alpha2?: string|list<string>|null,
     *   customer_reference?: string|null,
     *   emergency_address_id?: string|null,
     *   number_type?: NumberType|null,
     *   phone_number?: string|null,
     *   source?: value-of<Source>|null,
     *   status?: value-of<Status>|null,
     *   tag?: string|null,
     *   voice_connection_name?: VoiceConnectionName|null,
     *   voice_usage_payment_method?: value-of<VoiceUsagePaymentMethod>|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Include the connection associated with the phone number.
     */
    public function withIncludeConnection(bool $includeConnection): self
    {
        $obj = clone $this;
        $obj['include_connection'] = $includeConnection;

        return $obj;
    }

    /**
     * Include the tags associated with the phone number.
     */
    public function withIncludeTags(bool $includeTags): self
    {
        $obj = clone $this;
        $obj['include_tags'] = $includeTags;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    /**
     * Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }
}
