<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type document_update_response = array{data?: DocServiceDocument}
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class DocumentUpdateResponse implements BaseModel
{
    /** @use SdkModel<document_update_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?DocServiceDocument $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?DocServiceDocument $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(DocServiceDocument $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
