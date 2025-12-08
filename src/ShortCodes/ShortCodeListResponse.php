<?php

declare(strict_types=1);

namespace Telnyx\ShortCodes;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ShortCode;
use Telnyx\ShortCode\RecordType;

/**
 * @phpstan-type ShortCodeListResponseShape = array{
 *   data?: list<ShortCode>|null, meta?: PaginationMeta|null
 * }
 */
final class ShortCodeListResponse implements BaseModel
{
    /** @use SdkModel<ShortCodeListResponseShape> */
    use SdkModel;

    /** @var list<ShortCode>|null $data */
    #[Optional(list: ShortCode::class)]
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
     * @param list<ShortCode|array{
     *   messaging_profile_id: string|null,
     *   id?: string|null,
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   record_type?: value-of<RecordType>|null,
     *   short_code?: string|null,
     *   tags?: list<string>|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
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
     * @param list<ShortCode|array{
     *   messaging_profile_id: string|null,
     *   id?: string|null,
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   record_type?: value-of<RecordType>|null,
     *   short_code?: string|null,
     *   tags?: list<string>|null,
     *   updated_at?: \DateTimeInterface|null,
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
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
