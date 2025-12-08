<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup;

use Telnyx\Core\Attributes\Api;
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

    #[Api(optional: true)]
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
     *   caller_name?: CallerName|null,
     *   carrier?: Carrier|null,
     *   country_code?: string|null,
     *   fraud?: string|null,
     *   national_format?: string|null,
     *   phone_number?: string|null,
     *   portability?: Portability|null,
     *   record_type?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   caller_name?: CallerName|null,
     *   carrier?: Carrier|null,
     *   country_code?: string|null,
     *   fraud?: string|null,
     *   national_format?: string|null,
     *   phone_number?: string|null,
     *   portability?: Portability|null,
     *   record_type?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
