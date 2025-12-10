<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Campaign;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CampaignAppealResponseShape = array{
 *   appealedAt?: \DateTimeInterface|null
 * }
 */
final class CampaignAppealResponse implements BaseModel
{
    /** @use SdkModel<CampaignAppealResponseShape> */
    use SdkModel;

    /**
     * Timestamp when the appeal was submitted.
     */
    #[Optional('appealed_at')]
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
        $self = new self;

        null !== $appealedAt && $self['appealedAt'] = $appealedAt;

        return $self;
    }

    /**
     * Timestamp when the appeal was submitted.
     */
    public function withAppealedAt(\DateTimeInterface $appealedAt): self
    {
        $self = clone $this;
        $self['appealedAt'] = $appealedAt;

        return $self;
    }
}
