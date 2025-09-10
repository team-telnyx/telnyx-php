<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary;

use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type charges_summary_get_response = array{data: Data}
 */
final class ChargesSummaryGetResponse implements BaseModel
{
    /** @use SdkModel<charges_summary_get_response> */
    use SdkModel;

    #[Api]
    public Data $data;

    /**
     * `new ChargesSummaryGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChargesSummaryGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChargesSummaryGetResponse)->withData(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(Data $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    public function withData(Data $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
