<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type campaign_submit_appeal_response = array{
 *   appealedAt?: \DateTimeInterface|null, previousStatus?: string|null
 * }
 */
final class CampaignSubmitAppealResponse implements BaseModel
{
    /** @use SdkModel<campaign_submit_appeal_response> */
    use SdkModel;

    /**
     * Timestamp when the appeal was submitted.
     */
    #[Api('appealed_at', optional: true)]
    public ?\DateTimeInterface $appealedAt;

    /**
     * Previous campaign status (currently always null).
     */
    #[Api('previous_status', nullable: true, optional: true)]
    public ?string $previousStatus;

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
        ?\DateTimeInterface $appealedAt = null,
        ?string $previousStatus = null
    ): self {
        $obj = new self;

        null !== $appealedAt && $obj->appealedAt = $appealedAt;
        null !== $previousStatus && $obj->previousStatus = $previousStatus;

        return $obj;
    }

    /**
     * Timestamp when the appeal was submitted.
     */
    public function withAppealedAt(\DateTimeInterface $appealedAt): self
    {
        $obj = clone $this;
        $obj->appealedAt = $appealedAt;

        return $obj;
    }

    /**
     * Previous campaign status (currently always null).
     */
    public function withPreviousStatus(?string $previousStatus): self
    {
        $obj = clone $this;
        $obj->previousStatus = $previousStatus;

        return $obj;
    }
}
