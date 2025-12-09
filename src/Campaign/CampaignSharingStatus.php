<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CampaignSharingStatusShape = array{
 *   downstreamCnpID?: string|null,
 *   sharedDate?: string|null,
 *   sharingStatus?: string|null,
 *   statusDate?: string|null,
 *   upstreamCnpID?: string|null,
 * }
 */
final class CampaignSharingStatus implements BaseModel
{
    /** @use SdkModel<CampaignSharingStatusShape> */
    use SdkModel;

    #[Optional('downstreamCnpId')]
    public ?string $downstreamCnpID;

    #[Optional]
    public ?string $sharedDate;

    #[Optional]
    public ?string $sharingStatus;

    #[Optional]
    public ?string $statusDate;

    #[Optional('upstreamCnpId')]
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

        null !== $downstreamCnpID && $obj['downstreamCnpID'] = $downstreamCnpID;
        null !== $sharedDate && $obj['sharedDate'] = $sharedDate;
        null !== $sharingStatus && $obj['sharingStatus'] = $sharingStatus;
        null !== $statusDate && $obj['statusDate'] = $statusDate;
        null !== $upstreamCnpID && $obj['upstreamCnpID'] = $upstreamCnpID;

        return $obj;
    }

    public function withDownstreamCnpID(string $downstreamCnpID): self
    {
        $obj = clone $this;
        $obj['downstreamCnpID'] = $downstreamCnpID;

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
        $obj['upstreamCnpID'] = $upstreamCnpID;

        return $obj;
    }
}
