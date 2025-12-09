<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\TranscriptionWebhookEvent\Data1\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\TranscriptionWebhookEvent\Data1\Payload\TranscriptionData\TranscriptionTrack;

/**
 * @phpstan-type TranscriptionDataShape = array{
 *   confidence?: float|null,
 *   isFinal?: bool|null,
 *   transcript?: string|null,
 *   transcriptionTrack?: value-of<TranscriptionTrack>|null,
 * }
 */
final class TranscriptionData implements BaseModel
{
    /** @use SdkModel<TranscriptionDataShape> */
    use SdkModel;

    /**
     * Speech recognition confidence level.
     */
    #[Optional]
    public ?float $confidence;

    /**
     * When false, it means that this is an interim result.
     */
    #[Optional('is_final')]
    public ?bool $isFinal;

    /**
     * Recognized text.
     */
    #[Optional]
    public ?string $transcript;

    /**
     * Indicates which leg of the call has been transcribed. This is only available when `transcription_engine` is set to `B`.
     *
     * @var value-of<TranscriptionTrack>|null $transcriptionTrack
     */
    #[Optional('transcription_track', enum: TranscriptionTrack::class)]
    public ?string $transcriptionTrack;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TranscriptionTrack|value-of<TranscriptionTrack> $transcriptionTrack
     */
    public static function with(
        ?float $confidence = null,
        ?bool $isFinal = null,
        ?string $transcript = null,
        TranscriptionTrack|string|null $transcriptionTrack = null,
    ): self {
        $self = new self;

        null !== $confidence && $self['confidence'] = $confidence;
        null !== $isFinal && $self['isFinal'] = $isFinal;
        null !== $transcript && $self['transcript'] = $transcript;
        null !== $transcriptionTrack && $self['transcriptionTrack'] = $transcriptionTrack;

        return $self;
    }

    /**
     * Speech recognition confidence level.
     */
    public function withConfidence(float $confidence): self
    {
        $self = clone $this;
        $self['confidence'] = $confidence;

        return $self;
    }

    /**
     * When false, it means that this is an interim result.
     */
    public function withIsFinal(bool $isFinal): self
    {
        $self = clone $this;
        $self['isFinal'] = $isFinal;

        return $self;
    }

    /**
     * Recognized text.
     */
    public function withTranscript(string $transcript): self
    {
        $self = clone $this;
        $self['transcript'] = $transcript;

        return $self;
    }

    /**
     * Indicates which leg of the call has been transcribed. This is only available when `transcription_engine` is set to `B`.
     *
     * @param TranscriptionTrack|value-of<TranscriptionTrack> $transcriptionTrack
     */
    public function withTranscriptionTrack(
        TranscriptionTrack|string $transcriptionTrack
    ): self {
        $self = clone $this;
        $self['transcriptionTrack'] = $transcriptionTrack;

        return $self;
    }
}
