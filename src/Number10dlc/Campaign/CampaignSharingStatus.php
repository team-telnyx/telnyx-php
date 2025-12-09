<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Campaign;

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
        $self = new self;

        null !== $downstreamCnpID && $self['downstreamCnpID'] = $downstreamCnpID;
        null !== $sharedDate && $self['sharedDate'] = $sharedDate;
        null !== $sharingStatus && $self['sharingStatus'] = $sharingStatus;
        null !== $statusDate && $self['statusDate'] = $statusDate;
        null !== $upstreamCnpID && $self['upstreamCnpID'] = $upstreamCnpID;

        return $self;
    }

    public function withDownstreamCnpID(string $downstreamCnpID): self
    {
        $self = clone $this;
        $self['downstreamCnpID'] = $downstreamCnpID;

        return $self;
    }

    public function withSharedDate(string $sharedDate): self
    {
        $self = clone $this;
        $self['sharedDate'] = $sharedDate;

        return $self;
    }

    public function withSharingStatus(string $sharingStatus): self
    {
        $self = clone $this;
        $self['sharingStatus'] = $sharingStatus;

        return $self;
    }

    public function withStatusDate(string $statusDate): self
    {
        $self = clone $this;
        $self['statusDate'] = $statusDate;

        return $self;
    }

    public function withUpstreamCnpID(string $upstreamCnpID): self
    {
        $self = clone $this;
        $self['upstreamCnpID'] = $upstreamCnpID;

        return $self;
    }
}
