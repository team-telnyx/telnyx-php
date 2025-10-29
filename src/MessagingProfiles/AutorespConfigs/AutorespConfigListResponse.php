<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * List of Auto-Response Settings.
 *
 * @phpstan-type AutorespConfigListResponseShape = array{
 *   data: list<AutoRespConfig>, meta: PaginationMeta
 * }
 */
final class AutorespConfigListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AutorespConfigListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<AutoRespConfig> $data */
    #[Api(list: AutoRespConfig::class)]
    public array $data;

    #[Api]
    public PaginationMeta $meta;

    /**
     * `new AutorespConfigListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutorespConfigListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutorespConfigListResponse)->withData(...)->withMeta(...)
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
     * @param list<AutoRespConfig> $data
     */
    public static function with(array $data, PaginationMeta $meta): self
    {
        $obj = new self;

        $obj->data = $data;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<AutoRespConfig> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(PaginationMeta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
