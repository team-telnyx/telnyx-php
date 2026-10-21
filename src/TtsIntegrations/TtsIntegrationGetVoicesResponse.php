<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TtsIntegrations\TtsIntegrationGetVoicesResponse\Voice;

/**
 * @phpstan-import-type VoiceShape from \Telnyx\TtsIntegrations\TtsIntegrationGetVoicesResponse\Voice
 *
 * @phpstan-type TtsIntegrationGetVoicesResponseShape = array{
 *   voices: list<Voice|VoiceShape>
 * }
 */
final class TtsIntegrationGetVoicesResponse implements BaseModel
{
    /** @use SdkModel<TtsIntegrationGetVoicesResponseShape> */
    use SdkModel;

    /** @var list<Voice> $voices */
    #[Required(list: Voice::class)]
    public array $voices;

    /**
     * `new TtsIntegrationGetVoicesResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TtsIntegrationGetVoicesResponse::with(voices: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TtsIntegrationGetVoicesResponse)->withVoices(...)
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
     *
     * @param list<Voice|VoiceShape> $voices
     */
    public static function with(array $voices): self
    {
        $self = new self;

        $self['voices'] = $voices;

        return $self;
    }

    /**
     * @param list<Voice|VoiceShape> $voices
     */
    public function withVoices(array $voices): self
    {
        $self = clone $this;
        $self['voices'] = $voices;

        return $self;
    }
}
