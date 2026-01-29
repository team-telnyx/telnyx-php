<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * If there were any errors during the upload process, this endpoint will retry the upload request. In some cases this will reattempt the existing upload request, in other cases it may create a new upload request. Please check the ticket_id in the response to determine if a new upload request was created.
 *
 * @see Telnyx\Services\ExternalConnections\UploadsService::retry()
 *
 * @phpstan-type UploadRetryParamsShape = array{id: string}
 */
final class UploadRetryParams implements BaseModel
{
    /** @use SdkModel<UploadRetryParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $id;

    /**
     * `new UploadRetryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UploadRetryParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UploadRetryParams)->withID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $id): self
    {
        $self = new self;

        $self['id'] = $id;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
