<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\TranscriptionWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\TranscriptionWebhookEvent\Data\Payload\TranscriptionData\TranscriptionTrack;

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
        $obj = new self;

        null !== $confidence && $obj['confidence'] = $confidence;
        null !== $isFinal && $obj['isFinal'] = $isFinal;
        null !== $transcript && $obj['transcript'] = $transcript;
        null !== $transcriptionTrack && $obj['transcriptionTrack'] = $transcriptionTrack;

        return $obj;
    }

    /**
     * Speech recognition confidence level.
     */
    public function withConfidence(float $confidence): self
    {
        $obj = clone $this;
        $obj['confidence'] = $confidence;

        return $obj;
    }

    /**
     * When false, it means that this is an interim result.
     */
    public function withIsFinal(bool $isFinal): self
    {
        $obj = clone $this;
        $obj['isFinal'] = $isFinal;

        return $obj;
    }

    /**
     * Recognized text.
     */
    public function withTranscript(string $transcript): self
    {
        $obj = clone $this;
        $obj['transcript'] = $transcript;

        return $obj;
    }

    /**
     * Indicates which leg of the call has been transcribed. This is only available when `transcription_engine` is set to `B`.
     *
     * @param TranscriptionTrack|value-of<TranscriptionTrack> $transcriptionTrack
     */
    public function withTranscriptionTrack(
        TranscriptionTrack|string $transcriptionTrack
    ): self {
        $obj = clone $this;
        $obj['transcriptionTrack'] = $transcriptionTrack;

        return $obj;
    }
}
