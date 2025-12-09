<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\ExternalVoiceIntegrationsPaginationMeta;
use Telnyx\ExternalConnections\Uploads\Upload\AvailableUsage;
use Telnyx\ExternalConnections\Uploads\Upload\Status;

/**
 * @phpstan-type UploadListResponseShape = array{
 *   data?: list<Upload>|null, meta?: ExternalVoiceIntegrationsPaginationMeta|null
 * }
 */
final class UploadListResponse implements BaseModel
{
    /** @use SdkModel<UploadListResponseShape> */
    use SdkModel;

    /** @var list<Upload>|null $data */
    #[Optional(list: Upload::class)]
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
     * @param list<Upload|array{
     *   availableUsages?: list<value-of<AvailableUsage>>|null,
     *   errorCode?: string|null,
     *   errorMessage?: string|null,
     *   locationID?: string|null,
     *   status?: value-of<Status>|null,
     *   tenantID?: string|null,
     *   ticketID?: string|null,
     *   tnUploadEntries?: list<TnUploadEntry>|null,
     * }> $data
     * @param ExternalVoiceIntegrationsPaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
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
     * @param list<Upload|array{
     *   availableUsages?: list<value-of<AvailableUsage>>|null,
     *   errorCode?: string|null,
     *   errorMessage?: string|null,
     *   locationID?: string|null,
     *   status?: value-of<Status>|null,
     *   tenantID?: string|null,
     *   ticketID?: string|null,
     *   tnUploadEntries?: list<TnUploadEntry>|null,
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
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
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
