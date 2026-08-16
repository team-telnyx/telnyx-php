<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ArtifactCompletedWebhookEvent\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Model that generated the artifact.
 *
 * @phpstan-type ModelProvenanceShape = array{model: string, provider: string}
 */
final class ModelProvenance implements BaseModel
{
    /** @use SdkModel<ModelProvenanceShape> */
    use SdkModel;

    #[Required]
    public string $model;

    #[Required]
    public string $provider;

    /**
     * `new ModelProvenance()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ModelProvenance::with(model: ..., provider: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ModelProvenance)->withModel(...)->withProvider(...)
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
    public static function with(string $model, string $provider): self
    {
        $self = new self;

        $self['model'] = $model;
        $self['provider'] = $provider;

        return $self;
    }

    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    public function withProvider(string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }
}
