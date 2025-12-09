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

/**
 * @phpstan-type TexmlApplicationUpdateResponseShape = array{
 *   data?: TexmlApplication|null
 * }
 */
final class TexmlApplicationUpdateResponse implements BaseModel
{
    /** @use SdkModel<TexmlApplicationUpdateResponseShape> */
    use SdkModel;

    #[Optional]
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
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
     *   callCostInWebhooks?: bool|null,
     *   createdAt?: string|null,
     *   dtmfType?: value-of<DtmfType>|null,
     *   firstCommandTimeout?: bool|null,
     *   firstCommandTimeoutSecs?: int|null,
     *   friendlyName?: string|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   recordType?: string|null,
     *   statusCallback?: string|null,
     *   statusCallbackMethod?: value-of<StatusCallbackMethod>|null,
     *   tags?: list<string>|null,
     *   updatedAt?: string|null,
     *   voiceFallbackURL?: string|null,
     *   voiceMethod?: value-of<VoiceMethod>|null,
     *   voiceURL?: string|null,
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
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
     *   callCostInWebhooks?: bool|null,
     *   createdAt?: string|null,
     *   dtmfType?: value-of<DtmfType>|null,
     *   firstCommandTimeout?: bool|null,
     *   firstCommandTimeoutSecs?: int|null,
     *   friendlyName?: string|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   recordType?: string|null,
     *   statusCallback?: string|null,
     *   statusCallbackMethod?: value-of<StatusCallbackMethod>|null,
     *   tags?: list<string>|null,
     *   updatedAt?: string|null,
     *   voiceFallbackURL?: string|null,
     *   voiceMethod?: value-of<VoiceMethod>|null,
     *   voiceURL?: string|null,
     * } $data
     */
    public function withData(TexmlApplication|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
