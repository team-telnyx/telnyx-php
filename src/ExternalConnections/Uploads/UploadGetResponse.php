<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Uploads\Upload\AvailableUsage;
use Telnyx\ExternalConnections\Uploads\Upload\Status;

/**
 * @phpstan-type UploadGetResponseShape = array{data?: Upload|null}
 */
final class UploadGetResponse implements BaseModel
{
    /** @use SdkModel<UploadGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Upload $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Upload|array{
     *   availableUsages?: list<value-of<AvailableUsage>>|null,
     *   errorCode?: string|null,
     *   errorMessage?: string|null,
     *   locationID?: string|null,
     *   status?: value-of<Status>|null,
     *   tenantID?: string|null,
     *   ticketID?: string|null,
     *   tnUploadEntries?: list<TnUploadEntry>|null,
     * } $data
     */
    public static function with(Upload|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Upload|array{
     *   availableUsages?: list<value-of<AvailableUsage>>|null,
     *   errorCode?: string|null,
     *   errorMessage?: string|null,
     *   locationID?: string|null,
     *   status?: value-of<Status>|null,
     *   tenantID?: string|null,
     *   ticketID?: string|null,
     *   tnUploadEntries?: list<TnUploadEntry>|null,
     * } $data
     */
    public function withData(Upload|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
