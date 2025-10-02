<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type oauth_client_update_response = array{data?: OAuthClient}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class OAuthClientUpdateResponse implements BaseModel
{
    /** @use SdkModel<oauth_client_update_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?OAuthClient $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?OAuthClient $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(OAuthClient $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
