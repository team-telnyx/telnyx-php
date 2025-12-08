<?php

declare(strict_types=1);

namespace Telnyx\OAuthGrants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuthClients\PaginationMetaOAuth;
use Telnyx\OAuthGrants\OAuthGrant\RecordType;

/**
 * @phpstan-type OAuthGrantListResponseShape = array{
 *   data?: list<OAuthGrant>|null, meta?: PaginationMetaOAuth|null
 * }
 */
final class OAuthGrantListResponse implements BaseModel
{
    /** @use SdkModel<OAuthGrantListResponseShape> */
    use SdkModel;

    /** @var list<OAuthGrant>|null $data */
    #[Optional(list: OAuthGrant::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMetaOAuth $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<OAuthGrant|array{
     *   id: string,
     *   client_id: string,
     *   created_at: \DateTimeInterface,
     *   record_type: value-of<RecordType>,
     *   scopes: list<string>,
     *   last_used_at?: \DateTimeInterface|null,
     * }> $data
     * @param PaginationMetaOAuth|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMetaOAuth|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<OAuthGrant|array{
     *   id: string,
     *   client_id: string,
     *   created_at: \DateTimeInterface,
     *   record_type: value-of<RecordType>,
     *   scopes: list<string>,
     *   last_used_at?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMetaOAuth|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMetaOAuth|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
