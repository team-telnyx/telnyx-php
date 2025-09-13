<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type campaign_get_sharing_status_response = array{
 *   sharedByMe?: CampaignSharingStatus, sharedWithMe?: CampaignSharingStatus
 * }
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class CampaignGetSharingStatusResponse implements BaseModel
{
    /** @use SdkModel<campaign_get_sharing_status_response> */
    use SdkModel;

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
