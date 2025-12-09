<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TranscriptionSettings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SettingsShape = array{
 *   eotThreshold?: float|null,
 *   eotTimeoutMs?: int|null,
 *   numerals?: bool|null,
 *   smartFormat?: bool|null,
 * }
 */
final class Settings implements BaseModel
{
    /** @use SdkModel<SettingsShape> */
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
        $obj = new self;

        null !== $eotThreshold && $obj['eotThreshold'] = $eotThreshold;
        null !== $eotTimeoutMs && $obj['eotTimeoutMs'] = $eotTimeoutMs;
        null !== $numerals && $obj['numerals'] = $numerals;
        null !== $smartFormat && $obj['smartFormat'] = $smartFormat;

        return $obj;
    }

    /**
     * Available only for deepgram/flux. Confidence required to trigger an end of turn. Higher values = more reliable turn detection but slightly increased latency.
     */
    public function withEotThreshold(float $eotThreshold): self
    {
        $obj = clone $this;
        $obj['eotThreshold'] = $eotThreshold;

        return $obj;
    }

    /**
     * Available only for deepgram/flux. Maximum milliseconds of silence before forcing an end of turn, regardless of confidence.
     */
    public function withEotTimeoutMs(int $eotTimeoutMs): self
    {
        $obj = clone $this;
        $obj['eotTimeoutMs'] = $eotTimeoutMs;

        return $obj;
    }

    public function withNumerals(bool $numerals): self
    {
        $obj = clone $this;
        $obj['numerals'] = $numerals;

        return $obj;
    }

    public function withSmartFormat(bool $smartFormat): self
    {
        $obj = clone $this;
        $obj['smartFormat'] = $smartFormat;

        return $obj;
    }
}
