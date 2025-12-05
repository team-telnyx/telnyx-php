<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\TranscriptionWebhookEvent\Data1\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\TranscriptionWebhookEvent\Data1\Payload\TranscriptionData\TranscriptionTrack;

/**
 * @phpstan-type TranscriptionDataShape = array{
 *   confidence?: float|null,
 *   is_final?: bool|null,
 *   transcript?: string|null,
 *   transcription_track?: value-of<TranscriptionTrack>|null,
 * }
 */
final class TranscriptionData implements BaseModel
{
    /** @use SdkModel<TranscriptionDataShape> */
    use SdkModel;

    /**
     * Speech recognition confidence level.
     */
    #[Api(optional: true)]
    public ?float $confidence;

    /**
     * When false, it means that this is an interim result.
     */
    #[Api(optional: true)]
    public ?bool $is_final;

    /**
     * Recognized text.
     */
    #[Api(optional: true)]
    public ?string $transcript;

    /**
     * Indicates which leg of the call has been transcribed. This is only available when `transcription_engine` is set to `B`.
     *
     * @var value-of<TranscriptionTrack>|null $transcription_track
     */
    #[Api(enum: TranscriptionTrack::class, optional: true)]
    public ?string $transcription_track;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TranscriptionTrack|value-of<TranscriptionTrack> $transcription_track
     */
    public static function with(
        ?float $confidence = null,
        ?bool $is_final = null,
        ?string $transcript = null,
        TranscriptionTrack|string|null $transcription_track = null,
    ): self {
        $obj = new self;

        null !== $confidence && $obj['confidence'] = $confidence;
        null !== $is_final && $obj['is_final'] = $is_final;
        null !== $transcript && $obj['transcript'] = $transcript;
        null !== $transcription_track && $obj['transcription_track'] = $transcription_track;

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
        $obj['is_final'] = $isFinal;

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
        $obj['transcription_track'] = $transcriptionTrack;

        return $obj;
    }
}
