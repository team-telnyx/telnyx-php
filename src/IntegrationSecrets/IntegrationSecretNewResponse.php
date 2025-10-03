<?php

declare(strict_types=1);

namespace Telnyx\IntegrationSecrets;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type integration_secret_new_response = array{data: IntegrationSecret}
 */
final class IntegrationSecretNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<integration_secret_new_response> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public IntegrationSecret $data;

    /**
     * `new IntegrationSecretNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegrationSecretNewResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegrationSecretNewResponse)->withData(...)
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
    public static function with(IntegrationSecret $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    public function withData(IntegrationSecret $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
