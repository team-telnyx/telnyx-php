<?php

declare(strict_types=1);

namespace Telnyx\Brand;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Telnyx-specific extensions to The Campaign Registry's `Brand` type.
 *
 * @phpstan-type brand_get_response = array{assignedCampaignsCount?: float|null}
 */
final class BrandGetResponse implements BaseModel
{
    /** @use SdkModel<brand_get_response> */
    use SdkModel;

    /**
     * Number of campaigns associated with the brand.
     */
    #[Api(optional: true)]
    public ?float $assignedCampaignsCount;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?float $assignedCampaignsCount = null): self
    {
        $obj = new self;

        null !== $assignedCampaignsCount && $obj->assignedCampaignsCount = $assignedCampaignsCount;

        return $obj;
    }

    /**
     * Number of campaigns associated with the brand.
     */
    public function withAssignedCampaignsCount(
        float $assignedCampaignsCount
    ): self {
        $obj = clone $this;
        $obj->assignedCampaignsCount = $assignedCampaignsCount;

        return $obj;
    }
}
