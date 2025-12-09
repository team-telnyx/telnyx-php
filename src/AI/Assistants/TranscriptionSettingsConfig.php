<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TranscriptionSettingsConfigShape = array{
 *   eotThreshold?: float|null,
 *   eotTimeoutMs?: int|null,
 *   numerals?: bool|null,
 *   smartFormat?: bool|null,
 * }
 */
final class TranscriptionSettingsConfig implements BaseModel
{
    /** @use SdkModel<TranscriptionSettingsConfigShape> */
    use SdkModel;

    /**
     * Available only for deepgram/flux. Confidence required to trigger an end of turn. Higher values = more reliable turn detection but slightly increased latency.
     */
    #[Optional('eot_threshold')]
    public ?float $eotThreshold;

    /**
     * Available only for deepgram/flux. Maximum milliseconds of silence before forcing an end of turn, regardless of confidence.
     */
    #[Optional('eot_timeout_ms')]
    public ?int $eotTimeoutMs;

    #[Optional]
    public ?bool $numerals;

    #[Optional('smart_format')]
    public ?bool $smartFormat;

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
        ?float $eotThreshold = null,
        ?int $eotTimeoutMs = null,
        ?bool $numerals = null,
        ?bool $smartFormat = null,
    ): self {
        $self = new self;

        null !== $eotThreshold && $self['eotThreshold'] = $eotThreshold;
        null !== $eotTimeoutMs && $self['eotTimeoutMs'] = $eotTimeoutMs;
        null !== $numerals && $self['numerals'] = $numerals;
        null !== $smartFormat && $self['smartFormat'] = $smartFormat;

        return $self;
    }

    /**
     * Available only for deepgram/flux. Confidence required to trigger an end of turn. Higher values = more reliable turn detection but slightly increased latency.
     */
    public function withEotThreshold(float $eotThreshold): self
    {
        $self = clone $this;
        $self['eotThreshold'] = $eotThreshold;

        return $self;
    }

    /**
     * Available only for deepgram/flux. Maximum milliseconds of silence before forcing an end of turn, regardless of confidence.
     */
    public function withEotTimeoutMs(int $eotTimeoutMs): self
    {
        $self = clone $this;
        $self['eotTimeoutMs'] = $eotTimeoutMs;

        return $self;
    }

    public function withNumerals(bool $numerals): self
    {
        $self = clone $this;
        $self['numerals'] = $numerals;

        return $self;
    }

    public function withSmartFormat(bool $smartFormat): self
    {
        $self = clone $this;
        $self['smartFormat'] = $smartFormat;

        return $self;
    }
}
