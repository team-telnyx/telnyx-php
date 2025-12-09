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
 * @phpstan-type CallControlApplicationUpdateResponseShape = array{
 *   data?: CallControlApplication|null
 * }
 */
final class CallControlApplicationUpdateResponse implements BaseModel
{
    /** @use SdkModel<CallControlApplicationUpdateResponseShape> */
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
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
     *   applicationName?: string|null,
     *   callCostInWebhooks?: bool|null,
     *   createdAt?: string|null,
     *   dtmfType?: value-of<DtmfType>|null,
     *   firstCommandTimeout?: bool|null,
     *   firstCommandTimeoutSecs?: int|null,
     *   inbound?: CallControlApplicationInbound|null,
     *   outbound?: CallControlApplicationOutbound|null,
     *   recordType?: value-of<RecordType>|null,
     *   redactDtmfDebugLogging?: bool|null,
     *   tags?: list<string>|null,
     *   updatedAt?: string|null,
     *   webhookAPIVersion?: value-of<WebhookAPIVersion>|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * } $data
     */
    public static function with(CallControlApplication|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallControlApplication|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
     *   applicationName?: string|null,
     *   callCostInWebhooks?: bool|null,
     *   createdAt?: string|null,
     *   dtmfType?: value-of<DtmfType>|null,
     *   firstCommandTimeout?: bool|null,
     *   firstCommandTimeoutSecs?: int|null,
     *   inbound?: CallControlApplicationInbound|null,
     *   outbound?: CallControlApplicationOutbound|null,
     *   recordType?: value-of<RecordType>|null,
     *   redactDtmfDebugLogging?: bool|null,
     *   tags?: list<string>|null,
     *   updatedAt?: string|null,
     *   webhookAPIVersion?: value-of<WebhookAPIVersion>|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * } $data
     */
    public function withData(CallControlApplication|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
