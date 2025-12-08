<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ShortCode;
use Telnyx\ShortCode\RecordType;

/**
 * @phpstan-type MessagingProfileListShortCodesResponseShape = array{
 *   data?: list<ShortCode>|null, meta?: PaginationMeta|null
 * }
 */
final class MessagingProfileListShortCodesResponse implements BaseModel
{
    /** @use SdkModel<MessagingProfileListShortCodesResponseShape> */
    use SdkModel;

    /** @var list<ShortCode>|null $data */
    #[Api(list: ShortCode::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
