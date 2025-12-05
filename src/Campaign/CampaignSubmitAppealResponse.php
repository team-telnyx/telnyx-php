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
 *   appealed_at?: \DateTimeInterface|null
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
    #[Api(optional: true)]
    public ?\DateTimeInterface $appealed_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?\DateTimeInterface $appealed_at = null): self
    {
        $obj = new self;

        null !== $appealed_at && $obj['appealed_at'] = $appealed_at;

        return $obj;
    }

    /**
     * Timestamp when the appeal was submitted.
     */
    public function withAppealedAt(\DateTimeInterface $appealedAt): self
    {
        $obj = clone $this;
        $obj['appealed_at'] = $appealedAt;

        return $obj;
    }
}
