<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\ExternalConnection\ExternalSipConnection;
use Telnyx\ExternalConnections\ExternalConnection\Inbound;
use Telnyx\ExternalConnections\ExternalConnection\Outbound;
use Telnyx\ExternalConnections\ExternalConnection\WebhookAPIVersion;

/**
 * @phpstan-type ExternalConnectionNewResponseShape = array{
 *   data?: ExternalConnection|null
 * }
 */
final class ExternalConnectionNewResponse implements BaseModel
{
    /** @use SdkModel<ExternalConnectionNewResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?ExternalConnection $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ExternalConnection|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   created_at?: string|null,
     *   credential_active?: bool|null,
     *   external_sip_connection?: value-of<ExternalSipConnection>|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   record_type?: string|null,
     *   tags?: list<string>|null,
     *   updated_at?: string|null,
     *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * } $data
     */
    public static function with(ExternalConnection|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param ExternalConnection|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   created_at?: string|null,
     *   credential_active?: bool|null,
     *   external_sip_connection?: value-of<ExternalSipConnection>|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   record_type?: string|null,
     *   tags?: list<string>|null,
     *   updated_at?: string|null,
     *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * } $data
     */
    public function withData(ExternalConnection|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
