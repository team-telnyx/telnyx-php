<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Submits an appeal for rejected native campaigns in TELNYX_FAILED or MNO_REJECTED status. The appeal is recorded for manual compliance team review and the campaign status is reset to TCR_ACCEPTED. Note: Appeal forwarding is handled manually to allow proper review before incurring upstream charges.
 *
 * @see Telnyx\Services\CampaignService::submitAppeal()
 *
 * @phpstan-type CampaignSubmitAppealParamsShape = array{appeal_reason: string}
 */
final class CampaignSubmitAppealParams implements BaseModel
{
    /** @use SdkModel<CampaignSubmitAppealParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Detailed explanation of why the campaign should be reconsidered and what changes have been made to address the rejection reason.
     */
    #[Required]
    public string $appeal_reason;

    /**
     * `new CampaignSubmitAppealParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CampaignSubmitAppealParams::with(appeal_reason: ...)
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
    public static function with(string $appeal_reason): self
    {
        $obj = new self;

        $obj['appeal_reason'] = $appeal_reason;

        return $obj;
    }

    /**
     * Detailed explanation of why the campaign should be reconsidered and what changes have been made to address the rejection reason.
     */
    public function withAppealReason(string $appealReason): self
    {
        $obj = clone $this;
        $obj['appeal_reason'] = $appealReason;

        return $obj;
    }
}
