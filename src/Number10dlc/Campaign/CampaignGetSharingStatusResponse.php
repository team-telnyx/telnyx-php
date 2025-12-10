<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Campaign;

use Telnyx\Campaign\CampaignSharingStatus;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CampaignGetSharingStatusResponseShape = array{
 *   sharedByMe?: CampaignSharingStatus|null,
 *   sharedWithMe?: CampaignSharingStatus|null,
 * }
 */
final class CampaignGetSharingStatusResponse implements BaseModel
{
    /** @use SdkModel<CampaignGetSharingStatusResponseShape> */
    use SdkModel;

    #[Optional]
    public ?CampaignSharingStatus $sharedByMe;

    #[Optional]
    public ?CampaignSharingStatus $sharedWithMe;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CampaignSharingStatus|array{
     *   downstreamCnpID?: string|null,
     *   sharedDate?: string|null,
     *   sharingStatus?: string|null,
     *   statusDate?: string|null,
     *   upstreamCnpID?: string|null,
     * } $sharedByMe
     * @param CampaignSharingStatus|array{
     *   downstreamCnpID?: string|null,
     *   sharedDate?: string|null,
     *   sharingStatus?: string|null,
     *   statusDate?: string|null,
     *   upstreamCnpID?: string|null,
     * } $sharedWithMe
     */
    public static function with(
        CampaignSharingStatus|array|null $sharedByMe = null,
        CampaignSharingStatus|array|null $sharedWithMe = null,
    ): self {
        $self = new self;

        null !== $sharedByMe && $self['sharedByMe'] = $sharedByMe;
        null !== $sharedWithMe && $self['sharedWithMe'] = $sharedWithMe;

        return $self;
    }

    /**
     * @param CampaignSharingStatus|array{
     *   downstreamCnpID?: string|null,
     *   sharedDate?: string|null,
     *   sharingStatus?: string|null,
     *   statusDate?: string|null,
     *   upstreamCnpID?: string|null,
     * } $sharedByMe
     */
    public function withSharedByMe(
        CampaignSharingStatus|array $sharedByMe
    ): self {
        $self = clone $this;
        $self['sharedByMe'] = $sharedByMe;

        return $self;
    }

    /**
     * @param CampaignSharingStatus|array{
     *   downstreamCnpID?: string|null,
     *   sharedDate?: string|null,
     *   sharingStatus?: string|null,
     *   statusDate?: string|null,
     *   upstreamCnpID?: string|null,
     * } $sharedWithMe
     */
    public function withSharedWithMe(
        CampaignSharingStatus|array $sharedWithMe
    ): self {
        $self = clone $this;
        $self['sharedWithMe'] = $sharedWithMe;

        return $self;
    }
}
