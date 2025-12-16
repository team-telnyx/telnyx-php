<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListParams\Filter;

/**
 * Get a list of phone numbers associated to orders.
 *
 * @see Telnyx\Services\NumberOrderPhoneNumbersService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListParams\Filter
 *
 * @phpstan-type NumberOrderPhoneNumberListParamsShape = array{
 *   filter?: FilterShape|null
 * }
 */
final class NumberOrderPhoneNumberListParams implements BaseModel
{
    /** @use SdkModel<NumberOrderPhoneNumberListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[country_code].
     */
    #[Optional]
    public ?Filter $filter;

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
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[country_code].
     *
     * @param FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }
}
