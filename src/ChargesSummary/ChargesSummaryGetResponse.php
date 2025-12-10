<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary;

use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Total;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ChargesSummaryGetResponseShape = array{data: Data}
 */
final class ChargesSummaryGetResponse implements BaseModel
{
    /** @use SdkModel<ChargesSummaryGetResponseShape> */
    use SdkModel;

    #[Required]
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
     *   endDate: string,
     *   startDate: string,
     *   summary: Summary,
     *   total: Total,
     *   userEmail: string,
     *   userID: string,
     * } $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   currency: string,
     *   endDate: string,
     *   startDate: string,
     *   summary: Summary,
     *   total: Total,
     *   userEmail: string,
     *   userID: string,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
