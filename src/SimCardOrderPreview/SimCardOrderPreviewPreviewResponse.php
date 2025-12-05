<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrderPreview;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data\ShippingCost;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data\SimCardsCost;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data\TotalCost;

/**
 * @phpstan-type SimCardOrderPreviewPreviewResponseShape = array{data?: Data|null}
 */
final class SimCardOrderPreviewPreviewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<SimCardOrderPreviewPreviewResponseShape> */
    use SdkModel;

    use SdkResponse;

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
     *   quantity?: int|null,
     *   record_type?: string|null,
     *   shipping_cost?: ShippingCost|null,
     *   sim_cards_cost?: SimCardsCost|null,
     *   total_cost?: TotalCost|null,
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
     *   quantity?: int|null,
     *   record_type?: string|null,
     *   shipping_cost?: ShippingCost|null,
     *   sim_cards_cost?: SimCardsCost|null,
     *   total_cost?: TotalCost|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
