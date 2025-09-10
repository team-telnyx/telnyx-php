<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type action_record_resume_response = array{
 *   data?: ConferenceCommandResult|null
 * }
 */
final class ActionRecordResumeResponse implements BaseModel
{
    /** @use SdkModel<action_record_resume_response> */
    use SdkModel;

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
     */
    public static function with(?ConferenceCommandResult $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(ConferenceCommandResult $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
