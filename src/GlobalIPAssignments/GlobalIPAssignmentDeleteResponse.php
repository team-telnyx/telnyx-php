<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignments;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type GlobalIPAssignmentDeleteResponseShape = array{
 *   data?: GlobalIPAssignment|null
 * }
 */
final class GlobalIPAssignmentDeleteResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<GlobalIPAssignmentDeleteResponseShape> */
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
