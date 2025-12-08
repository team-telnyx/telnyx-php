<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CallCallsResponseShape = array{
 *   from?: string|null, status?: string|null, to?: string|null
 * }
 */
final class CallCallsResponse implements BaseModel
{
    /** @use SdkModel<CallCallsResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $from;

    #[Api(optional: true)]
    public ?string $status;

    #[Api(optional: true)]
    public ?string $to;

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
        ?string $from = null,
        ?string $status = null,
        ?string $to = null
    ): self {
        $obj = new self;

        null !== $from && $obj['from'] = $from;
        null !== $status && $obj['status'] = $status;
        null !== $to && $obj['to'] = $to;

        return $obj;
    }

    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }
}
