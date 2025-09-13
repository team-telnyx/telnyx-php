<?php

declare(strict_types=1);

namespace Telnyx\IPConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ip_connection_new_response = array{data?: IPConnection}
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class IPConnectionNewResponse implements BaseModel
{
    /** @use SdkModel<ip_connection_new_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?IPConnection $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?IPConnection $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(IPConnection $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
