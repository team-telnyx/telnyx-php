<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\TexmlApplications\TexmlApplication\Inbound;
use Telnyx\TexmlApplications\TexmlApplication\Outbound;
use Telnyx\TexmlApplications\TexmlApplication\StatusCallbackMethod;
use Telnyx\TexmlApplications\TexmlApplication\VoiceMethod;

/**
 * @phpstan-type TexmlApplicationUpdateResponseShape = array{
 *   data?: TexmlApplication|null
 * }
 */
final class TexmlApplicationUpdateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<TexmlApplicationUpdateResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?TexmlApplication $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TexmlApplication|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsite_override?: value-of<AnchorsiteOverride>|null,
     *   call_cost_in_webhooks?: bool|null,
     *   created_at?: string|null,
     *   dtmf_type?: value-of<DtmfType>|null,
     *   first_command_timeout?: bool|null,
     *   first_command_timeout_secs?: int|null,
     *   friendly_name?: string|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   record_type?: string|null,
     *   status_callback?: string|null,
     *   status_callback_method?: value-of<StatusCallbackMethod>|null,
     *   tags?: list<string>|null,
     *   updated_at?: string|null,
     *   voice_fallback_url?: string|null,
     *   voice_method?: value-of<VoiceMethod>|null,
     *   voice_url?: string|null,
     * } $data
     */
    public static function with(TexmlApplication|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param TexmlApplication|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsite_override?: value-of<AnchorsiteOverride>|null,
     *   call_cost_in_webhooks?: bool|null,
     *   created_at?: string|null,
     *   dtmf_type?: value-of<DtmfType>|null,
     *   first_command_timeout?: bool|null,
     *   first_command_timeout_secs?: int|null,
     *   friendly_name?: string|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   record_type?: string|null,
     *   status_callback?: string|null,
     *   status_callback_method?: value-of<StatusCallbackMethod>|null,
     *   tags?: list<string>|null,
     *   updated_at?: string|null,
     *   voice_fallback_url?: string|null,
     *   voice_method?: value-of<VoiceMethod>|null,
     *   voice_url?: string|null,
     * } $data
     */
    public function withData(TexmlApplication|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
