<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

use Telnyx\AuthenticationProviders\AuthenticationProvider\Settings;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AuthenticationProviderListResponseShape = array{
 *   data?: list<AuthenticationProvider>|null, meta?: PaginationMeta|null
 * }
 */
final class AuthenticationProviderListResponse implements BaseModel
{
    /** @use SdkModel<AuthenticationProviderListResponseShape> */
    use SdkModel;

    /** @var list<AuthenticationProvider>|null $data */
    #[Optional(list: AuthenticationProvider::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AuthenticationProvider|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   createdAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   organizationID?: string|null,
     *   recordType?: string|null,
     *   settings?: Settings|null,
     *   shortName?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<AuthenticationProvider|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   createdAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   organizationID?: string|null,
     *   recordType?: string|null,
     *   settings?: Settings|null,
     *   shortName?: string|null,
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
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
