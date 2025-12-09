<?php

declare(strict_types=1);

namespace Telnyx\IntegrationSecrets;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\IntegrationSecrets\IntegrationSecretListResponse\Meta;

/**
 * @phpstan-type IntegrationSecretListResponseShape = array{
 *   data: list<IntegrationSecret>, meta: Meta
 * }
 */
final class IntegrationSecretListResponse implements BaseModel
{
    /** @use SdkModel<IntegrationSecretListResponseShape> */
    use SdkModel;

    /** @var list<IntegrationSecret> $data */
    #[Required(list: IntegrationSecret::class)]
    public array $data;

    #[Required]
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
     * @param list<IntegrationSecret|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   identifier: string,
     *   recordType: string,
     *   updatedAt?: \DateTimeInterface|null,
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
     * @param list<IntegrationSecret|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   identifier: string,
     *   recordType: string,
     *   updatedAt?: \DateTimeInterface|null,
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
