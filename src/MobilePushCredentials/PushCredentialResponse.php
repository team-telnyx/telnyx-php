<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Success response with details about a push credential.
 *
 * @phpstan-type push_credential_response = array{data?: PushCredential}
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class PushCredentialResponse implements BaseModel
{
    /** @use SdkModel<push_credential_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?PushCredential $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?PushCredential $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(PushCredential $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
