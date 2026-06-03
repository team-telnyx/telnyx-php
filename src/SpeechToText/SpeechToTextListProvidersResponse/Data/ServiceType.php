<?php

declare(strict_types=1);

namespace Telnyx\SpeechToText\SpeechToTextListProvidersResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SpeechToText\SpeechToTextListProvidersResponse\Data\ServiceType\Type;

/**
 * A supported service surface for a given (provider, model), along with the language codes accepted on that surface. Language support can differ per surface — for example, a model may accept a narrower language set for streaming than for file transcription.
 *
 * @phpstan-type ServiceTypeShape = array{
 *   languages: list<string>, type: Type|value-of<Type>
 * }
 */
final class ServiceType implements BaseModel
{
    /** @use SdkModel<ServiceTypeShape> */
    use SdkModel;

    /**
     * Languages accepted on this service surface, in the provider's native code format. `auto` indicates the provider performs language detection.
     *
     * @var list<string> $languages
     */
    #[Required(list: 'string')]
    public array $languages;

    /**
     * Service surface a model is available on. `ai_assistant` is the STT surface configured via Call Control voice-assistant transcription; it covers both live-streaming and non-streaming/batch models (matching the `TranscriptionConfig.model` enum on `call-control` voice assistants).
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new ServiceType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ServiceType::with(languages: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ServiceType)->withLanguages(...)->withType(...)
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
     * @param list<string> $languages
     * @param Type|value-of<Type> $type
     */
    public static function with(array $languages, Type|string $type): self
    {
        $self = new self;

        $self['languages'] = $languages;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Languages accepted on this service surface, in the provider's native code format. `auto` indicates the provider performs language detection.
     *
     * @param list<string> $languages
     */
    public function withLanguages(array $languages): self
    {
        $self = clone $this;
        $self['languages'] = $languages;

        return $self;
    }

    /**
     * Service surface a model is available on. `ai_assistant` is the STT surface configured via Call Control voice-assistant transcription; it covers both live-streaming and non-streaming/batch models (matching the `TranscriptionConfig.model` enum on `call-control` voice assistants).
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
