<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CampaignDeactivateResponseShape = array{
 *   time: float, message?: string|null, record_type?: string|null
 * }
 */
final class CampaignDeactivateResponse implements BaseModel
{
    /** @use SdkModel<CampaignDeactivateResponseShape> */
    use SdkModel;

    #[Required]
    public float $time;

    #[Optional]
    public ?string $message;

    #[Optional]
    public ?string $record_type;

    /**
     * `new CampaignDeactivateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CampaignDeactivateResponse::with(time: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CampaignDeactivateResponse)->withTime(...)
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
        float $time,
        ?string $message = null,
        ?string $record_type = null
    ): self {
        $obj = new self;

        $obj['time'] = $time;

        null !== $message && $obj['message'] = $message;
        null !== $record_type && $obj['record_type'] = $record_type;

        return $obj;
    }

    public function withTime(float $time): self
    {
        $obj = clone $this;
        $obj['time'] = $time;

        return $obj;
    }

    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj['message'] = $message;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }
}
