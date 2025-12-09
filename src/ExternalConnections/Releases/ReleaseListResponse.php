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
     *   createdAt?: string|null,
     *   errorMessage?: string|null,
     *   status?: value-of<Status>|null,
     *   telephoneNumbers?: list<TelephoneNumber>|null,
     *   tenantID?: string|null,
     *   ticketID?: string|null,
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
     * @param list<Data|array{
     *   createdAt?: string|null,
     *   errorMessage?: string|null,
     *   status?: value-of<Status>|null,
     *   telephoneNumbers?: list<TelephoneNumber>|null,
     *   tenantID?: string|null,
     *   ticketID?: string|null,
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
