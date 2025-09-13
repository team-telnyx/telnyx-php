<?php

declare(strict_types=1);

namespace Telnyx\RequirementTypes;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DocReqsRequirementType;

/**
 * @phpstan-type requirement_type_get_response = array{
 *   data?: DocReqsRequirementType
 * }
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class RequirementTypeGetResponse implements BaseModel
{
    /** @use SdkModel<requirement_type_get_response> */
    use SdkModel;

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
