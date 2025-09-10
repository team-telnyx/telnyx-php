<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type conference_command_result = array{result: string}
 */
final class ConferenceCommandResult implements BaseModel
{
    /** @use SdkModel<conference_command_result> */
    use SdkModel;

    #[Api]
    public string $result;

    /**
     * `new ConferenceCommandResult()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConferenceCommandResult::with(result: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConferenceCommandResult)->withResult(...)
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
    public static function with(string $result): self
    {
        $obj = new self;

        $obj->result = $result;

        return $obj;
    }

    public function withResult(string $result): self
    {
        $obj = clone $this;
        $obj->result = $result;

        return $obj;
    }
}
