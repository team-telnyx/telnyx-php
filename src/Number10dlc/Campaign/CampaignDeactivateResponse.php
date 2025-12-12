<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Campaign;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CampaignDeactivateResponseShape = array{
 *   time: float, message?: string|null, recordType?: string|null
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

    #[Optional('record_type')]
    public ?string $recordType;

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
        ?string $recordType = null
    ): self {
        $self = new self;

        $self['time'] = $time;

        null !== $message && $self['message'] = $message;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    public function withTime(float $time): self
    {
        $self = clone $this;
        $self['time'] = $time;

        return $self;
    }

    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
