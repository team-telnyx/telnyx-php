<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Conference;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * IDs related to who ended the conference. It is expected for them to all be there or all be null.
 *
 * @phpstan-type ended_by = array{callControlID?: string, callSessionID?: string}
 */
final class EndedBy implements BaseModel
{
    /** @use SdkModel<ended_by> */
    use SdkModel;

    /**
     * Call Control ID which ended the conference.
     */
    #[Api('call_control_id', optional: true)]
    public ?string $callControlID;

    /**
     * Call Session ID which ended the conference.
     */
    #[Api('call_session_id', optional: true)]
    public ?string $callSessionID;

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
        ?string $callControlID = null,
        ?string $callSessionID = null
    ): self {
        $obj = new self;

        null !== $callControlID && $obj->callControlID = $callControlID;
        null !== $callSessionID && $obj->callSessionID = $callSessionID;

        return $obj;
    }

    /**
     * Call Control ID which ended the conference.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->callControlID = $callControlID;

        return $obj;
    }

    /**
     * Call Session ID which ended the conference.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->callSessionID = $callSessionID;

        return $obj;
    }
}
