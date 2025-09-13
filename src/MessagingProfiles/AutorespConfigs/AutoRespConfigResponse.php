<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type auto_resp_config_response = array{data: AutoRespConfig}
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class AutoRespConfigResponse implements BaseModel
{
    /** @use SdkModel<auto_resp_config_response> */
    use SdkModel;

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
