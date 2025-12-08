<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\ExternalVoiceIntegrationsPaginationMeta;
use Telnyx\ExternalConnections\Releases\ReleaseListResponse\Data;
use Telnyx\ExternalConnections\Releases\ReleaseListResponse\Data\Status;
use Telnyx\ExternalConnections\Releases\ReleaseListResponse\Data\TelephoneNumber;

/**
 * @phpstan-type ReleaseListResponseShape = array{
 *   data?: list<Data>|null, meta?: ExternalVoiceIntegrationsPaginationMeta|null
 * }
 */
final class ReleaseListResponse implements BaseModel
{
    /** @use SdkModel<ReleaseListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?ExternalVoiceIntegrationsPaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
     *   created_at?: string|null,
     *   error_message?: string|null,
     *   status?: value-of<Status>|null,
     *   telephone_numbers?: list<TelephoneNumber>|null,
     *   tenant_id?: string|null,
     *   ticket_id?: string|null,
     * }> $data
     * @param ExternalVoiceIntegrationsPaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        ExternalVoiceIntegrationsPaginationMeta|array|null $meta = null,
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   created_at?: string|null,
     *   error_message?: string|null,
     *   status?: value-of<Status>|null,
     *   telephone_numbers?: list<TelephoneNumber>|null,
     *   tenant_id?: string|null,
     *   ticket_id?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param ExternalVoiceIntegrationsPaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(
        ExternalVoiceIntegrationsPaginationMeta|array $meta
    ): self {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
