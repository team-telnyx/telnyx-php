<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type upload_get_response = array{data?: Upload}
 */
final class UploadGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<upload_get_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?Upload $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Upload $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(Upload $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
