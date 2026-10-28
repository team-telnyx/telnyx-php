<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ScenarioRunScenariosResponseShape = array{id: int, status: string}
 */
final class ScenarioRunScenariosResponse implements BaseModel
{
    /** @use SdkModel<ScenarioRunScenariosResponseShape> */
    use SdkModel;

    /**
     * ID of the created test-run batch whose results can be polled.
     */
    #[Required]
    public int $id;

    /**
     * Initial status of the run batch.
     */
    #[Required]
    public string $status;

    /**
     * `new ScenarioRunScenariosResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScenarioRunScenariosResponse::with(id: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ScenarioRunScenariosResponse)->withID(...)->withStatus(...)
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
    public static function with(int $id, string $status): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['status'] = $status;

        return $self;
    }

    /**
     * ID of the created test-run batch whose results can be polled.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Initial status of the run batch.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
