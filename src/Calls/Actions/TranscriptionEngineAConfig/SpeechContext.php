<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineAConfig;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SpeechContextShape = array{
 *   boost?: float|null, phrases?: list<string>|null
 * }
 */
final class SpeechContext implements BaseModel
{
    /** @use SdkModel<SpeechContextShape> */
    use SdkModel;

    /**
     * Boost factor for the speech context.
     */
    #[Optional]
    public ?float $boost;

    /** @var list<string>|null $phrases */
    #[Optional(list: 'string')]
    public ?array $phrases;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $phrases
     */
    public static function with(
        ?float $boost = null,
        ?array $phrases = null
    ): self {
        $self = new self;

        null !== $boost && $self['boost'] = $boost;
        null !== $phrases && $self['phrases'] = $phrases;

        return $self;
    }

    /**
     * Boost factor for the speech context.
     */
    public function withBoost(float $boost): self
    {
        $self = clone $this;
        $self['boost'] = $boost;

        return $self;
    }

    /**
     * @param list<string> $phrases
     */
    public function withPhrases(array $phrases): self
    {
        $self = clone $this;
        $self['phrases'] = $phrases;

        return $self;
    }
}
