<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumberBlocks;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams\Filter;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List available phone number blocks.
 *
 * @see Telnyx\Services\AvailablePhoneNumberBlocksService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams\Filter
 *
 * @phpstan-type AvailablePhoneNumberBlockListParamsShape = array{
 *   filter?: FilterShape|null
 * }
 */
final class AvailablePhoneNumberBlockListParams implements BaseModel
{
    /** @use SdkModel<AvailablePhoneNumberBlockListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[locality], filter[country_code], filter[national_destination_code], filter[phone_number_type].
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
     * Consolidated filter parameter (deepObject style). Originally: filter[locality], filter[country_code], filter[national_destination_code], filter[phone_number_type].
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
