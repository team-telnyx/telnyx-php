<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ActionStopResponseShape = array{
 *   data?: ConferenceCommandResult|null
 * }
 */
final class ActionStopResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ActionStopResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?ConferenceCommandResult $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConferenceCommandResult|array{result: string} $data
     */
    public static function with(
        ConferenceCommandResult|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param ConferenceCommandResult|array{result: string} $data
     */
    public function withData(ConferenceCommandResult|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
