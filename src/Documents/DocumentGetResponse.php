<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type DocumentGetResponseShape = array{data?: DocServiceDocument|null}
 */
final class DocumentGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<DocumentGetResponseShape> */
    use SdkModel;

    use SdkResponse;

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
