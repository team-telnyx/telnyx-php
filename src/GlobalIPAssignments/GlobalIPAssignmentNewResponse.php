<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignments;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type global_ip_assignment_new_response = array{
 *   data?: GlobalIPAssignment
 * }
 */
final class GlobalIPAssignmentNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<global_ip_assignment_new_response> */
    use SdkModel;

    use SdkResponse;

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
