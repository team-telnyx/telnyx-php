<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\ExternalConnections\Uploads\Upload\AvailableUsage;
use Telnyx\ExternalConnections\Uploads\Upload\Status;

/**
 * @phpstan-type UploadRetryResponseShape = array{data?: Upload|null}
 */
final class UploadRetryResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<UploadRetryResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
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
     *   available_usages?: list<value-of<AvailableUsage>>|null,
     *   error_code?: string|null,
     *   error_message?: string|null,
     *   location_id?: string|null,
     *   status?: value-of<Status>|null,
     *   tenant_id?: string|null,
     *   ticket_id?: string|null,
     *   tn_upload_entries?: list<TnUploadEntry>|null,
     * } $data
     */
    public static function with(Upload|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Upload|array{
     *   available_usages?: list<value-of<AvailableUsage>>|null,
     *   error_code?: string|null,
     *   error_message?: string|null,
     *   location_id?: string|null,
     *   status?: value-of<Status>|null,
     *   tenant_id?: string|null,
     *   ticket_id?: string|null,
     *   tn_upload_entries?: list<TnUploadEntry>|null,
     * } $data
     */
    public function withData(Upload|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
