<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingPaginationMeta;

/**
 * List of Auto-Response Settings.
 *
 * @phpstan-import-type AutoRespConfigShape from \Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfig
 * @phpstan-import-type MessagingPaginationMetaShape from \Telnyx\MessagingPaginationMeta
 *
 * @phpstan-type AutorespConfigListResponseShape = array{
 *   data: list<AutoRespConfigShape>,
 *   meta: MessagingPaginationMeta|MessagingPaginationMetaShape,
 * }
 */
final class AutorespConfigListResponse implements BaseModel
{
    /** @use SdkModel<AutorespConfigListResponseShape> */
    use SdkModel;

    /** @var list<AutoRespConfig> $data */
    #[Required(list: AutoRespConfig::class)]
    public array $data;

    #[Required]
    public MessagingPaginationMeta $meta;

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
     * @param list<AutoRespConfigShape> $data
     * @param MessagingPaginationMetaShape $meta
     */
    public static function with(
        array $data,
        MessagingPaginationMeta|array $meta
    ): self {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<AutoRespConfigShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param MessagingPaginationMetaShape $meta
     */
    public function withMeta(MessagingPaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
