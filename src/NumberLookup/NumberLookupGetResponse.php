<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\CallerName;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\Carrier;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\Portability;

/**
 * @phpstan-type NumberLookupGetResponseShape = array{data?: Data|null}
 */
final class NumberLookupGetResponse implements BaseModel
{
    /** @use SdkModel<NumberLookupGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   callerName?: CallerName|null,
     *   carrier?: Carrier|null,
     *   countryCode?: string|null,
     *   fraud?: string|null,
     *   nationalFormat?: string|null,
     *   phoneNumber?: string|null,
     *   portability?: Portability|null,
     *   recordType?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   callerName?: CallerName|null,
     *   carrier?: Carrier|null,
     *   countryCode?: string|null,
     *   fraud?: string|null,
     *   nationalFormat?: string|null,
     *   phoneNumber?: string|null,
     *   portability?: Portability|null,
     *   recordType?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
