<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CampaignSharingStatusShape = array{
 *   downstreamCnpId?: string|null,
 *   sharedDate?: string|null,
 *   sharingStatus?: string|null,
 *   statusDate?: string|null,
 *   upstreamCnpId?: string|null,
 * }
 */
final class CampaignSharingStatus implements BaseModel
{
    /** @use SdkModel<CampaignSharingStatusShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $downstreamCnpId;

    #[Api(optional: true)]
    public ?string $sharedDate;

    #[Api(optional: true)]
    public ?string $sharingStatus;

    #[Api(optional: true)]
    public ?string $statusDate;

    #[Api(optional: true)]
    public ?string $upstreamCnpId;

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
        ?string $downstreamCnpId = null,
        ?string $sharedDate = null,
        ?string $sharingStatus = null,
        ?string $statusDate = null,
        ?string $upstreamCnpId = null,
    ): self {
        $obj = new self;

        null !== $downstreamCnpId && $obj['downstreamCnpId'] = $downstreamCnpId;
        null !== $sharedDate && $obj['sharedDate'] = $sharedDate;
        null !== $sharingStatus && $obj['sharingStatus'] = $sharingStatus;
        null !== $statusDate && $obj['statusDate'] = $statusDate;
        null !== $upstreamCnpId && $obj['upstreamCnpId'] = $upstreamCnpId;

        return $obj;
    }

    public function withDownstreamCnpID(string $downstreamCnpID): self
    {
        $obj = clone $this;
        $obj['downstreamCnpId'] = $downstreamCnpID;

        return $obj;
    }

    public function withSharedDate(string $sharedDate): self
    {
        $obj = clone $this;
        $obj['sharedDate'] = $sharedDate;

        return $obj;
    }

    public function withSharingStatus(string $sharingStatus): self
    {
        $obj = clone $this;
        $obj['sharingStatus'] = $sharingStatus;

        return $obj;
    }

    public function withStatusDate(string $statusDate): self
    {
        $obj = clone $this;
        $obj['statusDate'] = $statusDate;

        return $obj;
    }

    public function withUpstreamCnpID(string $upstreamCnpID): self
    {
        $obj = clone $this;
        $obj['upstreamCnpId'] = $upstreamCnpID;

        return $obj;
    }
}
