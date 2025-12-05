<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration\Address;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration\Contact;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration\Logo;

/**
 * @phpstan-type LoaConfigurationListResponseShape = array{
 *   data?: list<PortingLoaConfiguration>|null, meta?: PaginationMeta|null
 * }
 */
final class LoaConfigurationListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<LoaConfigurationListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<PortingLoaConfiguration>|null $data */
    #[Api(list: PortingLoaConfiguration::class, optional: true)]
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
     * @param list<PortingLoaConfiguration|array{
     *   id?: string|null,
     *   address?: Address|null,
     *   company_name?: string|null,
     *   contact?: Contact|null,
     *   created_at?: \DateTimeInterface|null,
     *   logo?: Logo|null,
     *   name?: string|null,
     *   organization_id?: string|null,
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
     * @param list<PortingLoaConfiguration|array{
     *   id?: string|null,
     *   address?: Address|null,
     *   company_name?: string|null,
     *   contact?: Contact|null,
     *   created_at?: \DateTimeInterface|null,
     *   logo?: Logo|null,
     *   name?: string|null,
     *   organization_id?: string|null,
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
