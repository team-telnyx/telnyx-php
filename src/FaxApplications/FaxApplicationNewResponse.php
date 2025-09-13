<?php

declare(strict_types=1);

namespace Telnyx\FaxApplications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type fax_application_new_response = array{data?: FaxApplication}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class FaxApplicationNewResponse implements BaseModel
{
    /** @use SdkModel<fax_application_new_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?FaxApplication $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?FaxApplication $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(FaxApplication $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
