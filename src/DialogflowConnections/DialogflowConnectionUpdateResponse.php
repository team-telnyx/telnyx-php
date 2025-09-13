<?php

declare(strict_types=1);

namespace Telnyx\DialogflowConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DialogflowConnections\DialogflowConnectionUpdateResponse\Data;

/**
 * @phpstan-type dialogflow_connection_update_response = array{data: Data}
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class DialogflowConnectionUpdateResponse implements BaseModel
{
    /** @use SdkModel<dialogflow_connection_update_response> */
    use SdkModel;

    #[Api]
    public Data $data;

    /**
     * `new DialogflowConnectionUpdateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DialogflowConnectionUpdateResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DialogflowConnectionUpdateResponse)->withData(...)
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
    public static function with(Data $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    public function withData(Data $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
