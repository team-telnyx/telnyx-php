<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActionHangupResponseShape = array{
 *   data?: CallControlCommandResult|null
 * }
 */
final class ActionHangupResponse implements BaseModel
{
    /** @use SdkModel<ActionHangupResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?CallControlCommandResult $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallControlCommandResult|array{result?: string|null} $data
     */
    public static function with(
        CallControlCommandResult|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param CallControlCommandResult|array{result?: string|null} $data
     */
    public function withData(CallControlCommandResult|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
