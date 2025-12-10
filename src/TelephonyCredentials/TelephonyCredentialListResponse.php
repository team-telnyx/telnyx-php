<?php

declare(strict_types=1);

namespace Telnyx\TelephonyCredentials;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TelephonyCredentialListResponseShape = array{
 *   data?: list<TelephonyCredential>|null, meta?: PaginationMeta|null
 * }
 */
final class TelephonyCredentialListResponse implements BaseModel
{
    /** @use SdkModel<TelephonyCredentialListResponseShape> */
    use SdkModel;

    /** @var list<TelephonyCredential>|null $data */
    #[Optional(list: TelephonyCredential::class)]
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
     * @param list<TelephonyCredential|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   expired?: bool|null,
     *   expiresAt?: string|null,
     *   name?: string|null,
     *   recordType?: string|null,
     *   resourceID?: string|null,
     *   sipPassword?: string|null,
     *   sipUsername?: string|null,
     *   updatedAt?: string|null,
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
     * @param list<TelephonyCredential|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   expired?: bool|null,
     *   expiresAt?: string|null,
     *   name?: string|null,
     *   recordType?: string|null,
     *   resourceID?: string|null,
     *   sipPassword?: string|null,
     *   sipUsername?: string|null,
     *   updatedAt?: string|null,
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
