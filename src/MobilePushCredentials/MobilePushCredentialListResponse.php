<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
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
    #[Api(list: PushCredential::class, optional: true)]
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
     * @param list<PushCredential|array{
     *   id: string,
     *   alias: string,
     *   certificate: string,
     *   created_at: \DateTimeInterface,
     *   private_key: string,
     *   project_account_json_file: array<string,mixed>,
     *   record_type: string,
     *   type: string,
     *   updated_at: \DateTimeInterface,
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
     * @param list<PushCredential|array{
     *   id: string,
     *   alias: string,
     *   certificate: string,
     *   created_at: \DateTimeInterface,
     *   private_key: string,
     *   project_account_json_file: array<string,mixed>,
     *   record_type: string,
     *   type: string,
     *   updated_at: \DateTimeInterface,
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
