<?php

declare(strict_types=1);

namespace Telnyx\FaxApplications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\FaxApplications\FaxApplication\Inbound;
use Telnyx\FaxApplications\FaxApplication\Outbound;

/**
 * @phpstan-type FaxApplicationDeleteResponseShape = array{
 *   data?: FaxApplication|null
 * }
 */
final class FaxApplicationDeleteResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<FaxApplicationDeleteResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?FaxApplication $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FaxApplication|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsite_override?: value-of<AnchorsiteOverride>|null,
     *   application_name?: string|null,
     *   created_at?: string|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   record_type?: string|null,
     *   tags?: list<string>|null,
     *   updated_at?: string|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * } $data
     */
    public static function with(FaxApplication|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param FaxApplication|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsite_override?: value-of<AnchorsiteOverride>|null,
     *   application_name?: string|null,
     *   created_at?: string|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   record_type?: string|null,
     *   tags?: list<string>|null,
     *   updated_at?: string|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * } $data
     */
    public function withData(FaxApplication|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
