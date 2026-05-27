<?php

declare(strict_types=1);

namespace Telnyx\SpeechToText\SpeechToTextListProvidersResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SpeechToText\SpeechToTextListProvidersResponse\Data\ServiceType;

/**
 * A (provider, model) tuple along with its supported service types and languages.
 *
 * @phpstan-type DataShape = array{
 *   languages: list<string>,
 *   model: string,
 *   provider: string,
 *   serviceTypes: list<ServiceType|value-of<ServiceType>>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Languages this (provider, model) accepts, in the provider's native code format. `auto` indicates the provider performs language detection.
     *
     * @var list<string> $languages
     */
    #[Required(list: 'string')]
    public array $languages;

    /**
     * Provider-scoped model name.
     */
    #[Required]
    public string $model;

    /**
     * STT provider name.
     */
    #[Required]
    public string $provider;

    /**
     * Service surfaces this (provider, model) supports.
     *
     * @var list<value-of<ServiceType>> $serviceTypes
     */
    #[Required('service_types', list: ServiceType::class)]
    public array $serviceTypes;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(languages: ..., model: ..., provider: ..., serviceTypes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withLanguages(...)
     *   ->withModel(...)
     *   ->withProvider(...)
     *   ->withServiceTypes(...)
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
     * @param list<ServiceType|value-of<ServiceType>> $serviceTypes
     */
    public static function with(
        array $languages,
        string $model,
        string $provider,
        array $serviceTypes
    ): self {
        $self = new self;

        $self['languages'] = $languages;
        $self['model'] = $model;
        $self['provider'] = $provider;
        $self['serviceTypes'] = $serviceTypes;

        return $self;
    }

    /**
     * Languages this (provider, model) accepts, in the provider's native code format. `auto` indicates the provider performs language detection.
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
     * Provider-scoped model name.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * STT provider name.
     */
    public function withProvider(string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * Service surfaces this (provider, model) supports.
     *
     * @param list<ServiceType|value-of<ServiceType>> $serviceTypes
     */
    public function withServiceTypes(array $serviceTypes): self
    {
        $self = clone $this;
        $self['serviceTypes'] = $serviceTypes;

        return $self;
    }
}
