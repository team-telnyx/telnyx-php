<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Check an engine end to end with your own key, without a call. Telnyx reads the voice list, connects to the engine's `websocket_url` with the Integration Secret named by `api_key_ref`, sends a short text, and checks the answer: the handshake, the credentials, the audio, the final frame and a clean close. The result is recorded (see `conformance_runs`) and returned. A test within 10 seconds of the previous one is refused with `429`, and a `suspended` engine cannot be tested. See [Try your engine before approval](/docs/voice/tts/community-engines#try-your-engine-before-approval).
 *
 * @see Telnyx\Services\TtsIntegrations\ActionsService::testConnection()
 *
 * @phpstan-type ActionTestConnectionParamsShape = array{
 *   apiKeyRef: string, voiceID?: string|null
 * }
 */
final class ActionTestConnectionParams implements BaseModel
{
    /** @use SdkModel<ActionTestConnectionParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The identifier of the Integration Secret in your organization that Telnyx connects to the engine with, as a caller would.
     */
    #[Required('api_key_ref')]
    public string $apiKeyRef;

    /**
     * The voice to test. Default: the first voice in the engine's list. It must be in the list.
     */
    #[Optional('voice_id')]
    public ?string $voiceID;

    /**
     * `new ActionTestConnectionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionTestConnectionParams::with(apiKeyRef: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionTestConnectionParams)->withAPIKeyRef(...)
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
    public static function with(string $apiKeyRef, ?string $voiceID = null): self
    {
        $self = new self;

        $self['apiKeyRef'] = $apiKeyRef;

        null !== $voiceID && $self['voiceID'] = $voiceID;

        return $self;
    }

    /**
     * The identifier of the Integration Secret in your organization that Telnyx connects to the engine with, as a caller would.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $self = clone $this;
        $self['apiKeyRef'] = $apiKeyRef;

        return $self;
    }

    /**
     * The voice to test. Default: the first voice in the engine's list. It must be in the list.
     */
    public function withVoiceID(string $voiceID): self
    {
        $self = clone $this;
        $self['voiceID'] = $voiceID;

        return $self;
    }
}
