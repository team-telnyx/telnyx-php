<?php

declare(strict_types=1);

namespace Telnyx\Brand;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Telnyx-specific extensions to The Campaign Registry's `Brand` type.
 *
 * @phpstan-type unnamed_type_with_intersection_parent2 = array{
 *   assignedCampaignsCount?: float
 * }
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class BrandGetResponse implements BaseModel
{
    /** @use SdkModel<unnamed_type_with_intersection_parent2> */
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
