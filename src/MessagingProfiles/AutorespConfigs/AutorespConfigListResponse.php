<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfig\Op;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListResponse\Meta;

/**
 * List of Auto-Response Settings.
 *
 * @phpstan-type AutorespConfigListResponseShape = array{
 *   data: list<AutoRespConfig>, meta: Meta
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
    public Meta $meta;

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
     * @param list<AutoRespConfig|array{
     *   id: string,
     *   countryCode: string,
     *   createdAt: \DateTimeInterface,
     *   keywords: list<string>,
     *   op: value-of<Op>,
     *   updatedAt: \DateTimeInterface,
     *   respText?: string|null,
     * }> $data
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<AutoRespConfig|array{
     *   id: string,
     *   countryCode: string,
     *   createdAt: \DateTimeInterface,
     *   keywords: list<string>,
     *   op: value-of<Op>,
     *   updatedAt: \DateTimeInterface,
     *   respText?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
