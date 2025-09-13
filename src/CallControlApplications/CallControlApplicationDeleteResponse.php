<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type call_control_application_delete_response = array{
 *   data?: CallControlApplication
 * }
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class CallControlApplicationDeleteResponse implements BaseModel
{
    /** @use SdkModel<call_control_application_delete_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?CallControlApplication $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?CallControlApplication $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(CallControlApplication $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
