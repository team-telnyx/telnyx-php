<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type campaign_get_sharing_status_response = array{
 *   sharedByMe?: CampaignSharingStatus, sharedWithMe?: CampaignSharingStatus
 * }
 */
final class CampaignGetSharingStatusResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<campaign_get_sharing_status_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?CampaignSharingStatus $sharedByMe;

    #[Api(optional: true)]
    public ?CampaignSharingStatus $sharedWithMe;

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
        ?CampaignSharingStatus $sharedByMe = null,
        ?CampaignSharingStatus $sharedWithMe = null,
    ): self {
        $obj = new self;

        null !== $sharedByMe && $obj->sharedByMe = $sharedByMe;
        null !== $sharedWithMe && $obj->sharedWithMe = $sharedWithMe;

        return $obj;
    }

    public function withSharedByMe(CampaignSharingStatus $sharedByMe): self
    {
        $obj = clone $this;
        $obj->sharedByMe = $sharedByMe;

        return $obj;
    }

    public function withSharedWithMe(CampaignSharingStatus $sharedWithMe): self
    {
        $obj = clone $this;
        $obj->sharedWithMe = $sharedWithMe;

        return $obj;
    }
}
