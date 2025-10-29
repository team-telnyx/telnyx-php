<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type CampaignSubmitAppealResponseShape = array{
 *   appealedAt?: \DateTimeInterface
 * }
 */
final class CampaignSubmitAppealResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CampaignSubmitAppealResponseShape> */
    use SdkModel;

    use SdkResponse;

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
