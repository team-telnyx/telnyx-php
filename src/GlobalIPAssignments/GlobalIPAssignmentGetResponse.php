<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignments;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type global_ip_assignment_get_response = array{
 *   data?: global_ip_assignment
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class GlobalIPAssignmentGetResponse implements BaseModel
{
    /** @use SdkModel<global_ip_assignment_get_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?GlobalIPAssignment $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?GlobalIPAssignment $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(GlobalIPAssignment $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
