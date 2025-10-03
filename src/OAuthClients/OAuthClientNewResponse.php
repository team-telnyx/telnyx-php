<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type oauth_client_new_response = array{data?: OAuthClient}
 */
final class OAuthClientNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<oauth_client_new_response> */
    use SdkModel;

    use SdkResponse;

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
