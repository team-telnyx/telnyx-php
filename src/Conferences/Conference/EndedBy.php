<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Conference;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * IDs related to who ended the conference. It is expected for them to all be there or all be null.
 *
 * @phpstan-type EndedByShape = array{
 *   call_control_id?: string|null, call_session_id?: string|null
 * }
 */
final class EndedBy implements BaseModel
{
    /** @use SdkModel<EndedByShape> */
    use SdkModel;

    /**
     * Call Control ID which ended the conference.
     */
    #[Api(optional: true)]
    public ?string $call_control_id;

    /**
     * Call Session ID which ended the conference.
     */
    #[Api(optional: true)]
    public ?string $call_session_id;

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
        ?string $call_control_id = null,
        ?string $call_session_id = null
    ): self {
        $obj = new self;

        null !== $call_control_id && $obj->call_control_id = $call_control_id;
        null !== $call_session_id && $obj->call_session_id = $call_session_id;

        return $obj;
    }

    /**
     * Call Control ID which ended the conference.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->call_control_id = $callControlID;

        return $obj;
    }

    /**
     * Call Session ID which ended the conference.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->call_session_id = $callSessionID;

        return $obj;
    }
}
