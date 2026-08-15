<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSessionGetTranscriptResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   confidence: float|null,
 *   occurredAt: \DateTimeInterface,
 *   relativeTs: float|null,
 *   seq: int,
 *   speakerLabel: string|null,
 *   text: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public ?float $confidence;

    #[Required('occurred_at')]
    public \DateTimeInterface $occurredAt;

    #[Required('relative_ts')]
    public ?float $relativeTs;

    #[Required]
    public int $seq;

    #[Required('speaker_label')]
    public ?string $speakerLabel;

    #[Required]
    public string $text;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   confidence: ...,
     *   occurredAt: ...,
     *   relativeTs: ...,
     *   seq: ...,
     *   speakerLabel: ...,
     *   text: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withConfidence(...)
     *   ->withOccurredAt(...)
     *   ->withRelativeTs(...)
     *   ->withSeq(...)
     *   ->withSpeakerLabel(...)
     *   ->withText(...)
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
    public static function with(
        ?float $confidence,
        \DateTimeInterface $occurredAt,
        ?float $relativeTs,
        int $seq,
        ?string $speakerLabel,
        string $text,
    ): self {
        $self = new self;

        $self['confidence'] = $confidence;
        $self['occurredAt'] = $occurredAt;
        $self['relativeTs'] = $relativeTs;
        $self['seq'] = $seq;
        $self['speakerLabel'] = $speakerLabel;
        $self['text'] = $text;

        return $self;
    }

    public function withConfidence(?float $confidence): self
    {
        $self = clone $this;
        $self['confidence'] = $confidence;

        return $self;
    }

    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }

    public function withRelativeTs(?float $relativeTs): self
    {
        $self = clone $this;
        $self['relativeTs'] = $relativeTs;

        return $self;
    }

    public function withSeq(int $seq): self
    {
        $self = clone $this;
        $self['seq'] = $seq;

        return $self;
    }

    public function withSpeakerLabel(?string $speakerLabel): self
    {
        $self = clone $this;
        $self['speakerLabel'] = $speakerLabel;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
