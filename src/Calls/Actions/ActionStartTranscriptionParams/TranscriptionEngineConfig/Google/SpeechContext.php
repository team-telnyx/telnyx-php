<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\Google;

use Telnyx\Core\Attributes\Api;
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
    #[Api(optional: true)]
    public ?float $boost;

    /** @var list<string>|null $phrases */
    #[Api(list: 'string', optional: true)]
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
     * @param list<string> $phrases
     */
    public static function with(
        ?float $boost = null,
        ?array $phrases = null
    ): self {
        $obj = new self;

        null !== $boost && $obj->boost = $boost;
        null !== $phrases && $obj->phrases = $phrases;

        return $obj;
    }

    /**
     * Boost factor for the speech context.
     */
    public function withBoost(float $boost): self
    {
        $obj = clone $this;
        $obj->boost = $boost;

        return $obj;
    }

    /**
     * @param list<string> $phrases
     */
    public function withPhrases(array $phrases): self
    {
        $obj = clone $this;
        $obj->phrases = $phrases;

        return $obj;
    }
}
