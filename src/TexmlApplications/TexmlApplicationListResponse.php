<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\TexmlApplications\TexmlApplication\Inbound;
use Telnyx\TexmlApplications\TexmlApplication\Outbound;
use Telnyx\TexmlApplications\TexmlApplication\StatusCallbackMethod;
use Telnyx\TexmlApplications\TexmlApplication\VoiceMethod;
use Telnyx\TexmlApplications\TexmlApplicationListResponse\Meta;

/**
 * @phpstan-type TexmlApplicationListResponseShape = array{
 *   data?: list<TexmlApplication>|null, meta?: Meta|null
 * }
 */
final class TexmlApplicationListResponse implements BaseModel
{
    /** @use SdkModel<TexmlApplicationListResponseShape> */
    use SdkModel;

    /** @var list<TexmlApplication>|null $data */
    #[Optional(list: TexmlApplication::class)]
    public ?array $data;

    #[Optional]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<TexmlApplication|array{
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
     * }> $data
     * @param Meta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<TexmlApplication|array{
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
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
