<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallSiprecFailedShape from \Telnyx\Webhooks\CallSiprecFailed
 *
 * @phpstan-type CallSiprecFailedWebhookEventShape = array{
 *   data?: null|CallSiprecFailed|CallSiprecFailedShape
 * }
 */
final class CallSiprecFailedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallSiprecFailedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallSiprecFailed $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallSiprecFailed|CallSiprecFailedShape|null $data
     */
    public static function with(CallSiprecFailed|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallSiprecFailed|CallSiprecFailedShape $data
     */
    public function withData(CallSiprecFailed|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
