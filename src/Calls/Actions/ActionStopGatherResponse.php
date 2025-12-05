<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ActionStopGatherResponseShape = array{
 *   data?: CallControlCommandResult|null
 * }
 */
final class ActionStopGatherResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ActionStopGatherResponseShape> */
    use SdkModel;

    use SdkResponse;

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
