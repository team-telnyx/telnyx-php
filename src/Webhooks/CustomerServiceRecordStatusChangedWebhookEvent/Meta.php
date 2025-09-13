<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CustomerServiceRecordStatusChangedWebhookEvent;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type meta_alias = array{attempt?: int, deliveredTo?: string}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<meta_alias> */
    use SdkModel;

    /**
     * The number of times the callback webhook has been attempted.
     */
    #[Api(optional: true)]
    public ?int $attempt;

    /**
     * The URL that the callback webhook was delivered to.
     */
    #[Api('delivered_to', optional: true)]
    public ?string $deliveredTo;

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
        ?int $attempt = null,
        ?string $deliveredTo = null
    ): self {
        $obj = new self;

        null !== $attempt && $obj->attempt = $attempt;
        null !== $deliveredTo && $obj->deliveredTo = $deliveredTo;

        return $obj;
    }

    /**
     * The number of times the callback webhook has been attempted.
     */
    public function withAttempt(int $attempt): self
    {
        $obj = clone $this;
        $obj->attempt = $attempt;

        return $obj;
    }

    /**
     * The URL that the callback webhook was delivered to.
     */
    public function withDeliveredTo(string $deliveredTo): self
    {
        $obj = clone $this;
        $obj->deliveredTo = $deliveredTo;

        return $obj;
    }
}
