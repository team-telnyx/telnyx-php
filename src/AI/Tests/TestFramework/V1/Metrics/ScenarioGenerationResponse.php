<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Metrics;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ScenarioGenerationResponseShape = array{progressID: string}
 */
final class ScenarioGenerationResponse implements BaseModel
{
    /** @use SdkModel<ScenarioGenerationResponseShape> */
    use SdkModel;

    /**
     * Identifier to poll generation progress with.
     */
    #[Required('progress_id')]
    public string $progressID;

    /**
     * `new ScenarioGenerationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScenarioGenerationResponse::with(progressID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ScenarioGenerationResponse)->withProgressID(...)
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
    public static function with(string $progressID): self
    {
        $self = new self;

        $self['progressID'] = $progressID;

        return $self;
    }

    /**
     * Identifier to poll generation progress with.
     */
    public function withProgressID(string $progressID): self
    {
        $self = clone $this;
        $self['progressID'] = $progressID;

        return $self;
    }
}
