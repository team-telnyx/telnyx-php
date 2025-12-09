<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrderPreview;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data\ShippingCost;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data\SimCardsCost;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data\TotalCost;

/**
 * @phpstan-type SimCardOrderPreviewPreviewResponseShape = array{data?: Data|null}
 */
final class SimCardOrderPreviewPreviewResponse implements BaseModel
{
    /** @use SdkModel<SimCardOrderPreviewPreviewResponseShape> */
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
     *   quantity?: int|null,
     *   recordType?: string|null,
     *   shippingCost?: ShippingCost|null,
     *   simCardsCost?: SimCardsCost|null,
     *   totalCost?: TotalCost|null,
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
     *   quantity?: int|null,
     *   recordType?: string|null,
     *   shippingCost?: ShippingCost|null,
     *   simCardsCost?: SimCardsCost|null,
     *   totalCost?: TotalCost|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
