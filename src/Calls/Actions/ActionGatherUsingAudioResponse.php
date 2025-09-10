<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type action_gather_using_audio_response = array{
 *   data?: CallControlCommandResult|null
 * }
 */
final class ActionGatherUsingAudioResponse implements BaseModel
{
    /** @use SdkModel<action_gather_using_audio_response> */
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
     */
    public static function with(?CallControlCommandResult $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(CallControlCommandResult $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
