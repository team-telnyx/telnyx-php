<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\MessagingProfileListShortCodesResponse\Meta;
use Telnyx\ShortCode;
use Telnyx\ShortCode\RecordType;

/**
 * @phpstan-type MessagingProfileListShortCodesResponseShape = array{
 *   data?: list<ShortCode>|null, meta?: Meta|null
 * }
 */
final class MessagingProfileListShortCodesResponse implements BaseModel
{
    /** @use SdkModel<MessagingProfileListShortCodesResponseShape> */
    use SdkModel;

    /** @var list<ShortCode>|null $data */
    #[Optional(list: ShortCode::class)]
    public ?array $data;

    #[Optional]
    public ?Meta $meta;

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
     *   messagingProfileID: string|null,
     *   id?: string|null,
     *   countryCode?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   recordType?: value-of<RecordType>|null,
     *   shortCode?: string|null,
     *   tags?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<ShortCode|array{
     *   messagingProfileID: string|null,
     *   id?: string|null,
     *   countryCode?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   recordType?: value-of<RecordType>|null,
     *   shortCode?: string|null,
     *   tags?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
