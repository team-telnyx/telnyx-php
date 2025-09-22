<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type campaign_submit_appeal_response = array{
 *   appealedAt?: \DateTimeInterface
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
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

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?\DateTimeInterface $appealedAt = null): self
    {
        $obj = new self;

        null !== $appealedAt && $obj->appealedAt = $appealedAt;

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
}
