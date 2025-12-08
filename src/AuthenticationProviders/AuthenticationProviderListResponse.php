<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

use Telnyx\AuthenticationProviders\AuthenticationProvider\Settings;
use Telnyx\Core\Attributes\Api;
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
    #[Api(list: AuthenticationProvider::class, optional: true)]
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
     * @param list<AuthenticationProvider|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   created_at?: \DateTimeInterface|null,
     *   name?: string|null,
     *   organization_id?: string|null,
     *   record_type?: string|null,
     *   settings?: Settings|null,
     *   short_name?: string|null,
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
     * @param list<AuthenticationProvider|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   created_at?: \DateTimeInterface|null,
     *   name?: string|null,
     *   organization_id?: string|null,
     *   record_type?: string|null,
     *   settings?: Settings|null,
     *   short_name?: string|null,
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
