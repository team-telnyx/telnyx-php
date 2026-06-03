<?php

declare(strict_types=1);

namespace Telnyx\SpeechToText\SpeechToTextListProvidersResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SpeechToText\SpeechToTextListProvidersResponse\Data\ServiceType;

/**
 * A (provider, model) tuple along with the service surfaces it supports. Each entry in `service_types` describes one surface and the languages accepted on it.
 *
 * @phpstan-import-type ServiceTypeShape from \Telnyx\SpeechToText\SpeechToTextListProvidersResponse\Data\ServiceType
 *
 * @phpstan-type DataShape = array{
 *   model: string,
 *   provider: string,
 *   serviceTypes: list<ServiceType|ServiceTypeShape>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

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
     * Service surfaces this (provider, model) supports. When the request filters by `service_type`, only the matching nested entry is returned for each matching model.
     *
     * @var list<ServiceType> $serviceTypes
     */
    #[Required('service_types', list: ServiceType::class)]
    public array $serviceTypes;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(model: ..., provider: ..., serviceTypes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withModel(...)->withProvider(...)->withServiceTypes(...)
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
     * @param list<ServiceType|ServiceTypeShape> $serviceTypes
     */
    public static function with(
        string $model,
        string $provider,
        array $serviceTypes
    ): self {
        $self = new self;

        $self['model'] = $model;
        $self['provider'] = $provider;
        $self['serviceTypes'] = $serviceTypes;

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
     * Service surfaces this (provider, model) supports. When the request filters by `service_type`, only the matching nested entry is returned for each matching model.
     *
     * @param list<ServiceType|ServiceTypeShape> $serviceTypes
     */
    public function withServiceTypes(array $serviceTypes): self
    {
        $self = clone $this;
        $self['serviceTypes'] = $serviceTypes;

        return $self;
    }
}
