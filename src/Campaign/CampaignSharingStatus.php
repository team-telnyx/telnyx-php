<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CampaignSharingStatusShape = array{
 *   downstreamCnpID?: string,
 *   sharedDate?: string,
 *   sharingStatus?: string,
 *   statusDate?: string,
 *   upstreamCnpID?: string,
 * }
 */
final class CampaignSharingStatus implements BaseModel
{
    /** @use SdkModel<CampaignSharingStatusShape> */
    use SdkModel;

    #[Api('downstreamCnpId', optional: true)]
    public ?string $downstreamCnpID;

    #[Api(optional: true)]
    public ?string $sharedDate;

    #[Api(optional: true)]
    public ?string $sharingStatus;

    #[Api(optional: true)]
    public ?string $statusDate;

    #[Api('upstreamCnpId', optional: true)]
    public ?string $upstreamCnpID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $downstreamCnpID = null,
        ?string $sharedDate = null,
        ?string $sharingStatus = null,
        ?string $statusDate = null,
        ?string $upstreamCnpID = null,
    ): self {
        $obj = new self;

        null !== $downstreamCnpID && $obj->downstreamCnpID = $downstreamCnpID;
        null !== $sharedDate && $obj->sharedDate = $sharedDate;
        null !== $sharingStatus && $obj->sharingStatus = $sharingStatus;
        null !== $statusDate && $obj->statusDate = $statusDate;
        null !== $upstreamCnpID && $obj->upstreamCnpID = $upstreamCnpID;

        return $obj;
    }

    public function withDownstreamCnpID(string $downstreamCnpID): self
    {
        $obj = clone $this;
        $obj->downstreamCnpID = $downstreamCnpID;

        return $obj;
    }

    public function withSharedDate(string $sharedDate): self
    {
        $obj = clone $this;
        $obj->sharedDate = $sharedDate;

        return $obj;
    }

    public function withSharingStatus(string $sharingStatus): self
    {
        $obj = clone $this;
        $obj->sharingStatus = $sharingStatus;

        return $obj;
    }

    public function withStatusDate(string $statusDate): self
    {
        $obj = clone $this;
        $obj->statusDate = $statusDate;

        return $obj;
    }

    public function withUpstreamCnpID(string $upstreamCnpID): self
    {
        $obj = clone $this;
        $obj->upstreamCnpID = $upstreamCnpID;

        return $obj;
    }
}
