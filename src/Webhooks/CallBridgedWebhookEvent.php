<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallBridgedShape from \Telnyx\Webhooks\CallBridged
 *
 * @phpstan-type CallBridgedWebhookEventShape = array{
 *   data?: null|CallBridged|CallBridgedShape
 * }
 */
final class CallBridgedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallBridgedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallBridged $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallBridged|CallBridgedShape|null $data
     */
    public static function with(CallBridged|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallBridged|CallBridgedShape $data
     */
    public function withData(CallBridged|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
