<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension\ExtensionRange;

/**
 * @phpstan-type PhoneNumberExtensionListResponseShape = array{
 *   data?: list<PortingPhoneNumberExtension>|null, meta?: PaginationMeta|null
 * }
 */
final class PhoneNumberExtensionListResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberExtensionListResponseShape> */
    use SdkModel;

    /** @var list<PortingPhoneNumberExtension>|null $data */
    #[Optional(list: PortingPhoneNumberExtension::class)]
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
     * @param list<PortingPhoneNumberExtension|array{
     *   id?: string|null,
     *   activation_ranges?: list<ActivationRange>|null,
     *   created_at?: \DateTimeInterface|null,
     *   extension_range?: ExtensionRange|null,
     *   porting_phone_number_id?: string|null,
     *   record_type?: string|null,
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
     * @param list<PortingPhoneNumberExtension|array{
     *   id?: string|null,
     *   activation_ranges?: list<ActivationRange>|null,
     *   created_at?: \DateTimeInterface|null,
     *   extension_range?: ExtensionRange|null,
     *   porting_phone_number_id?: string|null,
     *   record_type?: string|null,
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
