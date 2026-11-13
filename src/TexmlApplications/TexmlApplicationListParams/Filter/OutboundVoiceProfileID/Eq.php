<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications\TexmlApplicationListParams\Filter\OutboundVoiceProfileID;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type EqShape = array{eq?: string|null}
 */
final class Eq implements BaseModel
{
    /** @use SdkModel<EqShape> */
    use SdkModel;

    /**
     * Exact match for the associated outbound voice profile.
     */
    #[Optional]
    public ?string $eq;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $eq = null): self
    {
        $self = new self;

        null !== $eq && $self['eq'] = $eq;

        return $self;
    }

    /**
     * Exact match for the associated outbound voice profile.
     */
    public function withEq(string $eq): self
    {
        $self = clone $this;
        $self['eq'] = $eq;

        return $self;
    }
}
