<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

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
     *   downstreamCnpId?: string|null,
     *   sharedDate?: string|null,
     *   sharingStatus?: string|null,
     *   statusDate?: string|null,
     *   upstreamCnpId?: string|null,
     * } $sharedByMe
     * @param CampaignSharingStatus|array{
     *   downstreamCnpId?: string|null,
     *   sharedDate?: string|null,
     *   sharingStatus?: string|null,
     *   statusDate?: string|null,
     *   upstreamCnpId?: string|null,
     * } $sharedWithMe
     */
    public static function with(
        CampaignSharingStatus|array|null $sharedByMe = null,
        CampaignSharingStatus|array|null $sharedWithMe = null,
    ): self {
        $obj = new self;

        null !== $sharedByMe && $obj['sharedByMe'] = $sharedByMe;
        null !== $sharedWithMe && $obj['sharedWithMe'] = $sharedWithMe;

        return $obj;
    }

    /**
     * @param CampaignSharingStatus|array{
     *   downstreamCnpId?: string|null,
     *   sharedDate?: string|null,
     *   sharingStatus?: string|null,
     *   statusDate?: string|null,
     *   upstreamCnpId?: string|null,
     * } $sharedByMe
     */
    public function withSharedByMe(
        CampaignSharingStatus|array $sharedByMe
    ): self {
        $obj = clone $this;
        $obj['sharedByMe'] = $sharedByMe;

        return $obj;
    }

    /**
     * @param CampaignSharingStatus|array{
     *   downstreamCnpId?: string|null,
     *   sharedDate?: string|null,
     *   sharingStatus?: string|null,
     *   statusDate?: string|null,
     *   upstreamCnpId?: string|null,
     * } $sharedWithMe
     */
    public function withSharedWithMe(
        CampaignSharingStatus|array $sharedWithMe
    ): self {
        $obj = clone $this;
        $obj['sharedWithMe'] = $sharedWithMe;

        return $obj;
    }
}
