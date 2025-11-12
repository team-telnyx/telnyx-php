<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Adds a test phone number to an RCS agent for testing purposes.
 *
 * @see Telnyx\Services\Messaging\RcsService::inviteTestNumber()
 *
 * @phpstan-type RcInviteTestNumberParamsShape = array{id: string}
 */
final class RcInviteTestNumberParams implements BaseModel
{
    /** @use SdkModel<RcInviteTestNumberParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $id;

    /**
     * `new RcInviteTestNumberParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RcInviteTestNumberParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RcInviteTestNumberParams)->withID(...)
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
    public static function with(string $id): self
    {
        $obj = new self;

        $obj->id = $id;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
