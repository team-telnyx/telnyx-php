<?php

declare(strict_types=1);

namespace Telnyx\IntegrationSecrets;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\IntegrationSecrets\IntegrationSecretListResponse\Meta;

/**
 * @phpstan-type integration_secret_list_response = array{
 *   data: list<IntegrationSecret>, meta: Meta
 * }
 */
final class IntegrationSecretListResponse implements BaseModel
{
    /** @use SdkModel<integration_secret_list_response> */
    use SdkModel;

    /** @var list<IntegrationSecret> $data */
    #[Api(list: IntegrationSecret::class)]
    public array $data;

    #[Api]
    public Meta $meta;

    /**
     * `new IntegrationSecretListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegrationSecretListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegrationSecretListResponse)->withData(...)->withMeta(...)
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
     *
     * @param list<IntegrationSecret> $data
     */
    public static function with(array $data, Meta $meta): self
    {
        $obj = new self;

        $obj->data = $data;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<IntegrationSecret> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(Meta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
