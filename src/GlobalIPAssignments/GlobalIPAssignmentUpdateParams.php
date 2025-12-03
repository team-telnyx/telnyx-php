<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignments;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams\Body;

/**
 * Update a Global IP assignment.
 *
 * @see Telnyx\Services\GlobalIPAssignmentsService::update()
 *
 * @phpstan-type GlobalIPAssignmentUpdateParamsShape = array{body: Body}
 */
final class GlobalIPAssignmentUpdateParams implements BaseModel
{
    /** @use SdkModel<GlobalIPAssignmentUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public Body $body;

    /**
     * `new GlobalIPAssignmentUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GlobalIPAssignmentUpdateParams::with(body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GlobalIPAssignmentUpdateParams)->withBody(...)
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
    public static function with(Body $body): self
    {
        $obj = new self;

        $obj->body = $body;

        return $obj;
    }

    public function withBody(Body $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }
}
