<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary;

use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Total;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ChargesSummaryGetResponseShape = array{data: Data}
 */
final class ChargesSummaryGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ChargesSummaryGetResponseShape> */
    use SdkModel;

    use SdkResponse;

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
     *
     * @param Data|array{
     *   currency: string,
     *   end_date: \DateTimeInterface,
     *   start_date: \DateTimeInterface,
     *   summary: Summary,
     *   total: Total,
     *   user_email: string,
     *   user_id: string,
     * } $data
     */
    public static function with(Data|array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   currency: string,
     *   end_date: \DateTimeInterface,
     *   start_date: \DateTimeInterface,
     *   summary: Summary,
     *   total: Total,
     *   user_email: string,
     *   user_id: string,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
