<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter\ConnectionName;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter\VoiceUsagePaymentMethod;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Page;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Sort;

/**
 * List phone numbers with voice settings.
 *
 * @see Telnyx\Services\PhoneNumbers\VoiceService::list()
 *
 * @phpstan-type VoiceListParamsShape = array{
 *   filter?: Filter|array{
 *     connectionName?: ConnectionName|null,
 *     customerReference?: string|null,
 *     phoneNumber?: string|null,
 *     voiceUsagePaymentMethod?: value-of<VoiceUsagePaymentMethod>|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   sort?: Sort|value-of<Sort>,
 * }
 */
final class VoiceListParams implements BaseModel
{
    /** @use SdkModel<VoiceListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[connection_name], filter[customer_reference], filter[voice.usage_payment_method].
     */
    #[Optional]
    public ?Filter $filter;

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
     *   connectionName?: ConnectionName|null,
     *   customerReference?: string|null,
     *   phoneNumber?: string|null,
     *   voiceUsagePaymentMethod?: value-of<VoiceUsagePaymentMethod>|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     * @param Sort|value-of<Sort> $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[connection_name], filter[customer_reference], filter[voice.usage_payment_method].
     *
     * @param Filter|array{
     *   connectionName?: ConnectionName|null,
     *   customerReference?: string|null,
     *   phoneNumber?: string|null,
     *   voiceUsagePaymentMethod?: value-of<VoiceUsagePaymentMethod>|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
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
