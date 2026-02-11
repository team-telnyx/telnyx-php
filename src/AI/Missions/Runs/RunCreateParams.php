<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Start a new run for a mission.
 *
 * @see Telnyx\Services\AI\Missions\RunsService::create()
 *
 * @phpstan-type RunCreateParamsShape = array{
 *   input?: array<string,mixed>|null, metadata?: array<string,mixed>|null
 * }
 */
final class RunCreateParams implements BaseModel
{
    /** @use SdkModel<RunCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var array<string,mixed>|null $input */
    #[Optional(map: 'mixed')]
    public ?array $input;

    /** @var array<string,mixed>|null $metadata */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $input
     * @param array<string,mixed>|null $metadata
     */
    public static function with(
        ?array $input = null,
        ?array $metadata = null
    ): self {
        $self = new self;

        null !== $input && $self['input'] = $input;
        null !== $metadata && $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * @param array<string,mixed> $input
     */
    public function withInput(array $input): self
    {
        $self = clone $this;
        $self['input'] = $input;

        return $self;
    }

    /**
     * @param array<string,mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }
}
