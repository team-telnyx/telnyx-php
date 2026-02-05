<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallAnsweredShape from \Telnyx\Webhooks\CallAnswered
 *
 * @phpstan-type CallAnsweredWebhookEventShape = array{
 *   data?: null|CallAnswered|CallAnsweredShape
 * }
 */
final class CallAnsweredWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallAnsweredWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallAnswered $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallAnswered|CallAnsweredShape|null $data
     */
    public static function with(CallAnswered|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallAnswered|CallAnsweredShape $data
     */
    public function withData(CallAnswered|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
