<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Mobile mobile push credentials.
 *
 * @phpstan-type MobilePushCredentialListResponseShape = array{
 *   data?: list<PushCredential>|null, meta?: PaginationMeta|null
 * }
 */
final class MobilePushCredentialListResponse implements BaseModel
{
    /** @use SdkModel<MobilePushCredentialListResponseShape> */
    use SdkModel;

    /** @var list<PushCredential>|null $data */
    #[Optional(list: PushCredential::class)]
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
     * @param list<PushCredential|array{
     *   id: string,
     *   alias: string,
     *   certificate: string,
     *   createdAt: \DateTimeInterface,
     *   privateKey: string,
     *   projectAccountJsonFile: array<string,mixed>,
     *   recordType: string,
     *   type: string,
     *   updatedAt: \DateTimeInterface,
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
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<PushCredential|array{
     *   id: string,
     *   alias: string,
     *   certificate: string,
     *   createdAt: \DateTimeInterface,
     *   privateKey: string,
     *   projectAccountJsonFile: array<string,mixed>,
     *   recordType: string,
     *   type: string,
     *   updatedAt: \DateTimeInterface,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
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
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
