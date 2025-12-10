<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Campaign;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Submits an appeal for rejected native campaigns in TELNYX_FAILED or MNO_REJECTED status. The appeal is recorded for manual compliance team review and the campaign status is reset to TCR_ACCEPTED. Note: Appeal forwarding is handled manually to allow proper review before incurring upstream charges.
 *
 * @see Telnyx\Services\Number10dlc\CampaignService::appeal()
 *
 * @phpstan-type CampaignAppealParamsShape = array{appealReason: string}
 */
final class CampaignAppealParams implements BaseModel
{
    /** @use SdkModel<CampaignAppealParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Detailed explanation of why the campaign should be reconsidered and what changes have been made to address the rejection reason.
     */
    #[Required('appeal_reason')]
    public string $appealReason;

    /**
     * `new CampaignAppealParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CampaignAppealParams::with(appealReason: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CampaignAppealParams)->withAppealReason(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $appealReason): self
    {
        $self = new self;

        $self['appealReason'] = $appealReason;

        return $self;
    }

    /**
     * Detailed explanation of why the campaign should be reconsidered and what changes have been made to address the rejection reason.
     */
    public function withAppealReason(string $appealReason): self
    {
        $self = clone $this;
        $self['appealReason'] = $appealReason;

        return $self;
    }
}
