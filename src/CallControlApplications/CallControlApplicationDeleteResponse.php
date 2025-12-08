<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications;

use Telnyx\CallControlApplications\CallControlApplication\AnchorsiteOverride;
use Telnyx\CallControlApplications\CallControlApplication\DtmfType;
use Telnyx\CallControlApplications\CallControlApplication\RecordType;
use Telnyx\CallControlApplications\CallControlApplication\WebhookAPIVersion;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CallControlApplicationDeleteResponseShape = array{
 *   data?: CallControlApplication|null
 * }
 */
final class CallControlApplicationDeleteResponse implements BaseModel
{
    /** @use SdkModel<CallControlApplicationDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?CallControlApplication $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallControlApplication|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsite_override?: value-of<AnchorsiteOverride>|null,
     *   application_name?: string|null,
     *   call_cost_in_webhooks?: bool|null,
     *   created_at?: string|null,
     *   dtmf_type?: value-of<DtmfType>|null,
     *   first_command_timeout?: bool|null,
     *   first_command_timeout_secs?: int|null,
     *   inbound?: CallControlApplicationInbound|null,
     *   outbound?: CallControlApplicationOutbound|null,
     *   record_type?: value-of<RecordType>|null,
     *   redact_dtmf_debug_logging?: bool|null,
     *   tags?: list<string>|null,
     *   updated_at?: string|null,
     *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * } $data
     */
    public static function with(CallControlApplication|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param CallControlApplication|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsite_override?: value-of<AnchorsiteOverride>|null,
     *   application_name?: string|null,
     *   call_cost_in_webhooks?: bool|null,
     *   created_at?: string|null,
     *   dtmf_type?: value-of<DtmfType>|null,
     *   first_command_timeout?: bool|null,
     *   first_command_timeout_secs?: int|null,
     *   inbound?: CallControlApplicationInbound|null,
     *   outbound?: CallControlApplicationOutbound|null,
     *   record_type?: value-of<RecordType>|null,
     *   redact_dtmf_debug_logging?: bool|null,
     *   tags?: list<string>|null,
     *   updated_at?: string|null,
     *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * } $data
     */
    public function withData(CallControlApplication|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
