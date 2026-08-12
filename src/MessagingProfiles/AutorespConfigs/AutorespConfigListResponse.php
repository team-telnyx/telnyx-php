<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\AlphanumericSenderIDs\MessagingPaginationMeta0b38e7044b;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List of Auto-Response Settings.
 *
 * @phpstan-import-type AutoRespConfigShape from \Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfig
 * @phpstan-import-type MessagingPaginationMeta0b38e7044bShape from \Telnyx\AlphanumericSenderIDs\MessagingPaginationMeta0b38e7044b
 *
 * @phpstan-type AutorespConfigListResponseShape = array{
 *   data: list<AutoRespConfig|AutoRespConfigShape>,
 *   meta: MessagingPaginationMeta0b38e7044b|MessagingPaginationMeta0b38e7044bShape,
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
    public MessagingPaginationMeta0b38e7044b $meta;

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
     * @param list<AutoRespConfig|AutoRespConfigShape> $data
     * @param MessagingPaginationMeta0b38e7044b|MessagingPaginationMeta0b38e7044bShape $meta
     */
    public static function with(
        array $data,
        MessagingPaginationMeta0b38e7044b|array $meta
    ): self {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<AutoRespConfig|AutoRespConfigShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param MessagingPaginationMeta0b38e7044b|MessagingPaginationMeta0b38e7044bShape $meta
     */
    public function withMeta(
        MessagingPaginationMeta0b38e7044b|array $meta
    ): self {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
