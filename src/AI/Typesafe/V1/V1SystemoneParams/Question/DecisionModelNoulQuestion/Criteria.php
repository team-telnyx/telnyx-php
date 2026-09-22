<?php

declare(strict_types=1);

namespace Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelNoulQuestion;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Optional descriptions for the positive and negative outcomes. Descriptions must be strings.
 *
 * @phpstan-type CriteriaShape = array{false?: string|null, true?: string|null}
 */
final class Criteria implements BaseModel
{
    /** @use SdkModel<CriteriaShape> */
    use SdkModel;

    /**
     * Description of the negative outcome.
     */
    #[Optional]
    public ?string $false;

    /**
     * Description of the positive outcome.
     */
    #[Optional]
    public ?string $true;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $false = null, ?string $true = null): self
    {
        $self = new self;

        null !== $false && $self['false'] = $false;
        null !== $true && $self['true'] = $true;

        return $self;
    }

    /**
     * Description of the negative outcome.
     */
    public function withFalse(string $false): self
    {
        $self = clone $this;
        $self['false'] = $false;

        return $self;
    }

    /**
     * Description of the positive outcome.
     */
    public function withTrue(string $true): self
    {
        $self = clone $this;
        $self['true'] = $true;

        return $self;
    }
}
