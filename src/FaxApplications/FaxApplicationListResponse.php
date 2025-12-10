<?php

declare(strict_types=1);

namespace Telnyx\FaxApplications;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\FaxApplications\FaxApplication\Inbound;
use Telnyx\FaxApplications\FaxApplication\Outbound;

/**
 * @phpstan-type FaxApplicationListResponseShape = array{
 *   data?: list<FaxApplication>|null, meta?: PaginationMeta|null
 * }
 */
final class FaxApplicationListResponse implements BaseModel
{
    /** @use SdkModel<FaxApplicationListResponseShape> */
    use SdkModel;

    /** @var list<FaxApplication>|null $data */
    #[Optional(list: FaxApplication::class)]
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
     * @param list<FaxApplication|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
     *   applicationName?: string|null,
     *   createdAt?: string|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   recordType?: string|null,
     *   tags?: list<string>|null,
     *   updatedAt?: string|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
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
     * @param list<FaxApplication|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
     *   applicationName?: string|null,
     *   createdAt?: string|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   recordType?: string|null,
     *   tags?: list<string>|null,
     *   updatedAt?: string|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
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
