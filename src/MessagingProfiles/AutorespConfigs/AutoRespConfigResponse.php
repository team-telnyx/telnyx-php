<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type AutoRespConfigResponseShape = array{data: AutoRespConfig}
 */
final class AutoRespConfigResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AutoRespConfigResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public AutoRespConfig $data;

    /**
     * `new AutoRespConfigResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutoRespConfigResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutoRespConfigResponse)->withData(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(AutoRespConfig $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    public function withData(AutoRespConfig $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
