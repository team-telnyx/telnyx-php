<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TranscriptionSettings;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SettingsShape = array{
 *   eot_threshold?: float|null,
 *   eot_timeout_ms?: int|null,
 *   numerals?: bool|null,
 *   smart_format?: bool|null,
 * }
 */
final class Settings implements BaseModel
{
    /** @use SdkModel<SettingsShape> */
    use SdkModel;

    /**
     * Available only for deepgram/flux. Confidence required to trigger an end of turn. Higher values = more reliable turn detection but slightly increased latency.
     */
    #[Api(optional: true)]
    public ?float $eot_threshold;

    /**
     * Available only for deepgram/flux. Maximum milliseconds of silence before forcing an end of turn, regardless of confidence.
     */
    #[Api(optional: true)]
    public ?int $eot_timeout_ms;

    #[Api(optional: true)]
    public ?bool $numerals;

    #[Api(optional: true)]
    public ?bool $smart_format;

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
        ?float $eot_threshold = null,
        ?int $eot_timeout_ms = null,
        ?bool $numerals = null,
        ?bool $smart_format = null,
    ): self {
        $obj = new self;

        null !== $eot_threshold && $obj['eot_threshold'] = $eot_threshold;
        null !== $eot_timeout_ms && $obj['eot_timeout_ms'] = $eot_timeout_ms;
        null !== $numerals && $obj['numerals'] = $numerals;
        null !== $smart_format && $obj['smart_format'] = $smart_format;

        return $obj;
    }

    /**
     * Available only for deepgram/flux. Confidence required to trigger an end of turn. Higher values = more reliable turn detection but slightly increased latency.
     */
    public function withEotThreshold(float $eotThreshold): self
    {
        $obj = clone $this;
        $obj['eot_threshold'] = $eotThreshold;

        return $obj;
    }

    /**
     * Available only for deepgram/flux. Maximum milliseconds of silence before forcing an end of turn, regardless of confidence.
     */
    public function withEotTimeoutMs(int $eotTimeoutMs): self
    {
        $obj = clone $this;
        $obj['eot_timeout_ms'] = $eotTimeoutMs;

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
        $obj['smart_format'] = $smartFormat;

        return $obj;
    }
}
