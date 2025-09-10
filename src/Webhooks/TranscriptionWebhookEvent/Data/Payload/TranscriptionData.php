<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\TranscriptionWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\TranscriptionWebhookEvent\Data\Payload\TranscriptionData\TranscriptionTrack;

/**
 * @phpstan-type transcription_data = array{
 *   confidence?: float|null,
 *   isFinal?: bool|null,
 *   transcript?: string|null,
 *   transcriptionTrack?: value-of<TranscriptionTrack>|null,
 * }
 */
final class TranscriptionData implements BaseModel
{
    /** @use SdkModel<transcription_data> */
    use SdkModel;

    /**
     * Speech recognition confidence level.
     */
    #[Api(optional: true)]
    public ?float $confidence;

    /**
     * When false, it means that this is an interim result.
     */
    #[Api('is_final', optional: true)]
    public ?bool $isFinal;

    /**
     * Recognized text.
     */
    #[Api(optional: true)]
    public ?string $transcript;

    /**
     * Indicates which leg of the call has been transcribed. This is only available when `transcription_engine` is set to `B`.
     *
     * @var value-of<TranscriptionTrack>|null $transcriptionTrack
     */
    #[Api('transcription_track', enum: TranscriptionTrack::class, optional: true)]
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

        null !== $confidence && $obj->confidence = $confidence;
        null !== $isFinal && $obj->isFinal = $isFinal;
        null !== $transcript && $obj->transcript = $transcript;
        null !== $transcriptionTrack && $obj->transcriptionTrack = $transcriptionTrack instanceof TranscriptionTrack ? $transcriptionTrack->value : $transcriptionTrack;

        return $obj;
    }

    /**
     * Speech recognition confidence level.
     */
    public function withConfidence(float $confidence): self
    {
        $obj = clone $this;
        $obj->confidence = $confidence;

        return $obj;
    }

    /**
     * When false, it means that this is an interim result.
     */
    public function withIsFinal(bool $isFinal): self
    {
        $obj = clone $this;
        $obj->isFinal = $isFinal;

        return $obj;
    }

    /**
     * Recognized text.
     */
    public function withTranscript(string $transcript): self
    {
        $obj = clone $this;
        $obj->transcript = $transcript;

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
        $obj->transcriptionTrack = $transcriptionTrack instanceof TranscriptionTrack ? $transcriptionTrack->value : $transcriptionTrack;

        return $obj;
    }
}
