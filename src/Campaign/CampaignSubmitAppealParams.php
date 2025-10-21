<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Submits an appeal for rejected native campaigns in TELNYX_FAILED or MNO_REJECTED status. The appeal is recorded for manual compliance team review and the campaign status is reset to TCR_ACCEPTED. Note: Appeal forwarding is handled manually to allow proper review before incurring upstream charges.
 *
 * @see Telnyx\Campaign->submitAppeal
 *
 * @phpstan-type campaign_submit_appeal_params = array{appealReason: string}
 */
final class CampaignSubmitAppealParams implements BaseModel
{
    /** @use SdkModel<campaign_submit_appeal_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Detailed explanation of why the campaign should be reconsidered and what changes have been made to address the rejection reason.
     */
    #[Api('appeal_reason')]
    public string $appealReason;

    /**
     * `new CampaignSubmitAppealParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CampaignSubmitAppealParams::with(appealReason: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CampaignSubmitAppealParams)->withAppealReason(...)
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
        $obj = new self;

        $obj->appealReason = $appealReason;

        return $obj;
    }

    /**
     * Detailed explanation of why the campaign should be reconsidered and what changes have been made to address the rejection reason.
     */
    public function withAppealReason(string $appealReason): self
    {
        $obj = clone $this;
        $obj->appealReason = $appealReason;

        return $obj;
    }
}
