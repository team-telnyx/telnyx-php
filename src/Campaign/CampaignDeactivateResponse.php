<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type campaign_deactivate_response = array{
 *   time: float, message?: string|null, recordType?: string|null
 * }
 */
final class CampaignDeactivateResponse implements BaseModel
{
    /** @use SdkModel<campaign_deactivate_response> */
    use SdkModel;

    #[Api]
    public float $time;

    #[Api(optional: true)]
    public ?string $message;

    #[Api('record_type', optional: true)]
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
        $obj = new self;

        $obj->time = $time;

        null !== $message && $obj->message = $message;
        null !== $recordType && $obj->recordType = $recordType;

        return $obj;
    }

    public function withTime(float $time): self
    {
        $obj = clone $this;
        $obj->time = $time;

        return $obj;
    }

    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj->message = $message;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }
}
