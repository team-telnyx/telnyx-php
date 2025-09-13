<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type authentication_provider_get_response = array{
 *   data?: AuthenticationProvider
 * }
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class AuthenticationProviderGetResponse implements BaseModel
{
    /** @use SdkModel<authentication_provider_get_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?AuthenticationProvider $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?AuthenticationProvider $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(AuthenticationProvider $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
