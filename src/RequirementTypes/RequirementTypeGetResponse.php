<?php

declare(strict_types=1);

namespace Telnyx\RequirementTypes;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\DocReqsRequirementType;

/**
 * @phpstan-type RequirementTypeGetResponseShape = array{
 *   data?: DocReqsRequirementType|null
 * }
 */
final class RequirementTypeGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<RequirementTypeGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?DocReqsRequirementType $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?DocReqsRequirementType $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(DocReqsRequirementType $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
